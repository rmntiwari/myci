<?php

class Category_controllertest extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

    }
    public function index(){

        $this->load->view('rmnshop/categorylist');

        $this->load->model('category_modeltest','category');
        $allcategories  = $this->category->get_category();

        echo"<pre>";
        print_r($allcategories);

    }
    public function add_catogery(){


    }
}