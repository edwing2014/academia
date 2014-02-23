<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_Model  extends CI_Model  {
	

    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
	
	}
	public function consulta_Usuario($username,$password){
		$this->load->database();
		$query=$this->db->query("Select * from usuarios where userName='$username' and password=md5('$password')");
		return $query;
		
	}


 

	
}

