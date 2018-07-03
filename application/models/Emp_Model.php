<?php

/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 12/20/2016
 * Time: 2:37 PM
 */
class Emp_Model extends CI_Model
{
    function __construct()
    {
         parent::__construct();
    }

    function insert($data){
        $res = $this->db->insert('employees', $data);
        if($res){
            return true;
        }else{

            echo"somthing going wrong"; exit;
        }
    }
    
    function showemp(){
        $query= $this->db->get('employees');
        $data['records'] = $query->result();
        // return  $data['records'] ;
        return  $data;
    }

    function totalemp(){
        $query = $this->db->get('employees');
        $rowcount = $query->num_rows();
        return $rowcount;
    }


    // Fetch data according to per_page limit.
    public function fetch_data($limit, $pageid) {
        $this->db->limit($limit);
        //$this->db->where('id', $pageid);
        $query = $this->db->get("employees");
        if ($query->num_rows() > 0) {
            $data['records'] = $query->result();
            //var_dump($data['records']); exit;
            return $data;
        }

    }





    function delemp($id){
        $this->db->where('employeeNumber', $id);
       // $this->db->delete('employees');
        $data = array('status' => 0);
        $this->db->update('employees',$data);
    }

    function updateemp($data, $id){
        $this->db->where('employeeNumber', $id);
        $this->db->update('employees',$data);
       
    }

    function getuserbyid( $uid ){
        
    }

    function checklogin($uid, $pass){

        //$this->db->select(array('email','password'));
       // $this->db->from('employees');
       // var_dump($this->db->select('employees', array('email','password'))); exit;
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('email', $uid);
        $this->db->where('pass', $pass);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}