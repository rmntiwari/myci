<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategory
 *
 * @author KAMAL
 */
class SubCategory extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('SubCategoryModel');
        $this->load->model('CategoryModel');
    }
    
    public function index(){
        $data['records'] = $this->SubCategoryModel->Get();
        $data['category'] = $this->CategoryModel->Get();
        $this->load->view('subcategory/view',$data);
    }

    public function Add(){
        $data['category'] = $this->CategoryModel->Get();
        $this->load->view('subcategory/add',$data);
    }
    
    
    public function Insert(){
        $name = $this->input->post('name');
        $keyword = $this->input->post('keyword');
        $cat_id = $this->input->post('catid');
        
        $subcat_id = $this->input->post('subcatid');
        
        $config['upload_path']          = './uploads/subcategory/';
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
                    "subcat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "image" => $upload['file_name'],
                    "keyword" => $keyword
                );
            }else{
                $data = array(
                    "cat_id" => $cat_id,
                    "subcat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "keyword" => $keyword
                );
            }
            if($subcat_id == ''):        
                if($this->SubCategoryModel->Insert($data)):
                    $this->session->set_tempdata('message', "Successfully Saved!", 3);
                endif;
            else:  
                if($this->SubCategoryModel->Update($data, $subcat_id)):
                    $this->session->set_tempdata('message', "Successfully Updated!", 3);
                endif;
            endif;
            redirect('../SubCategory/', 'refresh');
        }
    }
    
    
    public function Edit($id){
        $data['category'] = $this->CategoryModel->Get();
        $data['records'] = $this->SubCategoryModel->Get($id);
        $this->load->view('subcategory/edit',$data);
    }    
    
    public function Delete($id){
        if($this->SubCategoryModel->Delete($id)){
            $this->session->set_tempdata('message', "Successfully Removed!", 3);
        }
        redirect('../SubCategory/', 'refresh');
    }    
}
