<?php

class Login extends CI_Controller
{
   function __construct()
   {
   		parent::__construct();
   		$this->load->database();
   		$this->load->helper('url');

       $this->load->library('ion_auth');

   }

   public function index()
   {
      $this->load->view('login/loginform');

   }
    public function login1()
   {
   		 
   		$this->load->view('login1/loginform');

   }

   public function dologin(){

       var_dump($this->input->post());
      $id = $this->input->post('loginid');
      $pass = $this->input->post('loginpass');

      var_dump($id, $pass);
   }

}