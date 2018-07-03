<?php
if(!defined('BASEPATH'))exit("Direct access not allowed");
class Imagegallery_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function uploadimage($data){

        $query = $this->db->insert('gallery', $data);
       return $this->db->insert_id();
    }

    public function getimages(){
        $query = $this->db->get('gallery');
        $ret = $query->result_array();
       return $ret;

    }

    public function deleteimage($id){


        $deleted_img_name = $this->getimagebyid($id);
        $deleted_img_name[0]['name'] ;
        $chkpath = FCPATH . 'images\\'.$deleted_img_name[0]['name']; //C:\xampp\htdocs\raman\myci\images\Jellyfish.jpg

        if(file_exists( $chkpath )){
            unlink($chkpath);
        }

        $this->session->set_userdata( 'deleted_imgname', $deleted_img_name[0]['name'] );
        $this->db->where('id' , $deleted_img_name[0]['id']);
        $delflag = $this->db->delete('gallery');
        return $delflag;
    }

    public function getimagebyid($id){

        $img_id= $id['id'];

       $query = $this->db->get_where('gallery',array('id'=> $img_id));

       $result = $query->result_array();

       return $result;


    }
}

