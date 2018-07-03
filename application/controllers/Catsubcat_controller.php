<?php 

class Catsubcat_controller extends CI_Controller{


	function __construct(){

		parent::__construct();
		//$this->load->helper(array('url','form'));
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('catsubcat_model');

	}

	public function getcategory(){

		
		//$allcategories = $this->catsubcat_model->getcategories();
		$allcategories = $this->catsubcat_model->get_categories();
		echo"</pre>";
		//var_export($allcategories) ; 
		print_r(json_encode($allcategories));
		$data['categories']= $allcategories;
		//$this->load->view('product_category',$data);
		$this->load->view('category/view',$data);
	}

	public function editcategory($cat_id){

		 if($this->input->post()){

		 	$cat_info=array();
		 	//$this->catsubcat_model->setcategoriesbyid($cat_info);
		 }
		 else{

		 	$data['category'] = $this->catsubcat_model->getcategoriesbyid($cat_id);
			$this->load->view('category/edit' , $data );
		 }
		
	}

	public function delcategory($cat_id){

		var_dump($cat_id);
	}

	public function addcategory(){

		
	}
	 
}


 ?> 