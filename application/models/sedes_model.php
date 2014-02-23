<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sedes_Model  extends CI_Model  {
	

    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
		$this->load->database();
	
	}
	public function traer_sedes(){
		
		$query = $this->db->query("select * from sedes");
		$sedes_array = $query->result();
		
		
		return $sedes_array;
	}


	public function listarSedesCombo(){
		
		
			$query = $this->db->query('select * from sedes');
	
			
			$dataCombo = array();
			
			foreach($query->result() as $row){
				
			$dataCombo[$row->id] = $row->Nombre;
				
				}
			
			return $dataCombo;	
		
	}

 

	
}

