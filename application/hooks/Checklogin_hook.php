
<?php

class Checklogin_hook   {

	public function index(){

		echo "helloooooooo";
	}
    public function test()
    {
    	$ci = &get_instance();
 
        if( !$ci->session->has_userdata("email") ){

        	if($_SERVER['REQUEST_URI'] != '/logregister_controller'){
        		redirect(site_url('logregister_controller'));
        	}

        }
    }

}

?>