<?php
 if(!defined('BASEPATH'))exit("Direct access not allowed");

 class Product_controller extends CI_Controller
 {
     public function __construct()
     {
         parent::__construct();
         $this->load->database();
         $this->load->helper('url');
         $this->load->library('session');
         $this->load->model('product_model');
     }

     public function index(){

        /// $this->product_model()
         $this->load->view('products_view', $data);


         $this->load->view('footer');
     }

     public function quickview(){
         $this->load->view('product_details_view');
     }

     public function addtocart()
     {
         echo "going to add in cart ";
     }
 }

