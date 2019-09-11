<?php 
	// namespace App\Models;
	
	class Certificate extends Controller
	{
		public function get()
		{
			$this->library(['session']);
			return $this->session->sessionData('logged_in','certificate');
		}
	}
?>