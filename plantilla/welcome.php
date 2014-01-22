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

		//	$this->load->library('grocery_CRUD');
	}

	function _output_display($data = null) {

		$this -> load -> view('../../plantilla/header.php');
		echo $data['output'];
		$this -> load -> view('../../plantilla/footer.php');

	}

	public function index() {
		$data['contenido'] = $this -> load -> view('../../plantilla/inicio.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);

	}

	public function estudiantes() {

		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('alumnos');

		$crud -> set_subject('Estudiantes');
		$crud -> required_fields('Nombre1', 'Apellido1');
		$crud -> columns('Nombre1', 'Apellido1');

		$output = $crud -> render();
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $output, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);
	}

	public function inscripcion() {

		$this -> _output_display($data);
	}

	public function matricula() {

		$this -> _output_display($data);
		;
	}
	public function contactenos() {
		$data['contenido'] = $this -> load -> view('../../plantilla/contacto.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);
		;
	}
	public function mision() {

		$this -> _output_display($data);
	}

	public function vision() {

		$this -> _output_display($data);
	}

	public function calificaciones() {

		$this -> _output_display($data);
	}

	public function galeria() {

		$this -> _output_display($data);
	}

	public function pago() {

		$this -> _output_display($data);
	}

	public function profesores() {

		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('profesores');

		$crud -> set_subject('Profesores');
		$crud -> required_fields('idProfesor', 'materia');
		$crud -> columns('Nombre1', 'Apellido1');

		$output = $crud -> render();
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $output, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);
	}

	public function directivos() {
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('directivos');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('cargo');
		$crud -> columns('cargo');

		$output = $crud -> render();
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $output, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);

	}

	public function aulas() {
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('aulas');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('nombre');
		$crud -> columns('nombre');

		$output = $crud -> render();
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $output, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);

	}

	public function grupos() {
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('gruposescolares');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('Nombre', "cantidad");
		$crud -> columns('Nombre', "cantidad");

		$output = $crud -> render();
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $output, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data,true);
		$this -> _output_display($data);

	}

	public function tema($id) {
		switch ($id) {
			case 1 :
				$ruta= "main-theme";
				break;
			case 2 :
				$ruta= "theme-blue";
				break;
			case 3 :
				$ruta= "theme-dark-orange";
				break;
			case 4 :
				$ruta= "theme-fabrics";
				break;
			case 5 :
				$ruta= "theme-wooden";
				break;
		}
		$config['global_xss_filtering'] = TRUE;
		$cookie = array('name' => 'academia',
		'ruta'=>$ruta,
		 'expire' => '86500', 
		 'domain' => base_url(), 
		 'secure' => TRUE, '' => "");
		$this->input->set_cookie($cookie);
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
