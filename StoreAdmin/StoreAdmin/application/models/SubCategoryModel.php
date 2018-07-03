<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategoryModel
 *
 * @author KAMAL
 */
class SubCategoryModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function Insert($data){
        if($this->db->insert('sub_category', $data)){
            return $this->db->insert_id();
        }
        
    }
    
    public function Get($id=''){
        if($id==''):
            $this->db->where('status','1');
            $query = $this->db->get('sub_category');
        else:
            $this->db->where('subcat_id',$id);
            $this->db->where('status','1');
            $query = $this->db->get('sub_category');
        endif;
        return $query->result();
    }
    
    public function Update($data, $id){
        $this->db->where('subcat_id', $id);
        $this->db->update('sub_category', $data);    
        return true;
    }
    
    public function Delete($id){
        $data = array(
            "status" => '0'
        );
        $this->db->where('subcat_id', $id);
        $this->db->update('sub_category', $data);   
        return true;
    }
    
    public function SubCatFilter($id){
        $this->db->where('status','1');
        $this->db->where('cat_id',$id);
        $query = $this->db->get('sub_category');
        return $query->result();
    }
}

