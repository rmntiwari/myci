<?php
if(!defined('BASEPATH'))exit("No direct access of script allowed");

class Mycategory_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->load->view('mycategory/view');
    }
}