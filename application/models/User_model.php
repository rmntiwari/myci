<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 10/12/2016
 * Time: 5:31 PM
 */
class User_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function modeltest_rmn()
    {
        echo"I am a method of user_model";
    }
    function modelfunction1(){
        echo "user model test function : modelfunction1";
    }
    
    function sumfunction( $a, $b)
    {
        $x  = $a + $b;
        
        echo $x = "sum of two nos=". $x;
        
    }
}