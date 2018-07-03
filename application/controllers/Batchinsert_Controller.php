<?php
if(!defined('BASEPATH'))exit("Direct access not allowed");

CLASS Batchinsert_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function index()
    {
       // echo "this is test ";
        $this->load->view('batchinsert_view');
    }

    public function batchinsert(){

        $this->load->model('batch_model');
         $result = $this->batch_model->batchinsertfunction($_POST);
         return $result;

    }

}