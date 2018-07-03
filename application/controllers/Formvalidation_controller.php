<?php

class Formvalidation_controller extends CI_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
	}

	public function index(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() == false){

			$this->load->view('/formvalidation/form1');
		}
		else
		{

			$this->load->view('/formvalidation/successform');
		}
	}
}

?>