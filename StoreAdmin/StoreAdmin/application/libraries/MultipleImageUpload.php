<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MultipleImageUpload
 *
 * @author KAMAL
 */
class MultipleImageUpload {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

    public function MultiUploadImage(){
        $files = $_FILES['userfile']['name'];
        
        for ($index = 0; $index < count($files); $index++) {
            $random_digit = rand(0, 99999999);
            $file_name = $random_digit.$_FILES['userfile']['name'][$index];
            $file_size = $_FILES['userfile']['size'][$index];
            $file_tmp  = $_FILES['userfile']['tmp_name'][$index];
            $file_type = $_FILES['userfile']['type'][$index];
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
                echo 'complate';
            }            
        }
    }
}
