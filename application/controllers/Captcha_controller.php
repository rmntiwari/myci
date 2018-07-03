<?php
if(!defined('BASEPATH'))exit("No direct access of script allowed");

class Captcha_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        /* Load the libraries and helpers */
        $this->load->library('form_validation');
        $this->load->driver("session");
        $this->load->helper(array('form', 'url', 'captcha'));
        $this->load->database();
    }


    /* The default function that gets called when visiting the page */
    public function index()
    {

        /* Set a few basic form validation rules */
        $this->form_validation->set_rules('name', "name", 'required');
        $this->form_validation->set_rules('captcha', "captcha", 'required');

        /* Get the user's entered captcha value from the form */
        //$userCaptcha = set_value('captcha');
        $userCaptcha =@$_REQUEST['captcha'];

        /* Get the actual captcha value that we stored in the session (see below) */
        $word = $this->session->userdata('captchaWord');


        var_dump($this->input->post());

        var_dump($this->form_validation->run());
       var_dump(strcmp(strtoupper($userCaptcha),strtoupper($word)));

        /* Check if form (and captcha) passed validation*/
        if ($this->form_validation->run() == TRUE && strcmp(strtoupper($userCaptcha),strtoupper($word)) == 0)
        {
            exit("fdfdfd");

           // echo "captcha passed value";
            /** Validation was successful; show the Success view **/

            /* Clear the session variable */
            $this->session->unset_userdata('captchaWord');

            /* Get the user's name from the form */
            $name = set_value('name');

            /* Pass in the user input to the success view for display */
            $data = array('name' => $name);
            $this->load->view('success_view', $data);


        }
        else
        {
           // exit;
          //  echo "captcha not  passed value";
            //die("if captcha not passed validation");

            /** Validation was not successful - Generate a captcha **/

            /* Setup vals to pass into the create_captcha function */
            $vals = array(
                'img_path' => 'images/',
                'img_url' => base_url().'images/',
                'img_width'     => '150',
                'img_height'    => 50,
                'expiration'    => 7200,
                'word_length'   => 3,
                'font_size'     => 30,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                'colors'        => array(
                    'background' => array(255, 200, 100),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
                )
            );


            /* Generate the captcha */
            $captcha = create_captcha($vals);

            $data = array(
                'captcha_time'  => $captcha['time'],
                'ip_address'    => $this->input->ip_address(),
                'word'          => $captcha['word']
            );

          //  $query = $this->db->insert_string('captcha', $data);
          //  $this->db->query($query);
          //  var_dump($this->db->last_query());


            /* Store the captcha value (or 'word') in a session to retrieve later */
           // $this->session->set_userdata('captchaWord', $captcha['word']);

            /* Load the captcha view containing the form (located under the 'views' folder) */
            $this->load->view('captcha_view', $captcha);
        }

    }

}