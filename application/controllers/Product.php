<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author KAMAL
 */
class Product  extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->model('FeatureModel');
        $this->load->model('ProductModel');
        $this->load->model('SubCategoryModel');
        $this->load->model('BrandModel');
        $this->load->model('ProductCategoryModel');
    }
    
    public function index(){
        $data['category'] = $this->CategoryModel->Get();
        $data['feature'] = $this->FeatureModel->Get();
        $data['subcategory'] = $this->SubCategoryModel->Get();
        $data['brand'] = $this->BrandModel->Get();
        $data['product'] = $this->ProductModel->Get();
        $this->load->view('product/view',$data);
    }
     
    public function Add(){
        $data['category'] = $this->CategoryModel->Get();
        $data['brand'] = $this->BrandModel->Get();
        $this->load->view('product/add',$data);
    } 
    
    public function Insert(){
        
        $name = $this->input->post('name');
        $catid = $this->input->post('catid');
        $subcatid = $this->input->post('subcatid');
        $productcatid = $this->input->post('productcatid');
        $brandid = $this->input->post('brandid');
        $keyword = $this->input->post('keyword');
        $rprice = $this->input->post('rprice');
        $discount = $this->input->post('discount');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $description = $this->input->post('description');
        
        //options inputs
        $options_names = $this->input->post('options_names');
        $options_values = array();
        $options_counting = $this->input->post('options_counting');
        for ($index = 1; $index <= $options_counting; $index++) {
            array_push($options_values, $this->input->post('options_values'.$index));
        }
        $options = json_encode(array_combine($options_names, $options_values));
        
        $productid = $this->input->post('productid');

        $data = array(
            "cat_id" => $catid,
            "subcat_id" => $subcatid,
            "productcat_id" => $productcatid,
            "brand_id" => $brandid,
            "product_name" => $name,
            "r_price" => $rprice,
            "options" => $options,
            "offer_discount" => $discount,
            "offer_s_date" => $start_date,
            "offer_e_date" => $end_date,
            "keyword" => $keyword,
            "metdesc" => $name,
            "description" => $description
        );
        
        
        if($productid == ''):    
            if($this->ProductModel->Insert($data)):
                $this->session->set_tempdata('message', "Successfully Saved!", 3);
                if($insertid){
                    $files = $_FILES['images']['name'];

                    for ($index = 0; $index < count($files); $index++) {
                        $random_digit = rand(0, 99999999);
                        $file_name = $random_digit.$_FILES['images']['name'][$index];
                        $file_size = $_FILES['images']['size'][$index];
                        $file_tmp  = $_FILES['images']['tmp_name'][$index];
                        $file_type = $_FILES['images']['type'][$index];
                        $file_ext= pathinfo($file_name, PATHINFO_EXTENSION);
                        move_uploaded_file($file_tmp,"./uploads/Products/".$file_name);
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = "./uploads/Products/".$file_name; //get original image
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = 100;
                        $config['height'] = 130;
                        $this->image_lib->initialize($config);
                        if (!$this->image_lib->resize()) {
                            $this->handle_error($this->image_lib->display_errors());
                        }else{
                            $data_image = array(
                                "product_id" => $insertid,
                                "img_name" => $file_name,
                                "tumb_name" => preg_replace("/\.[^.]+$/", "", $file_name)."_thumb.".$file_ext
                            );
                            $this->ProductModel->InsertImage($data_image);
                        }            
                    } 
                }    
            endif;
        else:  
            if($this->ProductModel->Update($data, $productcatid)):
                $this->session->set_tempdata('message', "Successfully Updated!", 3);
            endif;
        endif;
        redirect('../Product/', 'refresh');
        
        
    }

    public function SubCat(){
        $id = $this->input->post('id');
        $data['subcategory'] = $this->SubCategoryModel->SubCatFilter($id);
        echo "<option value=''>Select Sub Category</option>";
        for($row=0; $row<count($data['subcategory']); $row++):
            echo "<option value=".$data['subcategory'][$row]->subcat_id.">".$data['subcategory'][$row]->subcat_name."</option>";
        endfor;
    }
    
    public function ProductCat(){
        $id = $this->input->post('id');
        $data['productcategory'] = $this->ProductCategoryModel->ProCatFilter($id);
        echo "<option value=''>Select Product Category</option>";
        for($row=0; $row<count($data['productcategory']); $row++):
            echo "<option value=".$data['productcategory'][$row]->productcat_id.">".$data['productcategory'][$row]->productcat_name."</option>";
        endfor;
    }
    
    
    public function OptionsCat(){
        $id = $this->input->post('id');
        $data['productcategory'] = $this->ProductCategoryModel->Get($id);
        $data['feature'] = $this->FeatureModel->Get();
        $this->load->view('ajax_requests/featuresTableProduct',$data);
    }
    
    
   
}
