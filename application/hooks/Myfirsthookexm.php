<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 5/29/2017
 * Time: 1:00 PM
 */

class Myfirsthookexm extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

    public function test()
    {
        echo "this text defined inside hookes folder (Myfirsthookexm.php)";
    }

}