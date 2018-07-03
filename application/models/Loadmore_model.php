<?php
 if(!defined('BASEPATH')) exit("no direct access allowed");
 class Loadmore_model extends CI_Model
 {
     public function __construct()
     {
         parent::__construct();

     }
     public function index()
     {
         echo "I AM FROM  LOAD MORE MODEL";
     }
     public function showcustomers( $limit , $offset)
     {
         $this->db->limit( $limit, $offset );
         $query= $this->db->get("customers");
         $data = $query->result();
         return $data;
     }
 }