<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author KAMAL
 */
class CategoryModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function Insert($data){
        if($this->db->insert('category', $data)){
            return $this->db->insert_id();
        }
        
    }
    
    public function Get($id=''){
        if($id==''):
            $this->db->where('status','1');
            $query = $this->db->get('category');
        else:
            $this->db->where('cat_id',$id);
            $this->db->where('status','1');
            $query = $this->db->get('category');
        endif;
        return $query->result();
    }
    
    public function Update($data, $id){
        $this->db->where('cat_id', $id);
        $this->db->update('category', $data);    
        return true;
    }
    
    public function Delete($id){
        $data = array(
            "status" => '0'
        );
        $this->db->where('cat_id', $id);
        $this->db->update('category', $data);   
        return true;
    }
}
