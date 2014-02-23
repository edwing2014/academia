<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pedidos extends CI_Controller {

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

			$this->load->library('grocery_CRUD');
	}

	function _output_display($output = null) {

		$_SESSION['redirect'] = 0;

		if (isset($_SESSION['session_id'])) {

			$this -> load -> view('../../plantillas/header');
			$this -> load -> view('example.php', $output);
			$this -> load -> view('../../plantillas/footer');

		} else {

			//$this->load->view('../../plantillas/header');
			$this -> login_f();
			//$this->load->view('../../plantillas/footer');

		}
	}


		
	function _example_output($output = null)
	{
		
		
		 $this->load->view('../../plantillas/header');
		$this->load->view('example.php',$output);	
		 $this->load->view('../../plantillas/footer');
	}
	
	public function index() {

		$this -> load -> model('sugar_model'); 
		$this -> load -> model('productos_model'); 

		//$this -> sugar_model -> get_account_list(85452);
		
			try{
							 $data['position'] = 'pedidos';
						$data['impresion']=$this->productos_model->contarElementos();
				
			$crud = new grocery_CRUD();

			$crud -> set_theme('twitter-bootstrap');
			$crud->set_table('pedidos'); 
			$crud->set_subject('Pedidos');
			$crud->required_fields('cliente');
			$crud->columns('fecha','cliente','telefono','valor');
			$crud->unset_add();
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_texteditor();
			$crud->add_action('Editar',"", base_url().'pedidos/add/');
			
			
			$crud->callback_column('cliente', array($this,'get_contact_name'));
			
			$output = $crud->render();
			$data['output']=$output;	
			$this -> load -> view('../../plantillas/header');

			$this -> load -> view('../../plantillas/pPedidos', $data);
		 	$this->load->view('../../plantillas/footer');
			echo '<script type="text/javascript">
			
			$(document).ready(function(){
	
	alert(4)
&(\'.options-content\').append(\'<a rel="external" data-url="'.base_url().'index.php/pedidos/add" class="export-anchor btn"><i class="icon-open"></i>Nuevo</a>\');});	</script>';
	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	
	function get_contact_name($value, $key){
	$this -> load -> model('sugar_model');	
	
	$contact =  $this -> sugar_model -> get_contact($value);	
	
	return	'';
		
	}

	public function login() {

		$this -> load -> model('sugar_model');

		$_SESSION['session_id'] = $this -> sugar_model -> login_sugar($_POST['user'], $_POST['pws']);

	}

	public function add($idPedido='',$account_id = '', $contact_id = '' ) {

			$this->load->library('cart');
			$this->cart->destroy();
	

		$this -> load -> model('sugar_model');
		$this -> load -> helper('date');
		$this->load->model('pedidos_model');
		$output['position']='pedidos';

		
			$output['accounts'] = $this -> sugar_model -> get_account_list();
			$output['account_id'] = $account_id;
			$output['contacts'] = $this -> sugar_model -> get_contact_list($account_id);
			$this->load->model('categorias_model');
			$output['categorias']=$this->categorias_model->listarCategorias();
		
		$datestring = "Año: %Y Mes: %m Día: %d - %h:%i %a";
		$time = time();
		$output['idPedido']=$idPedido;
		$output['query']=$this->pedidos_model->consulta_individual_pedido($idPedido);
		$output['fecha']= mdate($datestring, $time);
		$this -> load -> view('../../plantillas/header');
		$this -> load -> view('../../plantillas/pedidos_add', $output);
		$this -> load -> view('../../plantillas/footer');
	}
	public function guardarCarrito($idPedido="")
	{
			$this->load->library('cart');
		$this -> load -> model("productos_model");
		$this -> load -> model("sugar_model");
		$this->load->model("pedidos_model");
		$this -> load -> helper('date');
		$datestring = "%Y-%m-%d";
		$time = time();
		$output['fecha']= mdate($datestring, $time);
		if($idPedido=="")
		{
					$idPedido=$this->pedidos_model->insertarPedido($output['fecha'],isset($_POST['contacto']),isset($_POST['empresa']),"","",1);
					$idPedido=$idPedido->row_array();
					$data['idPedido']=$idPedido['idPedido'];
					$idPedido=$data['idPedido'];
					
		
		$id_nota = $this->sugar_model->create_nota($_POST['contacto'],$idPedido); 
		
		
	//	$this->sugar_model->atachment_create_nota($id_nota,$file); 	
		
		}else{
			
	//	$idPedido = $this->pedidos_model->consulta_individual_pedido($idPedido);
	//	$this->sugar_model->atachment_create_nota($id_nota,$file); 	
		}
		
		foreach ($this->cart->contents() as $items){
			
			if($items['options']['tipo']=='Servicio')
			{
				$q=$this->pedidos_model->consultaServicioDetalle($items['id'],$idPedido);
				if($q->num_rows()==0){
				$this->pedidos_model->insertarDetalle($idPedido,"",$items['id'],$items['qty'],($items['qty']*$items['price']),2);	
				}
				else{
									$this->pedidos_model->actualizarCantidad($items['id'],$idPedido,$items['qty'],"Servicio");
					
				}
			}
			else {
				$q=$this->pedidos_model->consultaProductoDetalle($items['id'],$idPedido);
		
				if($q->num_rows()==0){
					$this->pedidos_model->insertarDetalle($idPedido,$items['id'],"",$items['qty'],($items['qty']*$items['price']),1);
				}
				else{
									$this->pedidos_model->actualizarCantidad($items['id'],$idPedido,$items['qty'],"Producto");
					
				}
				
				
			}
				
		}
		echo "<script>location.href='".base_url()."pedidos/add/".$idPedido."'</script>";
		
		$this->load->view("../../plantillas/gridPedido",$idPedido);
	}
	public function cuentaAdd() {
		
		$this -> load -> view('../../plantillas/header');
		$data['position'] = 'AgregarC';
		$data['contenido'] = $this -> load -> view('../../plantillas/cuentaAdd', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
		$this -> load -> view('../../plantillas/main_content', $data);
		$this -> load -> view('../../plantillas/footer');
	}
	
	public function clienteAdd() {
		$this -> load -> view('../../plantillas/header');
		$data['position'] = 'Agregar Cliente';
		$data['contenido'] = $this -> load -> view('../../plantillas/clienteAdd', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
		$this -> load -> view('../../plantillas/main_content', $data);
		$this -> load -> view('../../plantillas/footer');
	}

	public function ordenAdd() {
		$this -> load -> view('../../plantillas/header');
		$data['position'] = 'Agregar Orden';
		$data['contenido'] = $this -> load -> view('../../plantillas/ordenAdd', "", true);
				//	$data['main_menu'] = $this->load->view('../../plantillas/main_menu.php', true);
		$this -> load -> view('../../plantillas/main_content', $data);
		$this -> load -> view('../../plantillas/footer');
	}

	public function eliminarElementoPedido()
	{
		$this->load->model("pedidos_model");
		$this->pedidos_model->eliminarElementoPedido($_POST['elemento'],$_POST['idPedido'],$_POST['tipo']);
		
	}
	public function enviarPDF($id="")
	{
		echo "Cotizaci&oacute;n enviada";
		$this->load->model("pedidos_model");
		$this->load->library('cart');
	$this->load->library('pdf'); // Load library
	$this->pdf->fontpath = 'font/'; // Specify font folder
		$this->pdf->AddPage();
			$this->pdf->Rect(1, 1, 207, 288 , '');
		
	 // Select Arial bold 15
    $this->pdf->SetFont('Arial','B',16);
    // Move to the right
    $this->pdf->Cell(100);
    // Framed title
    $this->pdf->Cell(60,10,utf8_decode('NSIT Cotización'),0,0,"C");
	$this->pdf->Ln(20);
	$this->pdf->SetFont('Arial','',8);
	  $this->pdf->Cell(60,10,"Para: ".$this->input->post("correo"),0,0,"C");
    // Line break
    $this->pdf->Ln(20);
	

	$this->pdf->SetFillColor(255,255,255);
    $this->pdf->SetTextColor(0,0,0);
    $this->pdf->SetDrawColor(0,0,0);
    $this->pdf->SetLineWidth(.3);
	 $this->pdf->SetFont('Arial','B',14);
    $this->pdf->Cell(10,7,"#Id",1,0,'C');
	$this->pdf->Cell(100,7,"Nombre",1,0,'C');
	$this->pdf->Cell(30,7,"Prod/Serv",1,0,'C');
	$this->pdf->Cell(15,7,"Cant",1,0,'C');
	$this->pdf->Cell(20,7,"Precio ",1,0,'C');
	$this->pdf->Cell(20,7,"Total",1,0,'C');
	$this->pdf->Ln(8);
	$this->pdf->SetFont('Arial','B',8);
		foreach ($this->cart->contents() as $items){
		 $this->pdf->Cell(10,7,$items['id'],1,0,'C');
		$this->pdf->cell(100,7,$items['name'],1,0,'L');
		$this->pdf->Cell(30,7,$items['options']['tipo'],1,0,'C');
		$this->pdf->Cell(15,7,$items['qty'],1,0,'C');
		$this->pdf->Cell(20,7,$items['price'],1,0,'C');
		$this->pdf->Cell(20,7,$this->cart->format_number($items['qty']*$items['price']),1,0,'C');	
		$this->pdf->Ln(8);	
		}
	// Generate PDF by saying hello to the world
	 $this->pdf->Ln(20);
	 $total="Total:  ".$this->cart->format_number($this->cart->total());
	 		$this->pdf->MultiCell(100,7,$total,0,0,'R');
		  
		
	$query=	$this->pedidos_model->consultaConfig();
	foreach ($query->result_array() as $fila ) {
		
	}
	$string = "";
	$length='15';
	 $possible = "0123456789bcdfghjkmnpqrstvwxyz";
  $i = 0;
  while ($i < $length) {
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    $string .= $char;
    $i++;
  }
	$pdf=$this->pdf->Output("pdf/".$string.".pdf","F");
	$this->load->library('email');
		$this->email->initialize();
		$this->email->set_newline("\r\n");
		$this->email->from( $fila['email_sistema']	);
	
		$this->email->to($this->input->post("correo"));
		//$this->email->cc("info@patrimonioinmobiliario.co");
				$this->email->attach("pdf/".$string.".pdf");
		$this->email->set_mailtype("html");
		$this->email->subject('Archivo de cotización');
		$this->email->send();
				echo "<script>location.href='".base_url()."'</script>";
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
