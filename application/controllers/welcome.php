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



        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');

        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
            $this->load->library('mongo_db') :


        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
	}
		
	public function login($ruta=""){
		$this->load->model("usuarios_model");
		$username=$this->input->post('usuario');
		$password=$this->input->post('password');
		$sql=$this->usuarios_model->consulta_Usuario($username,$password);
		if($sql->num_rows()==0){
			$data['mensaje']=true;
			$this -> load -> view('../../plantilla/header.php');
			$this -> load -> view('../../plantilla/login.php',$data);
			$this -> load -> view('../../plantilla/footer.php');
		}
		else{
			
			$data = array(
                   'username'  => $username,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($data);
			if($ruta!=""){
					redirect($ruta, 'refresh');
				
			}
			else{
							     redirect(base_url().'welcome/', 'refresh');
				
			}
			
		}
	}

public function cerrarSesion(){
$this->session->sess_destroy();	
	  redirect(base_url().'welcome/', 'refresh');
}

	public function index() {
		$data['ruta']=base_url()."welcome/index";
		$this -> load -> view('../../plantilla/header.php');



        if ($this->ion_auth->logged_in())

		{

		$data['calendario']= $this -> load -> view('../../plantilla/calendario.php', "", true);
		$data['contenido'] = $this -> load -> view('../../plantilla/inicio.php', $data, true);
		$this -> load -> view('../../plantilla/layout.php', $data);
		}
		else {
            redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries


        }
		
		$this -> load -> view('../../plantilla/footer.php');
	}

    function editar_est($primary_key , $row){

        return base_url('g_administrativa/inscripcion/'.$primary_key);

    }

	public function estudiantes() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('alumnos');

		$crud -> set_subject('Estudiantes');
		$crud -> required_fields('Nombre1', 'Apellido1');
		$crud -> columns('Nombre1', 'Apellido1','numCI','numMatricula');
        $crud->unset_add();
        $crud->unset_edit();

        $crud->add_action('Editar', '', '','ui-icon-image',array($this,'editar_est'));
		
		$crud->set_relation('sede_insc', 'sedes', 'Nombre');
		$crud->set_relation('facultad_insc', 'facultades', 'Nombre');
		
		 $crud->set_field_upload('foto','assets/uploads/files');
		
		$this->load->library('gc_dependent_select');
		//////////////
		
		
		// settings

$fields = array(

// first field:
'sede_insc' => array( // first dropdown name
'table_name' => 'sedes', // table of country
'title' => 'Nombre', // country title
'relate' => null // the first dropdown hasn't a relation
),
// second field
'facultad_insc' => array( // second dropdown name
'table_name' => 'facultades', // table of state
'title' => 'Nombre', // state title
'id_field' => 'facultad', // table of state: primary key
'relate' => 'id', // table of state:
'data-placeholder' => 'select state' //dropdown's data-placeholder:

)//,
//// third field. same settings
//'goods_city' => array(
//'table_name' => 'dd_city',
//'where' =>"post_code>'167'",  // string. It's an optional parameter.
//'order_by'=>"state_title DESC",  // string. It's an optional parameter.
//'title' => 'id: {city_id} / city : {city_title}',  // now you can use this format )))
//'id_field' => 'city_id',
//'relate' => 'state_ids',
//'data-placeholder' => 'select city'
//)
);

$config = array(
'main_table' => 'alumnos',
'main_table_primary' => 'id',
"url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', //path to method
'ajax_loader' => base_url() . 'ajax-loader.gif' // path to ajax-loader image. It's an optional parameter
//'segment_name' =>'Your_segment_name' // It's an optional parameter. by default "get_items"
);
$categories = new gc_dependent_select($crud, $fields, $config);
		
		
		//////////
		
		
		$crud->add_action('Calificaciones', '', 'g_estudiantes/planilla_calificacion','ui-icon-plus');
		$crud->add_action('Asignar Materias', '', 'g_estudiantes/planilla_asignacion','ui-icon-plus');
		
		
	
		
		// the second method:
		$js = $categories->get_js();
		
		//echo '<input value="'.$js.'"> ';
		
		
		$data['output']=$crud->render();
		$data['output']->output .= $js;
		
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



	public function matricula() {
		$this -> load -> view('../../plantilla/header.php');
		
		$data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', "", true);
		
		
		
		
		//  $data['contenido'] = $this -> load -> view('../../plantilla/matricula.php', "", true);
		
		
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
		
	}
	public function contactenos() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/contacto.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
		
	}
	public function mision() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
		
	}

	public function vision() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function calificaciones() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function galeria() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function pago() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', "", true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function profesores() {
		$this -> load -> view('../../plantilla/header.php');
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('profesores');

		$crud -> set_subject('Profesores');
		$crud -> required_fields('idProfesor', 'materia');
		$crud -> columns('nombres');

		$data['output']=$crud -> render();
		$data['title']='Profesores';
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}

	public function directivos() {
		$this -> load -> view('../../plantilla/header.php');
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('directivos');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('cargo');
		$crud -> columns('cargo');

		$data['output']=$crud -> render();
		$data['title']='Directivos';
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');

	}

	public function aulas() {
			$this -> load -> view('../../plantilla/header.php');
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('aulas');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('nombre');
		$crud -> columns('nombre');

		$data['output']=$crud -> render();
		$data['title']='Aulas';
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');

	}

	public function grupos() {
		$this -> load -> view('../../plantilla/header.php');
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('gruposescolares');

		$crud -> set_subject('Directivos');
		$crud -> required_fields('Nombre', "cantidad");
		$crud -> columns('Nombre', "cantidad");

		$data['output']=$crud -> render();
		$data['title']='Grupos';
		$data['contenido'] = $this -> load -> view('../../plantilla/tabla.php', $data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');

	}
	public function notas() {
		$this -> load -> view('../../plantilla/header.php');
		$data['contenido']=$this -> load -> view('../../plantilla/estadisticaNotas.php', "",true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');

	}
	
	public function tema($id) {
		$this -> load -> view('../../plantilla/header.php');
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
		$this -> load -> view('../../plantilla/footer.php');
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
