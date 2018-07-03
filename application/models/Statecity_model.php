

<?php

class Statecity_model extends CI_Model{


	public function __construct(){

		parent::__construct();
	}

	public function getcountries(){

		$query = $this->db->get('country');
		$result = $query->result_array();
		return $result;

	}
	public function getstates($country_id){

		$this->db->where(array ('country_id'=>$country_id));
		$query = $this->db->get('state');
		$result = $query->result_array();		  	
		return $result;

	}
	public function getcities($state_id){

		$this->db->where(array ('state_id'=>$state_id));
		$query = $this->db->get('city');
		$result = $query->result_array();		  	
		return $result;

	}
	
}

?>