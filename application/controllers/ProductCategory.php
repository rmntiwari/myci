<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductCategory
 *
 * @author KAMAL
 */
class ProductCategory extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("CategoryModel");
        $this->load->model("SubCategoryModel");
        $this->load->model("FeatureModel");
        $this->load->model("ProductCategoryModel");
    }
    
    public function index(){
        $data['category'] = $this->CategoryModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $data['productCategory'] = $this->ProductCategoryModel->Get();
        $this->load->view('productcategory/view',$data);
    }
    
    public function Add(){
        $data['category'] = $this->CategoryModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $this->load->view('productcategory/add',$data);
    }
    
    
    public function Insert(){
        $catid = $this->input->post('catid');
        $subcatid = $this->input->post('subcatid');
        $name = $this->input->post('name');
        $keyword = $this->input->post('keyword');
        $feature = implode(",",$this->input->post('feature'));
        $productcatid = $this->input->post('productcatid');
        
        $config['upload_path']          = './uploads/productcategory/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = rand(0,99999999);
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0){
            print_r($this->upload->display_errors());
        }
        else{
            if($_FILES['image']['size'] != 0){
                $upload = $this->upload->data();
                $data = array(
                    "cat_id" => $catid,
                    "subcat_id" => $subcatid,
                    "productcat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "feature_id" => $feature,
                    "image" => $upload['file_name'],
                    "keyword" => $keyword
                );
            }else{
                $data = array(
                    "cat_id" => $catid,
                    "subcat_id" => $subcatid,
                    "productcat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "feature_id" => $feature,
                    "keyword" => $keyword
                );
            }
            if($productcatid == ''):        
                if($this->ProductCategoryModel->Insert($data)):
                    $this->session->set_tempdata('message', "Successfully Saved!", 3);
                endif;
            else:  
                if($this->ProductCategoryModel->Update($data, $productcatid)):
                    $this->session->set_tempdata('message', "Successfully Updated!", 3);
                endif;
            endif;
            redirect('../ProductCategory/', 'refresh');
        }
    }    
    
    
    public function Edit($id){
        $data['category'] = $this->CategoryModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $data['record'] = $this->ProductCategoryModel->Get($id);
        $data['feature'] = $this->FeatureModel->Get();
        $this->load->view('productcategory/edit',$data);
    }     
    public function SubCat(){
        $id = $this->input->post('id');
        $data['subcategory'] = $this->SubCategoryModel->SubCatFilter($id);
        echo "<option value=''>Select Sub Category</option>";
        for($row=0; $row<count($data['subcategory']); $row++):
            echo "<option value=".$data['subcategory'][$row]->subcat_id.">".$data['subcategory'][$row]->subcat_name."</option>";
        endfor;
    }
    
    public function Feature(){
        $id = $this->input->post('id');
        $data['feature'] = $this->FeatureModel->Feature($id);
        $this->load->view('ajax_requests/featuresTable',$data);
    }
    
    public function Delete($id){
        if($this->ProductCategoryModel->Delete($id)){
            $this->session->set_tempdata('message', "Successfully Removed!", 3);
        }
        redirect('../ProductCategory/', 'refresh');
    }  
}
