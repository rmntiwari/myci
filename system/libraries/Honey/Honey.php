<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Honey extends CI_Driver_Library {

    public $valid_drivers;
    public $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('honey', TRUE);
        $this->valid_drivers = $this->CI->config->item('modules', 'honey');
    }

    function naughty_bee()
    {
        return $this->queenbee->pardon();
    }

    function buy_honey($money = 0)
    {
        if($this->workerbee->busybee($money))
        {
            return TRUE;
        }
    }

    function check_money($money)
    {
        return $this->queenbee->can_we_sell($money);
    }
    /*function honey_queenbee(){
        echo"hhhhhhhhhhhhhhhhhhhhh";
    }*/
}