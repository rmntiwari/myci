<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Feature
 *
 * @author KAMAL
 */
class Feature extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("CategoryModel");
        $this->load->model("SubCategoryModel");
        $this->load->model("FeatureModel");
    }
    
    public function index(){
        $data["feature"] = $this->FeatureModel->Get();
        $data["subcategory"] = $this->SubCategoryModel->Get();
        $data["category"] = $this->CategoryModel->Get();
        $this->load->view('feature/view',$data);
    }
     
    public function Add(){
        $data["category"] = $this->CategoryModel->Get();
        $this->load->view('feature/add',$data);
    }       
    public function SubCat(){
        $id = $this->input->post('id');
        $data['subcategory'] = $this->SubCategoryModel->SubCatFilter($id);
        echo "<option value=''>Select Sub Category</option>";
        for($row=0; $row<count($data['subcategory']); $row++):
            echo "<option value=".$data['subcategory'][$row]->subcat_id.">".$data['subcategory'][$row]->subcat_name."</option>";
        endfor;
    }
    
    public function Insert(){
        $name = $this->input->post('name');
        $keyword = $this->input->post('keyword');
        $values = implode(",",$this->input->post('value'));

        $cat_id = $this->input->post('catid');
        $subcat_id = $this->input->post('subcatid');
        $feature_id = $this->input->post('featureid');
        
//        $config['upload_path']          = './uploads/brand/';
//        $config['allowed_types']        = 'gif|jpg|png';
//        $config['file_name']            = rand(0,99999999);
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

//        $this->upload->initialize($config);
        
//        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0){
//            print_r($this->upload->display_errors());
//        }
//        else{
//            if($_FILES['image']['size'] != 0){
//                $upload = $this->upload->data();
//                $data = array(
//                    "cat_id" => $cat_id,
//                    "subcat_id" => $subcat_id,
//                    "name" => $name,
//                    "metadesc" => $name,
//                    "description" => $name,
//                    "image" => $upload['file_name'],
//                    "keyword" => $keyword
//                );
//            }else{
                $data = array(
                    "cat_id" => $cat_id,
                    "subcat_id" => $subcat_id,
                    "feature_name" => $name,
                    "feature_values" => $values,
                    "metadesc" => $name,
                    "description" => $name,
                    "keyword" => $keyword
                );
//            }
            if($feature_id == ''):        
                if($this->FeatureModel->Insert($data)):
                    $this->session->set_tempdata('message', "Successfully Saved!", 3);
                endif;
            else:  
                if($this->FeatureModel->Update($data, $feature_id)):
                    $this->session->set_tempdata('message', "Successfully Updated!", 3);
                endif;
            endif;
            redirect('../Feature/', 'refresh');
//        }
    }
    
    public function Delete($id){
        if($this->FeatureModel->Delete($id)){
            $this->session->set_tempdata('message', "Successfully Removed!", 3);
        }
        redirect('../Feature/', 'refresh');
    }   
}
