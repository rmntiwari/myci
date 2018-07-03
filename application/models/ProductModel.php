<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductModel
 *
 * @author KAMAL
 */
class ProductModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function Insert($data){
        if($this->db->insert('product', $data)){
            return $this->db->insert_id();
        }
        
    }
    
    public function InsertImage($data){
        if($this->db->insert('product_images', $data)){
            return $this->db->insert_id();
        }
        
    }    
    
    public function Get($id=''){
        if($id==''):
            $this->db->where('status','1');
            $query = $this->db->get('product');
        else:
            $this->db->where('product_id',$id);
            $this->db->where('status','1');
            $query = $this->db->get('product');
        endif;
        return $query->result();
    }
    
    public function Update($data, $id){
        $this->db->where('productcat_id', $id);
        $this->db->update('product_category', $data);    
        return true;
    }       
    
    public function Delete($id){
        $data = array(
            "status" => '0'
        );
        $this->db->where('productcat_id', $id);
        $this->db->update('product_category', $data);   
        return true;
    }  
    
    public function Feature($id){
        $this->db->where('status','1');
        $this->db->where('subcat_id',$id);
        $query = $this->db->get('features');
        return $query->result();
    }
    
    public function ProCatFilter($id){
        $this->db->where('status','1');
        $this->db->where('subcat_id',$id);
        $query = $this->db->get('product_category');
        return $query->result();
    }
    
}


