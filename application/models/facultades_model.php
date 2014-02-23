<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facultades_Model  extends CI_Model  {
	

    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
		$this->load->database();
	
	}
	public function traer_facultades(){
		
		$query = $this->db->query("select * from facultades");
		$sedes_array = $query->result();
		
		
		return $sedes_array;
	}


	public function listarFacultadesCombo(){
		
		
			$query = $this->db->query('select * from facultades');
	
			
			$dataCombo = array();
			
			foreach($query->result() as $row){
				
			$dataCombo[$row->id] = $row->Nombre;
				
				}
			
			return $dataCombo;	
		
	}

 

	
}

