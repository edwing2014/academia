<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class G_estudiantes extends CI_Controller {

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

            $this -> load -> library('pdf');
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
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
		$crud -> columns('Nombre1', 'Apellido1','sede');
		
		//$crud->set_relation('sede', 'sedes', 'Nombre');
		//$crud->set_relation('facultad', 'facultades', 'Nombre');
		
		$this->load->library('gc_dependent_select');
		
		
		
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


	public function calificaciones($estudiante = ''){
		
		$this -> load -> view('../../plantilla/header.php');
		
		$cont_data['estudiante'] = $estudiante;
		
		$data['contenido'] = $this -> load -> view('../../plantilla/calificaciones.php', $cont_data, true);
		$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}
	
	public function planilla_calificacion($estudiante = ''){
		
	$this -> load -> view('../../plantilla/header.php');
		
		$cont_data['estudiante'] = $estudiante;
		
		
		//planilla de busqueda
		if($estudiante == ''){
		$cont_data['estudiante'] = $estudiante;
				
		$data['contenido'] = $this -> load -> view('../../plantilla/calificaciones.php', $cont_data, true);		
			
		}elseif($estudiante == '0'){
		
		
		if($this->input->post('idMatricula') != '' or $this->input->post('identificacion') != ''){
			
		$busqueda = $this->db->query("select * from alumnos where numMatricula = '".$this->input->post('idMatricula')."' or numCI = '".$this->input->post('identificacion')."'"); 
		$cont_data['estudiante'] = $busqueda->row();
		
		$data['contenido'] = $this -> load -> view('../../plantilla/planilla_calificacion.php', $cont_data, true);		
		}else{
		$cont_data['estudiante'] = $estudiante;
		$cont_data['error'] = "ERROR, Debe ingresar algun parametro para realizar la busqueda";		
		$data['contenido'] = $this -> load -> view('../../plantilla/calificaciones.php', $cont_data, true);		
		}
			
		}else{
			
		$busqueda = $this->db->query("select * from alumnos where idAlumno = '".$estudiante."'"); 
		
		//actualizar
		if(isset($_REQUEST['ParcialCalificacion1'])){
		
		$this->db->query("update calificaciones set ParcialCalificacion1 = '".$_REQUEST['ParcialCalificacion1']."', ParcialCalificacion2 = '".$_REQUEST['ParcialCalificacion2']."', PractCalificacion1 = '".$_REQUEST['PractCalificacion1']."', PractCalificacion2 = '".$_REQUEST['PractCalificacion2']."' where id_estudiante= '".$estudiante."' and id = '".$_REQUEST['idcal']."'"); 
		
	//	echo $this->db->last_query();
		
		}
	
		$cont_data['estudiante'] = $busqueda->row();
		
		//$asignaturas_query = $this->db->query("select * from relation_asign_estudiante where idEstudiante = '".$estudiante."'"); 
		
		$asignaturas_query = $this->db->query("select * from asignaturas where id IN (select idAsignatura from relation_asign_estudiante where idEstudiante = '".$estudiante."')"); 
		
		$asignaturas_data = $asignaturas_query->result();
		//echo $this->db->last_query();
		
		
		$data_calificaciones =  array();
		
		foreach($asignaturas_data as $calificacion_row){
			$calificacionesqr =  $this->db->query("select * from calificaciones where id_estudiante = '".$estudiante."' and id_asignatura = '".$calificacion_row->id."'"); 
			
			
array_push($data_calificaciones,(object)array_merge(array('Nombre'=>$calificacion_row->Nombre), (array)$calificacionesqr->row()));
			
			}
	
	
		
		
		$cont_data['asignaturas'] = $data_calificaciones;
		
		
		
	
		$data['contenido'] = $this -> load -> view('../../plantilla/planilla_calificacion.php', $cont_data, true);		
			
			
		}
		
		
		
		$this -> load -> view('../../plantilla/layout.php', $data);
		
		$this -> load -> view('../../plantilla/footer.php');
	
		
	}
	
	public function planilla_asignacion($estudiante = ''){
		
	$this -> load -> view('../../plantilla/header.php');
		
		$busqueda = $this->db->query("select * from alumnos where id = '".$estudiante."'");
		$cont_data['estudiante'] = $busqueda->row();



		$cont_data['matriculas'] = $this->db->query("select idMatricula from matriculas where estudiante = '$estudiante'")->result();



        $cont_data['facultades']  = $this->db->query("select id, Nombre from facultades")->result();
		$cont_data['asignaturas']  = $this->consultar_materias($estudiante);


        if(count($cont_data['matriculas'])>0){
		$data['contenido'] = $this -> load -> view('../../plantilla/planilla_asignacion.php', $cont_data, true);
        }else{

            $data['contenido'] = '<div class="well label-warning row-fluid"><i class="icon-exclamation-sign"></i> Atención: Este estudiante no se encuentra matriculado en alguna carrera de la institucion, si desea puede matricular este estudiante antes de continuar  <br><a data-original-title="Nueva Matricula" class="btn" href="'.base_url().'g_administrativa/formulario/0/'.$estudiante.'"><i class=" icon-plus"></i>Matricular Estudiante</a></div>';
        }
				
		$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	
		
	}
	
	public function consultar_materias($estudiante='0'){
		
		
		$datar = $this->db->query("select * from asignaturas_estudiante where id_estudiante = '$estudiante'")->result();
		
		$d2w = '';
		$sep = '';

        $data_final = array();

        if(count($datar)>0){
		foreach($datar as $row){

            $relacion = $this->db->query("select * from relaciones_core where id = '".$row->id_relacion."'")->row();
            $materia = $this->db->query("select * from asignaturas WHERE id ='".$relacion->asignatura_relacion."'")->row();

		array_push($data_final,array('id_relacion'=>$row->id_relacion,'asignatura'=>$materia->Nombre));
		}

       // print_r($data_final);
		return $data_final;
        }else{
		return array();	
		}
	}
	
	public function cunsultar_materias_combo($estudiante='0'){
		
		
		$materias = $this->cunsultar_materias($estudiante);
		
		$html = '';
		
		foreach($materias as $materia){
			
			$html .= '<option value="'.$materia->id.'">'.$materia->Nombre.'</option>';			
		}
		
		echo $html;
		
		
	}
	
	function category_pos_home($category){

		echo $_REQUEST['pos_val'];

		$category->pos_home = $_REQUEST['pos_val'];

		$this->db->where('id', $category->id);

		$this->db->update('categories', $category);

		

	}
	
		function sethomepos($id){
	
	$cat = $this->Category_model->get_category($id);
	$this->Category_model->category_pos_home($cat);
	return true;
		
	}

    function imprimir_f_alumno($id_alumno){



        $alumno = $this->db->query("select * from alumnos where id = '$id_alumno'")->row();

        $sede =  $this->db->query("select * from sedes where id = '".$alumno->sede_insc."'")->row();
        $facultad =  $this->db->query("select * from facultades where id = '".$alumno->facultad_insc."'")->row();
        $carrera =  $this->db->query("select * from carreras where id = '".$alumno->carrera_insc."'")->row();


       // echo $alumno->facultad_insc;

        $this -> pdf -> fontpath = 'font/';
        // Specify font folder
        $this -> pdf -> AddPage();
        $this -> pdf -> SetFont('times', 'B', 35);
        $this -> pdf -> Cell(180, 10, utf8_decode('Universidad Privada del Guairá'), 0, 0, "C");
        $this -> pdf -> Ln(20);
        $this -> pdf -> SetFont('times', 'B', 14);
        $this -> pdf -> Cell(160, 10, utf8_decode('Sede: '), 0, 0, "C");
        $this -> pdf -> Ln(10);
        $this -> pdf -> Cell(150, 10, utf8_decode($sede->Nombre), 0, 0, "C");

        $this -> pdf -> Image(base_url('plantilla/html/main-theme/images/logoficialupg2.jpg'), 20, 30, 40, 45, 'JPG', 'u');

       //proceso imagen de la base de datos

        $data = base64_decode(str_replace('data:image/png;base64,','',$alumno->foto));
        $im = imagecreatefromstring($data);
        if ($im !== false) {
    //        header('Content-Type: image/jpg');
//echo getcwd();
            $temp = 'temp/IMG_'.time().'.jpg';
            ImageJPEG($im,$temp,50);

            $this -> pdf -> Rect(140, 40, 41, 31, 'F');
            $this -> pdf -> Image($temp, 140, 40, 40, 30, 'JPG', 'u');

            imagedestroy($im);
            unlink($temp);


        }
        else {
            echo 'An error occurred.';
        }


        $this -> pdf -> SetFont('times', '', 10);
        // Framed title
        $this -> pdf -> Ln(40);
        $this -> pdf -> Cell(180, 6, utf8_decode("Facultad: ".$facultad->Nombre), 1, 0, "L");


        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(180, 6,utf8_decode("Carrera: ".$carrera->Nombre), 1, 0, "L");

        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(80, 6,utf8_decode("Nombres: ".$alumno->Nombre1), 1, 0, "L");

        $this -> pdf -> Cell(100, 6,utf8_decode("Apellidos: ".$alumno->Apellido1), 1, 0, "L");
        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(80, 6,utf8_decode("Documento de Identidad: ".$alumno->numCI), 1, 0, "L");
        $this -> pdf -> Cell(100, 6,utf8_decode("Email: ".$alumno->email), 1, 0, "L");
        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(180, 6,utf8_decode("Lugar de Nacimiento: ".$alumno->lugNacimiento), 1, 0, "L");
        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(180, 6,utf8_decode("Lugar de Residencia: ".$alumno->domicilio), 1, 0, "L");
        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(180, 6,utf8_decode("Telefono: ".$alumno->telefono), 1, 0, "L");
        $this -> pdf -> Ln(8);
        $this -> pdf -> Cell(80, 6,utf8_decode("Tipo de Ingreso: ".$alumno->tipo_ingreso), 1, 0, "L");
        $this -> pdf -> Cell(100, 6,utf8_decode("Tipo de matricula: ".$alumno->tipo_ingreso), 1, 0, "L");






        $this -> pdf->Output();

    }

    public function crear_pdf_inscripcion($id = '') {

        $acumTotal=0;


        // Load library
        $this -> pdf -> fontpath = 'font/';
        // Specify font folder
        $this -> pdf -> AddPage();
        $this -> pdf -> Rect(1, 1, 215, 288, '');
        $this -> pdf -> Image('../plantilla/html/main-theme/images/logoficialupg2.png', 20, 3, 50, 30, 'JPG', 'u');


        // Select Arial bold 15
        $this -> pdf -> SetFont('Arial', 'B', 16);
        // Move to the right
        $this -> pdf -> Cell(100);
        // Framed title
        $this -> pdf -> Cell(60, 10, utf8_decode('Cotización No: ' . $id), 0, 0, "C");

        $this -> pdf -> Ln(20);
        $this -> pdf -> SetFont('Arial', '', 8);

        $output['extras']=$this->pedidos_model->consulta_individual_pedido($id);
        $extras=$output['extras']->row();



        if(@strip_tags($this->get_empresa_name($extras->empresa,""))!="")
            $this -> pdf -> Cell(60, 20, "Para: " . @strip_tags($this->get_empresa_name($extras->empresa, '')), 0, 0, "C");
        else {
            $this -> pdf -> Cell(60, 20, "Para: Usuario Genérico", 0, 0, "C");
        }
        // Line break
        $this -> pdf -> Ln(20);

        $this -> pdf -> SetFillColor(255, 255, 255);
        $this -> pdf -> SetTextColor(0, 0, 0);
        $this -> pdf -> SetDrawColor(0, 0, 0);
        $this -> pdf -> SetLineWidth(.3);
        $this -> pdf -> SetFont('Arial', 'B', 8);
        $this -> pdf -> Cell(10, 7, "#Id", 1, 0, 'C');
        $this -> pdf -> Cell(80, 7, "Nombre", 1, 0, 'C');
        $this -> pdf -> Cell(25, 7, "Servicio", 1, 0, 'C');
        $this -> pdf -> Cell(25, 7, "Producto", 1, 0, 'C');

        $this -> pdf -> Cell(15, 7, "Cant", 1, 0, 'C');
        $this -> pdf -> Cell(20, 7, "Precio ", 1, 0, 'C');
        $this -> pdf -> Cell(20, 7, "Total", 1, 0, 'C');
        $this -> pdf -> Ln(8);
        $this -> pdf -> SetFont('Arial', 'B', 7);

        $horas_servicio = 0;

        foreach ($this->cart->contents() as $items) {
            $this -> pdf -> Cell(10, 7, utf8_decode($items['id']), 1, 0, 'C');
            $this -> pdf -> cell(80, 7, utf8_decode($items['name']), 1, 0, 'L');
            if ($items['options']['tipo'] == 'Servicio') {

                $acum=$items['qty']*$items['options']['horas'];
                $acumTotal=$acumTotal+$acum;


                $this -> pdf -> Cell(25, 7, 'X', 1, 0, 'C');

            } else {
                $this -> pdf -> Cell(25, 7, "", 1, 0, 'C');

            }
            if ($items['options']['tipo'] == 'Producto') {
                $this -> pdf -> Cell(25, 7, "X", 1, 0, 'C');
            } else {
                $this -> pdf -> Cell(25, 7, "", 1, 0, 'C');
            }
            $this -> pdf -> Cell(15, 7, $items['qty'], 1, 0, 'C');
            $this -> pdf -> Cell(20, 7, $items['price'], 1, 0, 'C');
            $this -> pdf -> Cell(20, 7, $this -> cart -> format_number($items['qty'] * $items['price']), 1, 0, 'C');
            $this -> pdf -> Ln(8);
        }



        $this -> pdf -> Ln(20);
        $this -> pdf -> SetFont('Arial', 'B', 10);

        $this -> pdf -> Cell(195, 10, utf8_decode("Datos Adicionales de la cotización"), 1, 0, 'C');
        $this -> pdf -> Ln(10);
        $this -> pdf -> SetFont('Arial', 'B', 8);

        $this -> pdf -> Cell(195, 10, utf8_decode($extras->extras) , 1, 0, 'C');


        // Generate PDF by saying hello to the world
        $this -> pdf -> Ln(20);
        $total = "Total:  " . $this -> cart -> format_number($this -> cart -> total());
        $this -> pdf -> cell(100, 7, $total, 0, 0, 'R');

        $this -> pdf -> Ln(10);
        $total = "Fecha de Creación:  " . date('Y-m-d H:i');;
        $this -> pdf -> cell(100, 7, utf8_decode($total), 0, 0, 'R');
        $this -> pdf -> Ln(10);
        $total = "Fecha Límite:  " . utf8_decode($extras->fechaLim);
        $this -> pdf -> cell(100, 7, utf8_decode($total), 0, 0, 'R');
        $this -> pdf -> Ln(10);
        $string = 'cotizacion#' . $id;


        $total = "'Duración del servicio:  " . utf8_decode($acumTotal).' Horas';
        $this -> pdf -> cell(100, 7, utf8_decode($total), 0, 0, 'R');
        $pdf = $this -> pdf -> Output("pdf/" . $string . ".pdf", "F");
        $this -> pdf -> Ln(10);

        $total = "Fecha del pdf" . utf8_decode($extras->fecha);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
