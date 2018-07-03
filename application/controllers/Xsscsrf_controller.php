<?php

class Xsscsrf_controller extends CI_Controller{



	
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');		 
		$this->load->helper('security');

	}

	public function index(){

			$this->load->view('xss');
			var_dump(base_url());
		 
	}

	public function data_submitted(){

		$data['non_xss'] = array(

			'employee_name' => $this->input->post('emp_name'),
			'employee_email' => $this->input->post('emp_email'),

		);
		 
		 $data['xss_data']= $this->security->xss_clean($data['non_xss']);

		 $this->load->view('xss',$data);
	}


}



?>