<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

//if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 5/29/2017
 * Time: 12:48 PM
 */

class Hookexample_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo"Hello World";
    }
    public function test(){

        echo "Hi hook will called before this text";
    }
}