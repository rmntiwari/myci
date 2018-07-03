<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function record_count()
    {
        //return $this->db->count_all("customers");
        /*$query = $this->db->get('emp');
        $rowcount = $query->num_rows();
        return $rowcount;
        */
        $query = $this->db->get('customers');
        $total=  $query->num_rows();
        return $total;

    }

    public function fetch_data($limit, $pageno)
    {
        $startfrom = $pageno * $limit - $limit;
        $this->db->limit($limit, $startfrom);
        //$this->db->where('id', $id);
        $query = $this->db->get("customers");
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                $data[]= $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }

}