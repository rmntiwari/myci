<?php


class Statecity_controller  extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('statecity_model');
	}

	public function index(){

		 $this->load->view('statecity_v');
		
	}

	public function getcountry(){

		 
		 $countries = $this->statecity_model->getcountries();		  
		 echo  json_encode($countries);
		  
	}
	public function getstate(){
			$country_id = $_REQUEST['country_id'];
		  $stats = $this->statecity_model->getstates($country_id);		  
		 echo  json_encode($stats); 
	}

	public function getcity(){

			 $state_id = $this->input->post('state_id');
			 $city =$this->statecity_model->getcities($state_id);
			 echo json_encode($city);
	}
}


?>