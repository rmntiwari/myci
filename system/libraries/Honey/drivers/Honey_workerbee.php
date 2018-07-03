<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honey_workerbee extends CI_Driver {

    function busybee()

    {

        return $this->_pot_honey();

    }

    function _pot_honey()

    {

        return 'Here is a pot of honey';

    }

}