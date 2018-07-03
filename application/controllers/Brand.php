<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Brand
 *
 * @author KAMAL
 */
class Brand extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('BrandModel');
        $this->load->model('CategoryModel');
        $this->load->model('SubCategoryModel');
    }
    
    public function index(){
        $data['brand'] = $this->BrandModel->Get();
        $data['category'] = $this->CategoryModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $this->load->view('brands/view',$data);
    }
     
    public function Add(){
        $data['category'] = $this->CategoryModel->Get();
        $this->load->view('brands/add',$data);
    }   

    public function Edit($id){
        $data['brand'] = $this->BrandModel->Get($id);
        $data['category'] = $this->CategoryModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $this->load->view('brands/edit',$data);
    }   

    
    public function Insert(){
        $name = $this->input->post('name');
        $keyword = $this->input->post('keyword');

        $cat_id = $this->input->post('catid');
        $subcat_id = $this->input->post('subcatid');
        $brand_id = $this->input->post('brandid');
        
        $config['upload_path']          = './uploads/brand/';
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
                    "cat_id" => $cat_id,
                    "subcat_id" => $subcat_id,
                    "brand_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "image" => $upload['file_name'],
                    "keyword" => $keyword
                );
            }else{
                $data = array(
                    "cat_id" => $cat_id,
                    "subcat_id" => $subcat_id,
                    "brand_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "keyword" => $keyword
                );
            }
            if($brand_id == ''):        
                if($this->BrandModel->Insert($data)):
                    $this->session->set_tempdata('message', "Successfully Saved!", 3);
                endif;
            else:  
                if($this->BrandModel->Update($data, $brand_id)):
                    $this->session->set_tempdata('message', "Successfully Updated!", 3);
                endif;
            endif;
            redirect('../Brand/', 'refresh');
        }
    }
    
    public function SubCat(){
        $id = $this->input->post('id');
        $data['subcategory'] = $this->SubCategoryModel->SubCatFilter($id);
        echo "<option value=''>Select Sub Category</option>";
        for($row=0; $row<count($data['subcategory']); $row++):
            echo "<option value=".$data['subcategory'][$row]->subcat_id.">".$data['subcategory'][$row]->subcat_name."</option>";
        endfor;
    }
    
    
    public function Delete($id){
        if($this->BrandModel->Delete($id)){
            $this->session->set_tempdata('message', "Successfully Removed!", 3);
        }
        redirect('../Brand/', 'refresh');
    }     
}
