<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carreras_Model  extends CI_Model  {
	

    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
		$this->load->database();
	
	}
	public function traer_carreras(){
		
		$query = $this->db->query("select * from carreras");
		$sedes_array = $query->result();
		
		
		return $sedes_array;
	}


	public function listarCarrerasCombo($id_facultad=0,$id_sede=0){
		
		
		if($id_facultad != 0 && $id_sede != 0){
			$query = $this->db->query("select * from carreras where facultad REGEXP '".$id_facultad."' and sedes REGEXP '".$id_sede."'");
		}elseif($id_facultad != 0 && $id_sede == 0){
			$query = $this->db->query("select * from carreras where facultad REGEXP '".$id_facultad."'");
		}elseif($id_facultad == 0 && $id_sede != 0){
			$query = $this->db->query("select * from carreras where sedes REGEXP '".$id_sede."'");
			
		}else{
		$query = $this->db->query("select * from carreras");	
		}
			
			$dataCombo = array();
			
			foreach($query->result() as $row){
				
			$dataCombo[$row->id] = $row->Nombre;
				
				}
			
			return $dataCombo;	
		
	}


    function consulta_carrera($id){

       $result =  $this->db->query("select * from carreras where id = '$id'")->row();


        return $result;
    }

 

	
}

