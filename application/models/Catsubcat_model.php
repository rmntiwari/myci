<?php

class Catsubcat_model extends CI_Model{
	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Catsubcat_model');
		 
	}

	public function addcategory(){


	}
	public function updatecategory(){


	}

	public function deletecategory(){

	}

	/*public function getcategories(){

		$this->db->select('*');
        $this->db->from('category_common');
        $this->db->where('cat_parent', 0);
        $parent = $this->db->get();
        $root_categorys = $parent->result();

        $i=0;
        foreach ($root_categorys as $cat ){
        	 
            $root_categorys[$i]->sub = $this->get_subcategory($cat->cat_id);
            $i++;
        }

        return $root_categorys;
	}

	public function get_subcategory($cat_id){

		 
         $this->db->select('*');
         $this->db->from('category_common');
         $this->db->where('cat_parent',$cat_id);
         $child = $this->db->get();
         $categorys = $child->result();
        // var_dump($categorys);
        $i=0;
         foreach($categorys as $cat){

            $categorys[$i]->sub =$this->get_subcategory($cat->cat_id);
             $i++;
         }

        return $categorys;
    }*/


    public function get_categories(){

    	$query = $this->db->get_where('category_common', array('cat_parent' => 0));

    	$root_categorys = $query->result();

    	$i=0;
    	foreach ($root_categorys as $cat) {     	

			$root_categorys[$i]->sub = $this->get_subcategories($cat->cat_id);
    		 $i++; 
    	}

    	return $root_categorys;

    }
    public function get_subcategories($catid){
    	 
    	
    	$subcategory_query = $this->db->get_where('category_common', array('cat_parent' => $catid));
    	$subcategory= $subcategory_query->result();

    	 $i=0;
    	foreach ($subcategory as $subcat) {
    		 
    		$subcategory[$i]->sub = $this->get_subcategories($subcat->cat_id);
    		$i++;
    	}
    	
     	return $subcategory;
    }



	public function getcategoriesbyid($cat_id){

        $this->db->where(array('cat_id' => $cat_id));
        $query = $this->db->get('category_common');
        return $result = $query->result();

    }
    public function setcategoriesbyid($cat_info){

		/*$this->db->where(array('cat_id' => $cat_id));
		$query = $this->db->get('category_common');
		return $result = $query->result_array($query);*/

	}
	
	public function getsubcategories($parent_cat_id){

		$this->db->where(array('cat_parent' => $parent_cat_id));
		$query = $this->db->get('category_common');
		return $result = $query->result_array($query);
	}

	 

	


}


?>