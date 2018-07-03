<?php


class Category extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');

    }
    
    public function index()
    {
        $data['records'] = $this->CategoryModel->Get();
        $this->load->view('category/view',$data);
    }
    
    public function Add()
    {
        $this->load->view('category/add');
    }
    
    public function Insert()
    {
        $name = $this->input->post('name');
        $keyword = $this->input->post('keyword');
        $cat_id = $this->input->post('catid');
        
        $config['upload_path']          = './uploads/category/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = rand(0,99999999);
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0)
        {
            print_r($this->upload->display_errors());
        }
        else
        {
            if($_FILES['image']['size'] != 0){
                $upload = $this->upload->data();
                $data = array(
                    "cat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "image" => $upload['file_name'],
                    "keyword" => $keyword
                );
            }
            else
            {
                $data = array(
                    "cat_name" => $name,
                    "metadesc" => $name,
                    "description" => $name,
                    "keyword" => $keyword
                );
            }

            if($cat_id == ''):        
                if($this->CategoryModel->Insert($data)):
                    $this->session->set_tempdata('message', "Successfully Saved!", 3);
                endif;
            else:  
                if($this->CategoryModel->Update($data, $cat_id)):
                    $this->session->set_tempdata('message', "Successfully Updated!", 3);
                endif;
            endif;
            redirect('../Category/', 'refresh');
        }
    }
    
    public function Edit($id){
        $data['records'] = $this->CategoryModel->Get($id);
        $this->load->view('category/edit',$data);
    }
    
    public function Delete($id){
        if($this->CategoryModel->Delete($id)){
            $this->session->set_tempdata('message', "Successfully Removed!", 3);
        }
        redirect('../Category/', 'refresh');
    }    
    
}
