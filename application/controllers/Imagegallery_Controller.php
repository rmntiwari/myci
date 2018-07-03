<?php

if(!defined('BASEPATH'))exit("Direct access not allowed");

class Imagegallery_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('imagegallery_model');
        //$this->load->library('session');
        $this->load->helper('file');
    }

    public function index()
    {
        $this->load->view('imagegallery_view');
       

    }

    public function do_upload(){
        
   
       $config['upload_path'] =   "uploads/";
       $config['allowed_types']        = 'gif|jpg|png|txt|doc|pdf';
       $config['max_size']             = 20480000;
       $config['max_width']            = 1024896789;
       $config['max_height']           = 7687986787;

       $this->load->library('upload', $config);


       if(!$this->upload->do_upload('userfile')){
           $error = array('error' => $this->upload->display_errors());

           foreach($error as $key=>$value){
                echo '<ol class = "alert alert-danger"><li>'. $value .'</li></ol>';
           }
          
       }
       else{
            $data = array('upload_data' => $this->upload->data());
           foreach($data as $row){
                $rodata= array(

                    'name'=>$row['file_name'],
                    'path'=>$row['full_path'],
                );

           }
           $inserted_id = $this->imagegallery_model->uploadimage($rodata);
           if($inserted_id){
               echo'<h4 style="color:green">Image uploaded Succesfully</h4>';
               exit;
           }
       }
    }

    public function fillGallery()
    {

      die("hellooooo");
        $list ='';
         $dbimages = $this->imagegallery_model->getimages();
        // $tst= base_url().'uploadimg/'.$imglist['name'];


         foreach($dbimages as $imglist){

             $image_path =  base_url().'images/'.$imglist['name'];
             $id = $imglist['id'];
             $alt = $imglist['name'];
             $chkpath = FCPATH . 'images\\'.$imglist['name'] ;


             if(file_exists($chkpath))
             {


                $list .='<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="  box-shadow: 10px 10px 5px #888888; margin-bottom:10px;">
                          <a class="thumbnail  example_group"   data-fancybox="gallery" rel="ligthbox" href="'.$image_path.'" >
                            <img class="img-responsive" alt="" src="'.$image_path.'" />
                            
                             </a>     
                            <div class="text-right">
                                <small class="text-muted">"'.$alt.'"</small>
                            </div> <!-- text-right / end -->
                           
                                          
                            <span id= "'.$id.'" style="margin-bottom:5px;" class="btn btn-info btn-block btn-delete"><i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;&nbsp;Delete</span>
                         
                        </div>';
             }
         }

         echo $list;
         exit;
    }

    public function deleteimg(){
       $imgid = $this->input->post();
       $result = $this->imagegallery_model->deleteimage($imgid);
       $msg =  $this->session->userdata('deleted_imgname');
       if($result){
           echo"1";
           exit;
       }
       else{
           echo "0";
       exit;
       }

    }
}
