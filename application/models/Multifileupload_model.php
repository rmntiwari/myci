<?php
 if(!defined('BASEPATH'))exit('Direct access not allowed');

 class Multifileupload_model extends CI_Model
 {
     public function __construct()
     {
         parent::__construct();
     }

     public function uploadfileinbd($batch_data){

         $insert= $this->db->insert_batch("files",$batch_data);
         //var_dump($this->db->last_query());
        return $insert?true:false;
     }

     public function getallfiles($id='')
     {
         $this->db->select('id,file_name,created');
         $this->db->from('files');

         if($id){
             $this->db->where('id', $id);
             $query = $this->db->get();
             $result = $query->row_array();
         }
         else{
             $this->db->order_by('created');
             $query= $this->db->get();
             $result=$query->result_array();

         }
         return (!empty($result))?$result:false;
     }
 }