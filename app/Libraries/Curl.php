<?php
/**
 * 
 * Title: Curl
 * Version: 1.0
 * Note: Needs more testing
 * Description: Makes API calls
 * 
 */

    Class Curl
    {    
        protected $url;
        protected $queries = array();
        protected $headers = array();

        public function _construct()
        {

        }

        public function url($url)
        {
            $this->url = $url;
            return $this;
        }

        public function query($query)
        {
            $this->queries = $query;
            return $this;
        }

        public function header($header)
        {
            $this->headers = $header;
            return $this;
        }

        public function collect()
        {

            $url        = $this->url;
            $queries    = $this->queries;
            $headers    = $this->headers;

            $curl = curl_init($url);

			if(count($queries)>0):
				curl_setopt($curl, CURLOPT_POST, TRUE);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($queries));
			endif;

			if(count($headers)>0)
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($curl, CURLOPT_FAILONERROR , TRUE);
			
			$response = curl_exec($curl);
			$error    = curl_error($curl);
			$errno    = curl_errno($curl);

			if (is_resource($curl))
				curl_close($curl);

			if ($errno !== 0)
				return array('success' => false, 'error_code' => $errno, 'error_note' => $error);
			
			return array('success' => true, 'data' => $response);
        }

}