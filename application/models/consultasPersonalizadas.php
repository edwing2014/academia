<?php
class Cusuario extends CI_Model {
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function Contar_productos()
	{
	 
    // creamos la select
		$query=$this->db->query("select count(idProducto) from productos");
		mysql_close();	
   // si el resultado de la query es positivo
		return $query;
  

  }
}
?>