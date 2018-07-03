<?php
class Lang_Controller extends CI_Controller{
    $load = 10;

    function __construct()
    {
        //parent::__construct();
       // $this->load->database();
       // $this->load->helper('url');
    }
    public function index(){
        print_r( $this );
        $this->load->helper('form');
        //$this->load->view('langview');
        $language =  $this->input->post('language');

        switch($language){
            case 'hindi':
                $this->lang->load('hindi_lang','hindi');
                break;

            case 'french':
                $this->lang->load('french_lang','french');
                break;

            case 'german':
                $this->lang->load('german_lang','german');
                break;

            case 'english':
                $this->lang->load('english_lang','english');
                break;

            case 'spanish':
                $this->lang->load('spanish_lang','spanish');
                break;

            default:
                $this->lang->load('english_lang','english');
        }

        //Fetch the message from language file.
        $data['msg'] = $this->lang->line('msg');
        $data['language'] = $language;

        //var_dump($data);
        //Load the view file
        $this->load->view('langview',$data);
    }

    function load(){

        echo "dfdfd";
    }
}























