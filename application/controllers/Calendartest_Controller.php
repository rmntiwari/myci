<?php
class Calendartest_Controller extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    function index(){
       $this->load->library('Calendar');


        $prefs['template'] =   array(
            'table_open'           => '<table class="calendar">',
            'cal_cell_start_today' => '<td class="today">',
            'cal_cell_start'       => '<td class="day">',


            
        );
        $this->load->library('calendar', $prefs);

        echo $this->calendar->generate();

    }
}


/*
 *
 *
 *
 * class Calendartest_Controller extends CI_Controller
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
        $query = $this->db->get("emp");
        $data['records'] = $query->result();
        $this->load->view('employee/addemp',$data);

    }
 *
 *
 * */
