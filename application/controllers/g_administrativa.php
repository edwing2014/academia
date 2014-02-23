<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class G_administrativa extends CI_Controller {

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
		
	



	public function index() {
		
		
		}


    function get_estudiante_id($id=0){

      $est =  $this->db->query("select id from alumnos where numCI = '$id'")->row();
if(@$est->id){
    echo  $est->id;
    }else{

   $_SESSION['error'] = 'El numero de identificacion ingresado no se encuentra subscrito en el sistema <a href="http://localhost/academia/g_administrativa/inscripcion/0/matricula">Inscribir de alumno?</a>';
    echo base64_encode($_SESSION['error']) ;
}
    }
//matriculas



		public function matriculas($estudiante='', $identificacion = false){
						
			
			
		$this -> load -> view('../../plantilla/header.php');
				
			
		//planilla de busqueda
		if($estudiante == ''){
		$cont_data['estudiante'] = $estudiante;

        if(isset($_SESSION['error'])){
        echo "sees: ".    $_SESSION['error']."<br>";
        }


		$data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', $cont_data, true);		
			
		}elseif($estudiante == '0'){


            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('idMatricula', 'Matricula Nro', 'required');
            $this->form_validation->set_rules('identificacion', 'identificacion Nro', 'required');


            if($identificacion){
            $_POST['identificacion'] = $identificacion;

            }


            if ($this->input->post('idmatricula') == '' && $this->input->post('identificacion') == '')
            {

                $cont_data['estudiante'] = $estudiante;
                $cont_data['error'] = "ERROR, Debe ingresar algun parametro para realizar la busqueda";
                $data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', $cont_data, true);


        }else{




                //$busqueda = $this->db->query("select * from matriculas where estudiante IN(select id from alumnos where alumnos.numMatricula = '".$this->input->post('idMatricula')."' or alumnos.numCI = '".$this->input->post('identificacion').")'");



                if($this->input->post('idmatricula') != ''){


                    $query = $this->db->query("SELECT * FROM matriculas where idMatricula = '".$this->input->post('idmatricula')."'");

                    if($query->num_rows()>0){

                    redirect('g_administrativa/formulario/'.$this->input->post('idmatricula'));
                    }else{
                        $cont_data['estudiante'] = $estudiante;
                        $cont_data['error'] = "ERROR, La matricula solicitada no existe, intente de nuevo o ingrese una nueva matricula.";
                        $data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', $cont_data, true);
                    }

                }

                if($this->input->post('identificacion') != ''){


                    $query = $this->db->query("SELECT * FROM alumnos where numCi = '".$this->input->post('identificacion')."'");

                    if($query->num_rows()>0){

                     $estudiante_data = $query->row();

                    $sql_bs = "select * from matriculas where estudiante in (select id from alumnos where numCi = '".$this->input->post('identificacion')."')" ;


//echo $sql_bs."<br>";

                $busqueda = $this->db->query($sql_bs);

                $sql_m =  $this->db->last_query();


                $results_mat = $busqueda->result();

                //  print_r($results_mat);

                $this->load->model('Carreras_model');
                        $alumno_m = '';
                foreach($results_mat as $mat){
                    $alumno_m = $mat->estudiante;
                  //    echo "c".$mat->carrera."<br>";
                    if($mat->carrera != '0'){
                    $mat->carrera =  $this->Carreras_model->consulta_carrera($mat->carrera);
                    if($mat->carrera->Nombre){
                        $mat->carrera = $mat->carrera->Nombre;
                    }else{
                        $mat->carrera = 'Error: sin carrera';
                    }

                }else{
                        $mat->carrera = 'Error: sin carrera';

                }
                }

                $cont_data['matriculas'] = $results_mat;

                        $cont_data['estudiante'] = $this->db->get_where('alumnos', array('id' => $alumno_m))->row();



                //sedes
                $this->load->model('Sedes_model');

                $cont_data['sedec'] =  $this->Sedes_model->traer_sedes();
                if(count($results_mat)>0){
                $data['contenido'] = $this->load -> view('../../plantilla/lista_matriculas', $cont_data, true);
                }else{
                redirect('g_administrativa/formulario/0/'.$estudiante_data->id);
                }
                }else{
                        $cont_data['estudiante'] = $estudiante;
                        $cont_data['error'] = "ERROR, El documento a consultar no pertenece a ningun alumno registrado puede intentar <a href='".base_url()."g_administrativa/inscripcion/0/matricula'>Inscripcion de alumno</a>  .";
                        $data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', $cont_data, true);


                    }


                }

        }



		}else{
		$cont_data['estudiante'] = $estudiante;
		$cont_data['error'] = "ERROR, Debe ingresar algun parametro para realizar la busqueda";		
		$data['contenido'] = $this -> load -> view('../../plantilla/busq_matriculas.php', $cont_data, true);		
		}
			

			

		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
						
			$this -> load -> view('../../plantilla/footer.php');
			
		}

    function lista_matriculas($id=0){




        //$busqueda = $this->db->query("select * from matriculas where estudiante IN(select id from alumnos where alumnos.numMatricula = '".$this->input->post('idMatricula')."' or alumnos.numCI = '".$this->input->post('identificacion').")'");

        $sql_bs = "select * from matriculas a left join alumnos b on a.estudiante = 'b.idAlumno'";

        if($this->input->post('idMatricula') != ''){

            $sql_bs = $sql_bs.' and a.id = \''.$this->input->post('idMatricula').'\'' ;

        }

        if($this->input->post('identificacion') != ''){

            $sql_bs = $sql_bs.' and b.numCI = \''.$this->input->post('identificacion').'\'' ;

        }
//echo $sql_bs."<br>";

        $busqueda = $this->db->query($sql_bs);

        $sql_m =  $this->db->last_query();


        $results_mat = $busqueda->result();

        //  print_r($results_mat);

        $this->load->model('Carreras_model');

        foreach($results_mat as $mat){
            $alumno_m->estudiante;
            //  echo "c".$mat->carrera."<br>";
            $mat->carrera =  $this->Carreras_model->consulta_carrera($mat->carrera);
            if($mat->carrera->Nombre){
                $mat->carrera = $mat->carrera->Nombre;
            }else{
                $mat->carrera = '';
            }
        }
        $alumno_m = (objet);
        $cont_data['estudiante'] = $this->db->get_where('alumnos', array('id' => $alumno_m))->row();


        $cont_data['matriculas'] = $results_mat;



        //sedes
        $this->load->model('Sedes_model');

        $cont_data['sedec'] =  $this->Sedes_model->traer_sedes();

        $data['contenido'] = $this->load -> view('../../plantilla/lista_matriculas.php', $cont_data, true);


    }
//formulario matricula

    function formulario($id=0,$alumno_m = 0,$identificacion = false){
        $this -> load -> view('../../plantilla/header.php');


        if($id != 0){

        $sql_bs = "select * from matriculas, alumnos where matriculas.idMatricula = '$id' and alumnos.id = matriculas.estudiante;";
        $cont_data['estudiante'] = $this->db->query($sql_bs)->row();

        $cont_data['cuotas_matricula'] = $this->db->query("select * from cuotas_matricula where idMatricula = '$id'")->result();


//echo $sql_bs;
//sedes
        }elseif($alumno_m != 0){

            $cont_data['estudiante'] = $this->db->get_where('alumnos', array('id' => $alumno_m))->row();

            $cont_data['estudiante']->monto_matricula = '';

            $cont_data['estudiante']->matricula_exon = '';
            $cont_data['estudiante']->estudiante = $alumno_m;
            $cont_data['estudiante']->monto_cuota = '';
            $cont_data['estudiante']->cantidad_cuotas = '';
            $cont_data['estudiante']->fecha_vence_cuota = '';
            $cont_data['estudiante']->int_mora = '';
            $cont_data['estudiante']->idMatricula = '0';
            $cont_data['cuotas_matricula'] = array();

        }else{

            echo $id;

            $cont_data['estudiante'] =  (object) array(
                'Nombre1' => '',
                'Apellido1' => '',
                'numCI' => '',
                'lugNacimiento' => '',
                'domicilio' => '',
                'telefono' => '',
                'sede_inc' => '',
                'facultad_inc' => '',
                'carrera_inc' => '',
                'semestre_inc' => '',
                'codProcedencia' => '',
                'bachiller_terminado' => '',
                'tipo_ingreso' => '',
                'email' => '',
                'id' => '');

            $cont_data['estudiante']->monto_matricula = '';

            $cont_data['estudiante']->matricula_exon = '';

            $cont_data['estudiante']->monto_cuota = '';
            $cont_data['estudiante']->cantidad_cuotas = '';
            $cont_data['estudiante']->fecha_vence_cuota = '';
            $cont_data['estudiante']->int_mora = '';

            $cont_data['estudiante']->idMatricula = '0';
            $cont_data['cuotas_matricula'] = array();

        }

        $this->load->model('Sedes_model');
         $cont_data['sedes_data'] =  $this->Sedes_model->traer_sedes();

//facultades
        $this->load->model('Facultades_model');
        $cont_data['facultades_data'] =  $this->Facultades_model->traer_facultades();


        //carreras
        $this->load->model('Carreras_model');
        $cont_data['carreras_data'] =  $this->Carreras_model->traer_carreras();


        //carreras
        $this->load->model('Carreras_model');


        $cont_data['carrera_sl']  =  $this->Carreras_model->consulta_carrera($cont_data['estudiante']->carrera_insc);


        if(count($cont_data['carrera_sl'])>0){
        $cont_data['carrera_sl'] = (int) $cont_data['carrera_sl']->semestres;
        }else{
            $cont_data['carrera_sl'] = 0;
        }
//print_r($cont_data['facultades_data']);



     //  print_r( $cont_data['estudiante']);

        $data['contenido'] = $this -> load -> view('../../plantilla/matricula.php', $cont_data, true);
        $data['output']=$this -> load -> view('../../plantilla/layout.php', $data);

        $this -> load -> view('../../plantilla/footer.php');
    }



    public function guardar_matricula(){


        unset($_POST['idMatricula']);

        $this->db->insert('matriculas', $this->input->post());
        $id_insert	= $this->db->insert_id();



        $fecha_act = $this->input->post('fecha_vence_cuota');
        $mes =  date("m", strtotime($fecha_act));
        $nc = 1;

        $data_cuota = array(
            'Nrodecuota' => $nc,
            'fecha_vence' => $fecha_act,
            'descripcion' => 'Cuota del mes de '.$this->mes_nombre($mes),
            'total'        => $this->input->post('monto_cuota'),
            'idMatricula'   => $id_insert,
            'cancelada'    => 'No');

        $this->db->insert('cuotas_matricula', $data_cuota );


        for($i=0; $i < (int)$this->input->post('cantidad_cuotas')-1;$i++){

            $nc++;
            $fecha_act =  date("Y-m-d", strtotime($fecha_act."+1 month"));
            $mes =  date("m", strtotime($fecha_act));

            $data_cuota = array(
                'Nrodecuota' => $nc,
                'fecha_vence' => $fecha_act,
                'descripcion' => 'Cuota del mes de '.$this->mes_nombre($mes),
                'total'        => $this->input->post('monto_cuota'),
                'idMatricula'   => $id_insert,
                'cancelada'    => '0');

            $this->db->insert('cuotas_matricula', $data_cuota );




        }

        redirect('g_administrativa/formulario/'.$id_insert);


    }

    function mes_nombre($id_mes){

        $id_mes = (int)$id_mes;

        $mes[1] = "Enero";
        $mes[2] = "Febrero";
        $mes[3] = "Marzo";
        $mes[4] = "Abril";
        $mes[5] = "Mayo";
        $mes[6] = "Junio";
        $mes[7] = "Julio";
        $mes[8] = "Agosto";
        $mes[9] = "Septiembre";
        $mes[10] = "Octubre";
        $mes[11] = "Noviembre";
        $mes[12] = "Diciembre";



        return $mes[$id_mes];
    }
		
		public function sedes() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('sedes');

		$crud -> set_subject('Sedes');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre');
		
		
		$data['output']=$crud -> render();
		$data['title']='Sedes';
		
		
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

	public function facultades() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('facultades');

		$crud -> set_subject('Facultades');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre');
		
		$crud->set_relation('id_sede','sedes','Nombre');
		
		$crud->field_type('categorias','multiselect',$this->categorias_model->listarCategoriasCombo());
		
		$data['output']=$crud -> render();
		$data['title']='Facultades';
		
		
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

	public function inscripcion($id = '',$option = '') {
		$this -> load -> view('../../plantilla/header.php');




        $cont_data['auto_mat'] = $option;
        $cont_data['id'] = $id;

        if(!$id){

        $cont_data['estudiante_data'] = (object) array(
        'Nombre1' => '',
        'Apellido1' => '',
        'numCI' => '',
        'lugNacimiento' => '',
        'domicilio' => '',
        'telefono' => '',
        'sede_insc' => '',
        'facultad_insc' => '',
        'carrera_insc' => '',
        'semestre_insc' => '',
        'codProcedencia' => '',
        'bachiller_terminado' => '',
        'tipo_ingreso' => '',
        'email' => '',
        'foto' => '',
        'id' => '');

        }else{

            $cont_data['estudiante_data'] = $this->db->get_where('alumnos', array('id' => $id))->row();

        }

        $this->load->model('Sedes_model');


        //sedes


        $cont_data['sedes_data'] =  $this->db->query("select * from sedes where id IN (select sede_relacion from relaciones_core)")->result();
//facultades

        $cont_data['facultades_data'] =  array();


        //carreras
        $this->load->model('Carreras_model');


        $cont_data['carreras_data'] =  array();





      //  $cont_data['carrera_sl']  =  $this->Carreras_model->consulta_carrera($cont_data['estudiante']->carrera);
        $cont_data['carrera_sl'] = 10;



        $data['contenido'] = $this -> load -> view('../../plantilla/inscripcion.php', $cont_data, true);
		$data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
		$this -> load -> view('../../plantilla/footer.php');
	}



    function guardar_inscripcion($post_save='save'){

        $alumno = $this->input->post('id');


        if($this->input->post('id')){

          //  print_r($this->input->post());

            $this->db->where('id', $this->input->post('id'));
            unset($_POST['id']);

            $this->db->update('alumnos', $this->input->post());

          //  echo $this->db->last_query();

        }else{


            unset($_POST['estudiante']);

          //  print_r($this->input->post());


            $this->db->insert('alumnos', $this->input->post());
            $id_insert	= $this->db->insert_id();



        }

        if($post_save == 'save'){


            if($alumno){
            redirect('g_administrativa/inscripcion/'.$alumno);
            }else{
            redirect('g_administrativa/inscripcion/'.$id_insert);
            }

        }elseif($post_save == 'matricula'){
            redirect('g_administrativa/formulario/0/'.$id_insert);

        }elseif($post_save == 'nuevo'){
            redirect('g_administrativa/inscripcion/');

        }




    }


public function pagar_cuota($id=false,$matricula=false){

    $fecha_c = date('Y-m-d');
    $this->db->query("UPDATE `cuotas_matricula` SET `cancelada`='1', `fecha_cancelada`='$fecha_c' WHERE (`id`='$id')");
    redirect('g_administrativa/formulario/'.$matricula);
}

		public function carreras() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('carreras');

		$crud -> set_subject('Carreras');
		$crud -> required_fields('Nombre');
		$crud -> columns('facultad','Nombre');
		
		$crud->set_relation('facultad','facultades','Nombre');
		
		
		$data['output']=$crud -> render();
		$data['title']='Carreras';
		
		
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
	
			public function cursos() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('cursos');

		$crud -> set_subject('Cursos');
		$crud -> required_fields('facultad','carrera','Nombre');
		$crud -> columns('facultad','carrera','Nombre');
		
		$crud->set_relation('facultad','facultades','Nombre');
		$crud->set_relation('carrera','carreras','Nombre');
		
		$data['output']=$crud -> render();
		$data['title']='Cursos';
		
		
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
	
		public function asignaturas() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('asignaturas');

		$crud -> set_subject('Asignaturas');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre','profesor','curso','carrera','facultad');
		
		$crud->set_relation('facultad','facultades','Nombre');
		$crud->set_relation('carrera','carreras','Nombre');
		$crud->set_relation('curso','cursos','Nombre');
		$crud->set_relation('profesor','profesores','Nombres');
		
		$data['output']=$crud -> render();
		$data['title']='Asignaturas';
		
		
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
	
		public function secciones() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('secciones');

		$crud -> set_subject('Secciones');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre');
		
		
		$data['output']=$crud -> render();
		$data['title']='Secciones';
		
		
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
	
	public function get_carreras_combo($facultad = '0'){
		
	$data = $this->db->query("select * from carreras where facultad = '$facultad'")->result();	
	
	$html = '';
	foreach($data as $row){
		
	$html .= '<option value="'.$row->id.'">'.$row->Nombre.'</option>';
		
	}
	
	echo $html;
	
		
	}
	
	public function get_curso_combo($carrera = '0'){
		
	$data = $this->db->query("select * from cursos where carrera = '$carrera'")->result();	
	
	$html = '';
	foreach($data as $row){
		
	$html .= '<option value="'.$row->id.'">'.$row->Nombre.'</option>';
		
	}
	
	echo $html;
	
		
	}
	
		public function get_asignaturas_combo($curso = '0'){
		
	$data = $this->db->query("select * from asignaturas where curso = '$curso'")->result();	
	
	$html = '';
	foreach($data as $row){
		
	$html .= '<option value="'.$row->id.'">'.$row->Nombre.'</option>';
		
	}
	
	echo $html;
	
		
	}
	
	public function asignar_asignaturas($estudiante=''){
		
	
	$values = explode(',', $this->input->post('asignaturas'));
	$estudiante = $this->input->post('estudiante');

	$this->db->query("delete from relation_asign_estudiante where idEstudiante = '$estudiante'");	

	$this->db->trans_start();
	foreach($values as $valor){
	$this->db->query("insert into relation_asign_estudiante (`idEstudiante`,`idAsignatura`) values ('$estudiante','$valor')");
	}
	$this->db->trans_complete(); 	
	
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
