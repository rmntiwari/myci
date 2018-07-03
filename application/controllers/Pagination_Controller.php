 <?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Controller extends CI_Controller
{
	public  function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
        $this->load->model('pagination_model');
        $this->load->library('pagination');
	}

	public function index()
	{
		echo " call contact_info in url after controller name to display pagination";
	}

	public function contact_info()
    {

         $config = array();
        $config["base_url"] = base_url() . "pagination_controller/contact_info";
        $total_row = $this->pagination_model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);

        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 1;
        }

        $data["results"] = $this->pagination_model->fetch_data($config["per_page"], $page); //  $this->db->limit($limit, $start);
        $str_links = $this->pagination->create_links();  //Previous1 2345678910111213Next
        $data["links"] = explode('&nbsp;',$str_links );  // want  all no separated like  1 2 3 4 5 6 7

        echo $str_links;

        $this->load->view("pagination_view.php", $data);

    }
}


 ?>