<?php
	
    class Request extends Controller
    {
		public $certificate;
		public $setHold;

        public function __construct($hold = true)
        {
			$this->library(['curl']);
			$this->setHold = $hold;
			$this->setHold();
			$this->certificate = new Certificate;
		}
		public function setHold()
		{
			if($this->setHold)session_write_close();
		}

		public function course($course_id,$count=20,$page=1)
		{
			$formatted_data = [];
			$api = 'https://gigamare-api.sabacloud.com/v1/offering/search?type=instructor-led&q=(course_id%3D%3D'.$course_id.')&count='.$count.'&startPage='.$page;
			$send_url = $api . '&SabaCertificate=' . $this->certificate->get();

			$request = self::curl($send_url);

			if(!$request['success'])
				return $request;
				
			$request = json_decode($request['data'])->results;

			if(count($request)>0):
				foreach($request as $row):
					$details = self::classDetails($row->id);
					if(!empty($details)):
						$formatted_data[] = $details;
					endif;
				endforeach;
			endif;

			return $formatted_data;
		}

		public function coursev2($course_id=null,$count=20,$page=1)
		{
			$formatted_data = [];
			$course 		= !is_null($course_id) ? 'q=(course_id%3D%3D'.$course_id.')&' : '';
			$api = 'https://gigamare-api.sabacloud.com/v1/offering/search?type=instructor-led&'.$course.'count='.$count.'&startPage='.$page;
			$send_url = $api . '&SabaCertificate=' . $this->certificate->get();

			$request = $this->curl->url($send_url)->collect();

			if(!$request['success'])
				return $request;
				
			$request = json_decode($request['data'])->results;

			if(count($request)>0):
				foreach($request as $row):
					$formatted_data[] .= $row->id;
				endforeach;
			endif;

			return $formatted_data;
		}

		public function classDetails($class_id)
		{
			$formatted_data = '';
			$api = 'https://gigamare-api.sabacloud.com/v1/offering/' .$class_id;
			$send_url = $api . '?SabaCertificate=' . $this->certificate->get();

			$request = $this->curl->url($send_url)->collect();

			if(!$request['success'])
				return $request;

			$request = json_decode($request['data']);
			
			$formatted_data = array('class_id' => $request->id,
									'class_no' => $request->class_no,
									'language' => $request->language->displayName,
									'resource' => isset($request->resources[1][0]->resource->displayName) ? $request->resources[1][0]->resource->displayName : '',
									'resource_position' => '',
									'manager' => '',
									'manager_position' => '',
									'start_date' => $request->startDateI18n,
									'end_date' => $request->endDateI18n,
									'date_covered' => $request->startDateI18n . ' to ' . $request->endDateI18n,
									'course_id' => $request->offering_temp_id->id,
									'course_name' => $request->name,
									'course_version' => $request->courseVersion,
									'course_description' => !empty($request->courseDescription) ? $request->courseDescription : 'No description',
									'registered_count' => $request->registeredCount,
									'location' => $request->location->displayName,
									'duration' => $request->durationString
									);
			return $formatted_data;
		}

		public function classStudents($class_id)
		{
			$formatted_data = [];
			$api = 'https://gigamare-api.sabacloud.com/v1/learning/offering/'.$class_id.'/roster?count=100&startPage=1&registrationStatus=all';
			$send_url = $api . '&SabaCertificate=' . $this->certificate->get();

			$request = $this->curl->url($send_url)->collect();

			if(!$request['success'])
				return $request;
			
			$request = json_decode($request['data'])->rosterEntries;

			if(count($request)>0):
				foreach($request as $row):
					if($row->registrationStatusDescription == "Registered"):
						$formatted_data[] = array('person_id' => $row->learnerId,
						'fullname' => $row->learnerName,
						'registration_id' => $row->registrationId,
						'registration_status' => $row->registrationStatusDescription);
					endif;
					
				endforeach;
			endif;

			return $formatted_data;
		}

		public function personDetails($person_id)
		{
			$formatted_data = '';
			$api = 'https://gigamare-api.sabacloud.com/v1/people/' .$person_id;
			$send_url = $api . '?SabaCertificate=' . $this->certificate->get();

			$request = $this->curl->url($send_url)->collect();			

			if(!$request['success'])
				return $request;

			$request = json_decode($request['data']);
			
			$formatted_data = array('person_id' => $request->id,
									'person_no' => $request->person_no,
									'account_no' => $request->account_no,
									'firstname' => $request->fname,
									'middlename' => $request->mname,
									'lastname' => $request->lname,
									'username' => $request->username,
									'date_of_birth' => !is_null($request->date_of_birth)?$request->date_of_birth: '',
									'company_id' => !empty($request->company_id->id) ? $request->company_id->id : '',
									'company_name' => !empty($request->company_id->displayName) ? $request->company_id->displayName : '',
									);
			return $formatted_data;
		}

		public function getCertificate($credentials)
		{
			$send_url 	= 'https://gigamare-api.sabacloud.com/v1/login';
			$header 		= array(
								"user:".$credentials['user'],
								"password:".$credentials['password']
								);

			$request = $this->curl->url($send_url)->header($header)->collect();


			if($request['success']>0):
				$respponse = json_decode($request['data']);
				return $respponse->certificate;
			endif;
			return false;
		}

		private function formatDate($date)
		{
			return (new DateTime($date))->format('Y-m-d');
		}

		private function isWithinThisWeek($date)
		{
			$startOfWeek = new DateTime('last monday');

			$endOfWeek = ((clone($startOfWeek))->modify('+6 days'))->format('Y-m-d');

			$startOfWeek = $startOfWeek->format('Y-m-d');

			return $date >= $startOfWeek && $date <= $endOfWeek;
		}
    }

?>