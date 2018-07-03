<?php

class Category_modeltest extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_category(){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('parent_id','0');
        $parent = $this->db->get();
        $categorys = $parent->result();

        $i=0;
        foreach ($categorys as $cat ){
            $categorys[$i]->sub = $this->get_subcategory($cat->cat_id);
            $i++;
        }

        return $categorys;
    }

    public function create_category()
    {

    }

    public function update_category(){

    }
    public function delete_category(){

    }

    public function create_subcategory(){

    }

    public function get_subcategory($cat_id){

         $this->db->select('*');
         $this->db->from('categories');
         $this->db->where('parent_id',$cat_id);
         $child = $this->db->get();
         $categorys = $child->result();
        // var_dump($categorys);
        $i=0;
         foreach ($categorys as $cat){


            $categorys[$i]->sub =$this->get_subcategory($cat->cat_id);
             $i++;
         }
        return $categorys;
    }

    public function update_subcategory(){

    }

    public function delete_subcategory(){

    }
}