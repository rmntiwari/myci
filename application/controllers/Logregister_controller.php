<?php

/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 1/4/2017
 * Time: 11:01 AM
 */
class Logregister_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
         if( $this->input->post('email') ) {
               $this->login();
         }
         else{
 

                echo "baseurl(base_url()) = ". base_url()."<br>";
                 echo "siteurl(site_url()) = ". site_url() ."<br>" ;
                  echo "BASEPATH = ". BASEPATH ."<br>";
                   echo "APPPATH =". APPPATH ."<br>";


              $this->load->view('logregister/loginform');  
         }
    }

    public function registeration()
    {
        $this->load->view('logregister/registrationform');
    }

    private function login()
    {
        $this->load->library('session');
        $uid= $this->input->post('email');
        $pass= $this->input->post('password');

        $this->load->model('emp_model');

        $res= $this->emp_model->checklogin($uid, $pass);
        if($res == true){
            $this->session->set_userdata(array("email"=>$uid));

            redirect('emp_controller');
        }else{
           $this->session->set_flashdata('message', 'Wrong credential plz try again !! ');
           $data['message'] = $this->session->flashdata('message');
           $this->load->view('logregister/loginform', $data);
        }
    }

    function registeruser()
    {

        $this->load->helper('url');
        $this->load->model('emp_model');
        $this->load->library('session');
        $email= $this->input->post('email');
        $pass = $this->input->post('password');

      
        $data= array('email' => $email,
            'pass' => $pass );

        $res= $this->emp_model->insert($data);
        if($res){
            //redirect('logregister_controller/index', 'refresh');
            $this->session->set_flashdata('message', 'Registered successfully !! ');
            $data['message'] = $this->session->flashdata('message');
            $this->load->view('logregister/loginform', $data);
        }
        else{
            die("not registered ... something going wrong");
        }

    }
}