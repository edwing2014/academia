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

	public function catalogo() {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {

				$data['position'] = 'catalogo';
				$data['contenido'] = $this -> load -> view('../../plantillas/catalogos', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
				$this -> _output_display($this -> load -> view('../../plantillas/main_content', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function clientes() {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {

				$data['position'] = 'clientes';
				$data['contenido'] = $this -> load -> view('../../plantillas/clientes', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
				$this -> _output_display($this -> load -> view('../../plantillas/main_content', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}
	}

	public function configuracion() {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {

				$data['position'] = 'configuracion';
				$data['contenido'] = $this -> load -> view('../../plantillas/configuracion', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
				$this -> _output_display($this -> load -> view('../../plantillas/main_content', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function gestion_categorias() {

		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				//Creamos el objeto grocery_CRUD
				$crud = new grocery_CRUD();
				//Asignamos el thema default
				$crud -> set_theme('twitter-bootstrap');
				$crud -> set_table('categorias');

				$crud -> set_subject('idcategoria');
				$crud -> required_fields('nombre_categoria', 'padre', 'estado');
				$crud -> columns('nombre_categoria', 'padre', 'estado');

				$output = $crud -> render();
				$position = 'index.php';
				$this -> _output_display($this -> load -> view('../../plantillas/tablaproductos', $output, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function index() {

		$data['position'] = 'index';
		$data['contenido'] = $this -> load -> view('../../plantillas/principal', "", true);
		//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
		$this -> _output_display($this -> load -> view('../../plantillas/main_content', $data, true));

	}

	public function gestion_productos() {

		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				//Creamos el objeto grocery_CRUD
				$crud = new grocery_CRUD();
				//Asignamos el thema default
				$crud -> set_theme('twitter-bootstrap');
				$crud -> set_table('producto');

				$crud -> set_subject('idProducto');
				$crud -> required_fields('nombre', 'valor', 'descripcion', 'stock');
				$crud -> columns('nombre', 'valor', 'descripcion', 'stock');
				$output = $crud -> render();
				//Esta variable se crea para darle al menú la ubicación actual en la página
				$this -> _output_display($this -> load -> view('../../plantillas/tablaproductos', $output, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function gestion_servicios() {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				//Creamos el objeto grocery_CRUD
				$crud = new grocery_CRUD();
				//Asignamos el thema default
				$crud -> set_theme('twitter-bootstrap');
				$crud -> set_table('servicio');

				$crud -> set_subject('Servicios');
				$crud -> required_fields('nombre', 'valor', 'descripcion');
				$crud -> columns('nombre', 'valor', 'descripcion');

				$output = $crud -> render();
				//Esta variable se crea para darle al menú la ubicación actual en la página
				$this -> _output_display($this -> load -> view('../../plantillas/tablaproductos', $output, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function help() {

	}

	public function login_f() {
		$this -> load -> view('../../plantillas/login_f');

	}

	public function pedidos($tipo = "") {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				//Se agrega la variable tipo al array $query dónde si es 1 es un pedido y si es 2 es una orden de trabajo
				@$data['tipo'] = $tipo;
				//cargamos el modelo de pedidos_model
				$this -> load -> model('pedidos_model');

				//si es pedido
				if (@$data['tipo'] == '1') {
					$data['consulta'] = $this -> pedidos_model -> Consulta_general_pedidos();
					//en el array $data se le asigna el punto para el menú ppal
					$data['position'] = 'pedidos';
					//si es 2 entonces es una orden de trabajo
				} elseif (@$data['tipo'] == '2') {
					$data['consulta'] = $this -> pedidos_model -> Consulta_general_ordenes();
					$data['position'] = 'ordenes';
				}

				//Se imprime la tabla dentro de la estructura
				$data['contenido'] = $this -> load -> view('../../plantillas/pedidos', $data, true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
				$this -> _output_display($this -> load -> view('../../plantillas/main_content', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function ordenes_trabajo() {

		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				//Creamos el objeto grocery_CRUD
				$crud = new grocery_CRUD();
				//Asignamos el thema default
				$crud -> set_theme('twitter-bootstrap');
				$crud -> set_table('ordenesTrabajo');

				$crud -> set_subject('Orden de trabajo');
				$crud -> required_fields('fecha', 'nombre', 'cliente', 'usuario');
				$crud -> columns('fecha', 'nombre', 'cliente', 'usuario');

				$output = $crud -> render();

				//se envian los datos del grid  a la funcion _outpot_display para imprimir en pantalla
				$this -> _output_display($this -> load -> view('../../plantillas/tablaproductos', $output, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}

	}

	public function verpedidos($id,$tipo) {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				$this -> load -> model('pedidos_model');
				$data['consulta1']=$this -> pedidos_model -> Consulta_general_pedidos();
				$data['consulta2']=$this -> pedidos_model -> consulta_detalle_pedido($id);

				$this -> _output_display($this -> load -> view('../../plantillas/mostrardetalles', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}
	}

	public function verordenes($id,$tipo) {
		//Se valida la sesión
		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			//Se carga el grosery
			try {
				$this -> load -> model('pedidos_model');
				$data['consulta1']=$this -> pedidos_model -> Consulta_general_pedidos();
				$data['consulta2']=$this -> pedidos_model -> consulta_individual_orden($id);
				$this -> _output_display($this -> load -> view('../../plantillas/mostrardetalles', $data, true));

			} catch(Exception $e) {
				show_error($e -> getMessage() . ' --- ' . $e -> getTraceAsString());
			}

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}
	}

	function _output_display($output = null) {

		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1) {

			$this -> load -> view('../../plantillas/header');
			echo $output;
			$this -> load -> view('../../plantillas/footer');

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
