<?php
	
	class Twitterauth_controller extends CI_Controller{


		function __construct(){

			parent::__construct();
		}


		public function index(){

			echo "hello twitter";
header("Content-type: text/plain");
			PRINT_R($_SERVER);
		}










	}


?>