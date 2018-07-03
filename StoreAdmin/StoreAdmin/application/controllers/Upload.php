<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author KAMAL
 */
class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('image_lib');
                $this->load->library('multipleimageupload');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }
        

//        public function do_upload()
//        {
////                $config['upload_path']          =  './uploads/images/';
////                $config['allowed_types']        = 'gif|jpg|png';
////                $config['max_size']             = 100;
////                $config['max_width']            = 1024;
////                $config['max_height']           = 768;
//
//                $this->upload->initialize(array(
//			"upload_path"	=> "./uploads/images/"
//		));
//	
//                if ( ! $this->upload->do_multi_upload('userfile'))
//                {
//                        $error = array('error' => $this->upload->display_errors(),"path" => $config['upload_path'] );
//
//                        $this->load->view('upload_form', $error);
//                }
//                else
//                {
//                    //store the file info
//                    $image_data = $this->upload->data();
//                    $config['image_library'] = 'gd2';
//                    $config['source_image'] = $image_data['full_path']; //get original image
//                    $config['create_thumb'] = TRUE;
//                    $config['maintain_ratio'] = TRUE;
//                    $config['width'] = 50;
//                    $config['height'] = 50;
//                    $this->image_lib->initialize($config);
//                    if (!$this->image_lib->resize()) {
//                        $this->handle_error($this->image_lib->display_errors());
//                    }else{
//                        echo 'complate';
//                    }
//                }
//        }
        
        
        
    public function imageupload(){
        $files = $_FILES['userfile']['name'];
        
        for ($index = 0; $index < count($files); $index++) {
            $random_digit = rand(0, 99999999);
            $file_name = $random_digit.$_FILES['userfile']['name'][$index];
            $file_size = $_FILES['userfile']['size'][$index];
            $file_tmp  = $_FILES['userfile']['tmp_name'][$index];
            $file_type = $_FILES['userfile']['type'][$index];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            move_uploaded_file($file_tmp,"./uploads/images/".$file_name);
            
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./uploads/images/".$file_name; //get original image
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 50;
            $config['height'] = 50;
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                $this->handle_error($this->image_lib->display_errors());
            }else{
                $fileNameNoExtension = preg_replace("/\.[^.]+$/", "", $file_name).'_thumb.'.$file_ext;
                print_r($fileNameNoExtension);
            }            
        }
    }        
        
        
        
}
?>
