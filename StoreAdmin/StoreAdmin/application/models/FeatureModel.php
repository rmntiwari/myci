<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeatureModel
 *
 * @author KAMAL
 */
class FeatureModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function Insert($data){
        if($this->db->insert(' features', $data)){
            return $this->db->insert_id();
        }
        
    }
    
    public function Get($id=''){
        if($id==''):
            $this->db->where('status','1');
            $query = $this->db->get(' features');
        else:
            $this->db->where('feature_id',$id);
            $this->db->where('status','1');
            $query = $this->db->get('features');
        endif;
        return $query->result();
    }
    
    public function Update($data, $id){
        $this->db->where('feature_id', $id);
        $this->db->update('features', $data);    
        return true;
    }       
    
    public function Delete($id){
        $data = array(
            "status" => '0'
        );
        $this->db->where('feature_id', $id);
        $this->db->update('features', $data);   
        return true;
    }  
    
    public function Feature($id){
        $this->db->where('status','1');
        $this->db->where('subcat_id',$id);
        $query = $this->db->get('features');
        return $query->result();
    }
}
