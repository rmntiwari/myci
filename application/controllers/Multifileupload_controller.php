<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Multifileupload_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->library('session');
        $this->load->model('multifileupload_model');


    }

    public function index()
    {
        $data['files'] = $this->multifileupload_model->getallfiles();

        $this->load->view('multiplefielupload_view', $data);

    }

    public function uploadfiles(){

        if(($this->input->post()) &&( $_FILES['userFiles']['name'] != '')){

            $no_of_files =  count( $_FILES['userFiles']['name']);

            for($i=0; $i<$no_of_files; $i++){

                $_FILES['userfile']['name'] =  $_FILES['userFiles']['name'][$i];
                $_FILES['userfile']['type'] =  $_FILES['userFiles']['type'][$i];
                $_FILES['userfile']['error'] =  $_FILES['userFiles']['error'][$i];
                $_FILES['userfile']['tmp_name'] =  $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userfile']['size'] =  $_FILES['userFiles']['size'][$i];

                $image_path = realpath(APPPATH . '../images');
                $config= array(

                    "upload_path" =>$image_path,
                    "allowed_types" => "gif|jpg|png",
                    'max_size'      => 3000,
                    'overwrite'     => FALSE,

                );

                $this->load->library('upload', $config);
               $tst=  $this->upload->initialize($config);

               if($this->upload->do_upload('userfile')){
                   $fileData = $this->upload->data();
                   $uploadData[$i]['file_name'] = $fileData['file_name'];
                   $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                   $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
               }

            }//end for


            if(!empty($uploadData)){

                $result = $this->multifileupload_model->uploadfileinbd($uploadData);
                if($result){
                    $this->session->set_flashdata('statusMsg', 'Files are uploaded successfully' );
                }else{
                    $this->session->set_flashdata('statusMsg', 'Oops!!!! Unable to save  files in database' );
                }
            }

            $data['files'] = $this->multifileupload_model->getallfiles();

            $this->load->view('multiplefielupload_view', $data);


        }//end if post
    }

    public function deletefiles(){


        $deletedids= $this->input->post('deltedroid');
        $this->db->where_in('id', $deletedids);
        $stts =  $this->db->delete('files');
        if($stts){
            $this->session->set_flashdata('statusMsg', 'Files are deleted successfully' );
        }
        else{
            $this->session->set_flashdata('statusMsg', 'Files are not deleted, something going wrong' );
        }


        $data['files'] = $this->multifileupload_model->getallfiles();

        $this->load->view('multiplefielupload_view', $data);
    }

}//end class block