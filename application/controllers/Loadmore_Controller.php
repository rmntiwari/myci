<?php
 if(!defined('BASEPATH')) exit('No direct script access allowed');

 class Loadmore_Controller extends CI_Controller
 {
     public function __construct()
     {
         parent::__construct();
         $this->load->database();
         $this->load->helper('url');
     }

     public function index(){
        //echo"use getcustomers function ";
         $this->load->view("loadmore_view");
     }

     public function getcustomers()
     {
        // $page = $_GET['page'];

         $mypage='';
         if(isset($_REQUEST['page'])){
             $mypage = $_REQUEST['page'];
         }

         $limit = 10;
         $offset= 10*$mypage;

         $this->load->model('loadmore_model');
         $data= $this->loadmore_model->showcustomers($limit, $offset);
         $this->load->view("loadmore_view");

         foreach($data as $row){
             echo"<tr>

                    <td>".$row->customerNumber."</td>
                    <td>".$row->customerName."</td>                    
                    <td>".$row->contactLastName."</td>
                    <td>".$row->contactFirstName."</td>
                    <td>".$row->phone."</td>
                    <td>".$row->addressLine1."</td>
                    <td>".$row->addressLine2."</td>
                    <td>".$row->city."</td>
                    <td>".$row->state."</td>
                    <td>".$row->country."</td>
                    <td>".$row->salesRepEmployeeNumber."</td>
                    <td>".$row->creditLimit."</td>
                    
                    </tr>";
         }

         exit;
     }
 }