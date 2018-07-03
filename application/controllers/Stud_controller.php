<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 10/17/2016
 * Time: 5:19 PM
 */
class stud_controller extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        //$this->load->database();
    }

    public function index()
    {
        $query = $this->db->get("stud");
        $data['records'] = $query->result();
        $data['rmns_data']= "this is what raman wants ";

        //$this->load->helper('url');
        $this->load->view('Stud_view',$data);

        $message = "we are in development mode";
        $status_code = "404";
       // show_error();
      //  echo ENVIRONMENT; 
    }
    public function add_student_view() {
        $this->load->helper('form');
        $this->load->view('Stud_add');
    }

    public function add_student() {
        $this->load->model('Stud_Model');

        $data = array(
            'roll' => $this->input->post('roll_no'),
            'name' => $this->input->post('name')
        );

        $this->Stud_Model->insert($data);

        $query = $this->db->get("stud");
        $data['records'] = $query->result();
        $this->load->view('Stud_view',$data);
    }

    public function update_student_view() {


        $this->load->helper('form');
        var_dump( $this->uri->segment('2'));
        $roll_no = $this->uri->segment('3');
        $query = $this->db->get_where("stud",array("roll"=>$roll_no));
        $data['records'] = $query->result();
        $data['old_roll_no'] = $roll_no;
        $this->load->view('Stud_edit',$data);
    }

    public function update_student(){

        $this->load->model('Stud_Model');

        $data = array(
            'roll' => $this->input->post('roll'),
            'name' => $this->input->post('name')
        );

        $old_roll_no = $this->input->post('old_roll_no');
        $this->Stud_Model->update($data,$old_roll_no);

        $query = $this->db->get("stud");
        $data['records'] = $query->result();
        $this->load->view('Stud_view',$data);
    }

    public function delete_student() {
        $this->load->model('Stud_Model');
        $roll_no = $this->uri->segment('3');
        $this->Stud_Model->delete($roll_no);

        $query = $this->db->get("stud");
        $data['records'] = $query->result();
        $this->load->view('Stud_view',$data);
    }


}