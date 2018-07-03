<?php

/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 12/20/2016
 * Time: 2:46 PM
 */
class Emp_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function index()
    {
        //echo "index of emp controller called";
       // var_dump(asset_url());
       // var_dump(base_url());
       // var_dump(site_url('emp_controller/addemployee'));
        $this->db->where('status', 1);
        $query = $this->db->get("employees");
        $data['records'] = $query->result();

       $this->load->view('employee/addemp',$data);
       

    }
    
    public function addemployee(){
    
       /* if($this->input->post('submit') =="submit") {
            
            $this->load->model('emp_model');
            $fname = $this->input->post('first_name');
            $lname = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $status = 1;
            $data = array('empid' => '', 'fname' => $fname, 'lname' => $lname, 'phone' => $phone, 'email' => $email, 'pass' => $pass, 'status' => $status);
            $flg = $this->emp_model->insert($data);
            if ($flg == true) {
                $query = $this->db->get("emp");
                $data['records'] = $query->result();
               // $this->load->view('emp_controller/', $data);
                redirect('emp_controller',$data);
            } else {
                echo "unable to fetch information from table";
            }
        }*/
    }

    public function getuserbyid(){


       // $id= $_REQUEST['id'];
      echo $id= $this->input->post('id');
        exit;
        //$this->db->where(array('user_id' => $id, 'sender_id' => $send_id));
        $this->db->where('empid', $id);
        $query = $this->db->get("emp");
        $data['records'] = $query->result();
        $res= json_encode($data['records']);

        echo $res;
        exit;
       // $this->load->view('employee/addemp',$data);
    }


    public function update_employee(){

        $this->load->model('emp_model');
        $id = $this->input->get('id');
        $lname=$this->input->post('last_name');
        $fname=$this->input->post('first_name');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $pass=$this->input->post('pass');
        $data=array(
            'empid'=>$id,
            'fname'=> $fname,
            'lname'=>$lname,
            'phone'=>$phone,
            'email'=> $email,
            'pass'=> $pass,
        );
        $this->emp_model->updateemp($data, $id);
        redirect('emp_controller');

       // die("going to develope logic for update record");
    }
    
    public function showemployees()
    {

    }
    public function delemployee(){
         $this->load->model('emp_model');
         $id= $_REQUEST['id'];
        // $tstid= $this->input->get('id');  // substitute of $_REQUEST
         $this->emp_model->delemp($id);
         redirect($_SERVER['HTTP_REFERER']);
    }
}