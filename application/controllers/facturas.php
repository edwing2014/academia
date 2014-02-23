<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas extends CI_Controller {

	var $envio = false;

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
			if($this->envio == true){
			
			$output->envio = '<div id="message-box" class="span12">
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert" href="#"> x </a>
				Enlace para el pago de la factura ref: '.$this->referencia.'  se ha enviado al cliente correctamente.
			</div>
		</div>';
			
		}else{
			$output->envio = '';
		}
		
		 $this->load->view('../../plantillas/header');
		$this->load->view('example.php',$output);	
		 $this->load->view('../../plantillas/footer');
	}
	

	function index1()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	
	function index()
	{
		

		
		
		
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('facturas');
			$crud->set_subject('Facturas');
		//	$crud->required_fields('city');
			$crud->columns('referencia','cliente','fecha_de_pago','valor','iva','moneda','estado');
			$crud->fields('referencia','cliente','fecha_de_pago','valor','iva','moneda','observaciones','archivo'); 
			
			$crud->set_field_upload('archivo','uploads');
			$crud->callback_column('estado',array($this,'get_estado'));
			$crud->required_fields('referencia','cliente','fecha_de_pago','valor','iva','moneda','observaciones','archivo');
			
			$crud->add_action('Enviar enlace de pago', $this->config->base_url('assets/img/email_go.png'), '','',array($this,'enviar_enlace'));
			
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}	
	
	
	function enviar_enlace($value, $row){
		
		return 'enviada/'.$row->referencia;
	}
	
	function enviada($referencia=''){
		
		$this->referencia = $referencia;
		$this->envio = true;
		
		$this->index();
			
	}
	
	function get_estado($value, $row){
		
		//1. sin enviar
		//2. enviada
		//3. procesando pago
		//4.pagada
		
		
		return 'p';
	}
	
	
	function pago_factura($ref=''){
	
	
$form['llave_encripcion'] = "1111111111111111"; //llave de encripción que se usa para generar la fima
$form['usuarioId'] = "2"; //código único del cliente
$form['refVenta'] = time(); //referencia que debe ser única para cada transacción
$form['iva']=36000; //impuestos calculados de la transacción
$form['baseDevolucionIva']=300000; //el precio sin iva de los productos que tienen iva
$form['valor']=486000; //el valor total
$form['moneda'] ="COP"; //la moneda con la que se realiza la compra
$form['prueba'] = "1"; //variable para poder utilizar tarjetas de crédito de prueba
$form['descripcion'] = "Pruebas de Generacion de Firmas"; //descripción de la transacción
$form['url_respuesta'] = "http://www.pixelweb.com.co/pagos/respuesta.php";
$form['emailComprador'] ="info@mail.com"; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
$form['firma_cadena'] = $form['llave_encripcion']."~".$form['usuarioId']."~".$form['refVenta']."~".$form['valor']."~".$form['moneda']; //concatenación para realizar la firma
$form['firma'] = md5($form['firma_cadena']); //creación de la firma con la cadena previamente hecha
	
	
		$form_pago = $this->load->view('form_pago.php',$form,true);	
		$this->_example_output((object)array('output' => $form_pago, 'js_files' => array() , 'css_files' => array()));
		
	}
	
}