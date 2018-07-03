<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Clitest_controller extends CI_Controller{


 		 public function message($to = 'World')
        {
                echo "Hello {$to}!".PHP_EOL;
        }
 }
 

?>