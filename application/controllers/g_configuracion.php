<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> database();
		$this -> load -> helper('url');
		$this -> load -> library('grocery_CRUD');
		  $this->load->library('session');
		  
		//	$this->load->library('grocery_CRUD');
	}
		
	



	public function index() {
		
		
		}

	public function estudiantes() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('alumnos');

		$crud -> set_subject('Estudiantes');
		$crud -> required_fields('Nombre1', 'Apellido1');
		$crud -> columns('Nombre1', 'Apellido1');
		
		
		$data['output']=$crud -> render();
		$data['title']='Estudiantes';
		$this -> load -> view('../../plantilla/header.php');
		if ($this->ion_auth->logged_in())
		{
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		}
		else {
								 $this -> load -> view('../../plantilla/login.php',$data);
			
		}
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function inscripcion() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
