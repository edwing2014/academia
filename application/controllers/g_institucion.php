<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class G_institucion extends CI_Controller {

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
		
		public function sedes() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('sedes');

		$crud -> set_subject('Sedes');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre');
        $crud -> fields('Nombre','Descripcion');

        $crud->unset_texteditor('Descripcion','full_text');
		
		$data['output']=$crud -> render();
		$data['title']='Sedes1';
		
		
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
        $crud -> fields('Nombre','Descripcion');

        $crud->unset_texteditor('Descripcion','full_text');

		//$crud->field_type('sedes','multiselect',$this->Sedes_model->listarSedesCombo());
		
		
		
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


		public function carreras() {
	
		$crud = new grocery_CRUD();
		//Asignamos el thema default
		$crud -> set_theme('twitter-bootstrap');
		$crud -> set_table('carreras');

		$crud -> set_subject('Carreras');
		$crud -> required_fields('Nombre');
		$crud -> columns('Nombre','semestres');
        $crud -> fields('Nombre','semestres','Descripcion');

		$crud->unset_texteditor('Descripcion','full_text');
		
		$this->load->model('Sedes_model');
		
		$crud->field_type('sedes','multiselect',$this->Sedes_model->listarSedesCombo());
		
		$this->load->model('Facultades_model');
		
		$crud->field_type('facultad','multiselect',$this->Facultades_model->listarFacultadesCombo());
		
		
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
		
		
		$crud -> fields('Nombre', 'sedes', 'facultad','carreras','Descripcion');
		$crud -> set_subject('Cursos');
		$crud -> required_fields('facultad','Nombre');
		$crud -> columns('Nombre');
		
		$crud->unset_texteditor('Descripcion','full_text');
		
		$this->load->model('Sedes_model');
		
		$crud->field_type('sedes','multiselect',$this->Sedes_model->listarSedesCombo());
		
		$this->load->model('Facultades_model');
		
		$crud->field_type('facultad','multiselect',$this->Facultades_model->listarFacultadesCombo());
		
		$this->load->model('Carreras_model');
		
		$crud->field_type('carreras','multiselect',$this->Carreras_model->listarCarrerasCombo());


		
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
		$crud -> columns('Nombre','Duracion');
       // $crud->unset_texteditor('Descripcion','full_text');

            $crud->unset_add();
            $crud->unset_edit();

            $crud->add_action('Editar', '', '','ui-icon-image',array($this,'editar_asig'));

        $crud->field_type('profesor','multiselect',$this->listarProfesoresCombo());
    //    $crud->field_type('semestre','multiselect',$this->semestresCombo());

            $this->load->library('gc_dependent_select');
            //////////////


            // settings

            $fields = array(

// first field:
                'sede' => array( // first dropdown name
                    'table_name' => 'sedes', // table of country
                    'title' => 'Nombre', // country title
                    'relate' => null // the first dropdown hasn't a relation
                ),
// second field
                'facultad' => array( // second dropdown name
                    'table_name' => 'facultades', // table of state
                    'title' => 'Nombre', // state title
                    'id_field' => 'facultad', // table of state: primary key
                    'relate' => 'id', // table of state:
                    'data-placeholder' => 'select state' //dropdown's data-placeholder:

                ),
                'carrera' => array( // second dropdown name
                    'table_name' => 'carreras', // table of state
                    'title' => 'Nombre', // state title
                    'id_field' => 'facultad', // table of state: primary key
                    'relate' => 'id', // table of state:
                    'data-placeholder' => 'select state' //dropdown's data-placeholder:
                )
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

// the second method:
            $js = $categories->get_js();

		
		$data['output']=$crud -> render();
        $data['output']->output .= $js;
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

    function asignaturas_form($id = false,$padre = false){

        if($id != false and $id != 'multicombo' or $id == '0'){


        $this -> load -> view('../../plantilla/header.php');
        $data['title']='Asignaturas';

        $data['id'] = $id;
        $data['auto_mat'] = 'nueva';

        if($id){

        $data['asignatura_data'] = $this->db->query("select * from asignaturas where id = '$id'")->row();
        }else{
            $data['asignatura_data'] = new ArrayObject();
            $data['asignatura_data']->Nombre = '';
            $data['asignatura_data']->id = '';
            $data['asignatura_data']->Duracion = '';

        }

        $this->load->model('Sedes_model');
        $data['sedes_data'] =  $this->Sedes_model->traer_sedes();

//facultades
        $this->load->model('Facultades_model');
        $data['facultades_data'] =  $this->Facultades_model->traer_facultades();


        //carreras
        $this->load->model('Carreras_model');
        $data['carreras_data'] =  $this->Carreras_model->traer_carreras();


        //carreras
        $this->load->model('Carreras_model');


        //  $cont_data['carrera_sl']  =  $this->Carreras_model->consulta_carrera($cont_data['estudiante']->carrera);
        $data['carrera_sl'] = 10;


            if($id != false && $id != '0'){

               // echo "consultando";

                $data['asignaciones'] = $this->relaciones_query($id);

                //print_r($data['asignaciones']);


            }else{

                $data['asignaciones'] = array('num_rows'=>'0', 'data' => array());

            }


            if ($this->ion_auth->logged_in())
        {
            $data['contenido'] = $this -> load -> view('../../plantilla/asignatura_form.php', $data, true);
            $data['output']=$this -> load -> view('../../plantilla/layout.php', $data);
        }
        else {
            $this -> load -> view('../../plantilla/login.php',$data);

        }
		$this -> load -> view('../../plantilla/footer.php');
    }else{

            $result = array();

            if($padre == 'sedes'){
                $sql = "select id, Nombre from facultades where ";
                $datastr = '';
                $sep = '';

                $cmb = explode(',',$_POST['option_combo']);

                //print_r($_POST['option_combo']);

                foreach($cmb as $idd){

                    // echo $idd."<br>";
                    $datastr .= $sep.'sedes REGEXP('.$idd.') ';
                    $sep = 'or ';

                }
                $result = $this->db->query($sql.$datastr)->result();
            }

            if($padre == 'facultades'){
                $sedess = $_POST['sedes'];
                $sql = "select id, Nombre from carreras where  sedes REGEXP($sedess) and ";
                $datastr = '';
                $sep = '';

                $cmb = explode(',',$_POST['option_combo']);

                //print_r($_POST['option_combo']);

                foreach($cmb as $idd){

                    // echo $idd."<br>";
                    $datastr .= $sep.'facultad REGEXP('.$idd.') ';
                    $sep = 'or ';

                }
                $result = $this->db->query($sql.$datastr)->result();
            }

            if($padre == 'carreras'){


            }


            if($padre == 'semestres'){

                $result = array();
                $carrera = $this->db->query("select id, Nombre, semestres from carreras where  id = '$_POST[carrera]'")->row();

                for($i=0;$i<=$carrera->semestres-1;$i++){
;


                    $obj = (object) array();

                    $obj->id = ($i+1);
                    $obj->Nombre = "Semestre ".($i+1);

                    array_push($result,$obj);

                }

            }







            echo $this->get_ext_json($result);

            }

    }


    function relaciones_query($id){



        $sql = "select * from relaciones_core where asignatura_relacion = '$id'";
        $query = $this->db->query($sql);

        $data = $query->result();

       // print_r($data);



        if(count($data)>0){
        foreach($data as $item){


            $sede_relacion_Q = $this->db->query("select Nombre from sedes where id = '".$item->sede_relacion."'")->row();
            $item->sede_relacion_name = $sede_relacion_Q->Nombre;

            $facultad_relacion_Q = $this->db->query("select Nombre from facultades where id = '".$item->facultad_relacion."'")->row();
           $item->facultad_relacion_name = $facultad_relacion_Q->Nombre;

            $carrera_relacion_Q = $this->db->query("select Nombre from carreras where id = '".$item->carrera_relacion."'")->row();

         //   print_r($item->carrera_relacion);
            $item->carrera_relacion_name = $carrera_relacion_Q->Nombre;
        }

        return array('num_rows'=>count($data),'data' => $data);

    }else{

    return array('num_rows'=>count($data),'data' => array());
}
    }

    function get_ext_json($data_in){

        if(is_array($data_in)){
            $data = $data_in;
        }else{
            $data  = $this->getAssoc();
        }
        $nro_regs = count($data);


        $json= "{\"records\":\"$nro_regs\",\"data2\":[";
        //echo "regs:".$nro_regs;
        $rc = 0;
        if($nro_regs>0){
            //abrimos el registro y lo recorremos
            for($i=0;$i<=$nro_regs-1;$i++){
                $rc++;
                $json.= '{';
                $fields = array_keys((array)$data[$i]);
                $values = array_values((array)$data[$i]);
                $nro_campos = count($fields);
                // echo $nro_campos;
                //
                for($c=0;$c<=$nro_campos-1;$c++){ // recorremos los campos
                    $json.="\"$fields[$c]\":\"$values[$c]\"";
                    if($c < $nro_campos-1){
                        $json.=",";
                    }else{
                        $json.="";
                    }
                }
                if($rc!=$nro_regs){
                    $json.="},";
                }else{
                    $json.="}";
                }
            }
            $json.="]}";


            return $json;


        }else{
            $json .= "]}";
            return $json;

        }


    }

    function editar_asig($primary_key , $row){

        return base_url('g_institucion/asignaturas_form/'.$primary_key);

    }

    function listarProfesoresCombo()
    {
        $this -> load -> database();
        $query = $this->db->query('select * from profesores');

        $dataCombo = array();
        if($query->num_rows()>0){
        foreach($query->result() as $row){

            $dataCombo[$row->idProfesor] = $row->nombres.' '.$row->apellidos;

        }
        }else{

        }

        return $dataCombo;

    }


    function semestresCombo()


    {



        $nro_semestres = 6;

        $dataCombo = array();

        for($i=1;$i<=$nro_semestres;$i++){

           $dataCombo[$i] = "Semestre".$i;

        }


        return $dataCombo;

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
	
	public function asignar_asignaturas($estudiante='', $matricula = ''){
		
	
	$values = explode(',', $this->input->post('asignaturas'));
	$estudiante = $this->input->post('estudiante');

	$this->db->query("delete from asignaturas_estudiante where id_estudiante = '$estudiante'");

	$this->db->trans_start();
	foreach($values as $valor){
	$this->db->query("insert into asignaturas_estudiante (`id_estudiante`,`id_relacion`,`id_matricula`) values ('$estudiante','$valor','$matricula')");
	}
	$this->db->trans_complete(); 	
	
		
	}
	
	
	public function load_combo($module=''){
	
	//echo "module:".$module;


if(isset($_GET['id'])){
    $_GET['id'] =    str_replace('__jcombo__', '',$_GET['id']);



    $id = $_GET['id'];

    $module = $_GET['option'];

}else{
		$module1 = explode('-' ,$module); 
		
		$id = $module1[1];
		
		$module = $module1[0];
}

		if(isset($module1[2])){
		$id_facultad = $module1[2];
		
		//echo "f".$id_facultad;
		
		}
		
		if(isset($module1[3])){
		$id_carrera = $module1[3];
		
		//echo "f".$id_facultad;
		
		}
	
		if($module == 'facultades'){
		$query = $this->db->query("select * from facultades where id IN  (select facultad_relacion from relaciones_core where sede_relacion = '".$id."' group by facultad_relacion)");

			
		}
		
		if($module == 'carreras'){
			
		$query = $this->db->query("select * from carreras where id IN  (select carrera_relacion from relaciones_core where facultad_relacion = '".$id_facultad."' group by carrera_relacion)");

			
		}
		
		if($module == 'semestres'){

		$query = $this->db->query("select * from carreras where id = '".$_GET['id']."'");
		

			
			
		}
		



		$dataCombo = array();


        if($module != 'semestres'){
        //  print_r($query->result());
			foreach($query->result() as $row){
				
			$dataCombo[$row->id] = htmlentities($row->Nombre);
				
				}


    }else{

            $carrera = $query->row();
            $nro_semestres = (int) $carrera->semestres;

            for($i=1;$i<=$nro_semestres;$i++){

                $dataCombo[$i] = "Semestre : ".($i);

            }


        }
			
		//	echo json_encode($dataCombo);
			// Convertimos en formato JSON, luego imprimimos la data
    $response = isset($_GET['callback'])?$_GET['callback']."(".json_encode($dataCombo).")":json_encode($dataCombo);
   // $cache->finish($response);    	
		echo $response; 
	}


    function elimina_asignacion(){

        $where_ids = '';
        $sep ='';

        foreach($_POST as $item => $value){

          $where_ids .= $sep.$item." = '".$value."'";
          $sep = " and ";

        }

      //  echo $where_ids;

        $this->db->query("delete from relaciones_core where ".$where_ids);

    }


    function get_matricula_panel($panel = false){


        $matricula = $this->db->query("select * from matriculas where idMatricula = '$panel'")->row();

        $sede_relacion_Q = $this->db->query("select Nombre from sedes where id = '".$matricula->sede."'")->row();
        $sede_relacion_Q = $sede_relacion_Q->Nombre;

        $facultad_relacion_Q = $this->db->query("select Nombre from facultades where id = '".$matricula->facultad."'")->row();
        $facultad_relacion_Q = $facultad_relacion_Q->Nombre;

        $carrera_relacion_Q = $this->db->query("select Nombre from carreras where id = '".$matricula->carrera."'")->row();
        $carrera_relacion_Q = $carrera_relacion_Q->Nombre;


        $semestre_relacion_Q = $matricula->semestre;



    echo "<div class='row well'>";

        echo '<div class="row-fluid"><h4>Matricula selccionada: '.$panel.'</h4></div><br>';
        echo '<div class="row-fluid">';
        echo '<div class="span6"><b>Sede:</b> '.$sede_relacion_Q.'</div>';
        echo '<div class="span6"><b>Facultad:</b> '.$facultad_relacion_Q.'</div>';
        echo "</div>";
        echo '<div class="row-fluid">';
        echo '<div class="span6"><b>Carrera:</b> '.$carrera_relacion_Q.'</div>';
        echo '<div class="span6"><b>Semestre:</b> '.$semestre_relacion_Q.'</div>';
        echo "</div>";

    echo "</div>";

    }


    function asignaturas_matricula_combo($matricula = false){

        $matricula = $this->db->query("select * from matriculas where idMatricula = '$matricula'")->row();

        $relaciones_matricula = $this->db->query("select * from relaciones_core where sede_relacion = '".$matricula->sede."' and facultad_relacion = '".$matricula->facultad."' and carrera_relacion = '".$matricula->carrera."'")->result();

      //  print_r($relaciones_matricula);

        foreach($relaciones_matricula as $relacion){

            $asignatura = $this->db->query("select Nombre from asignaturas where id = '".$relacion->asignatura_relacion."'")->row();

           echo '<option value="'.$relacion->id.'">'.$asignatura->Nombre.' Semestre: '.$relacion->semestre_relacion.'</option>';


        }


    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
