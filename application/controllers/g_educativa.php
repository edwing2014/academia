<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class g_educativa extends CI_Controller {

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


    public function crear_asignacion(){

        $_POST['sede_relacion'];
        $_POST['carrera_relacion'];
        $_POST['facultad_relacion'];
        $_POST['semestre_relacion'];

        $this->db->insert('relaciones_core', $_POST);


    }

    public function cargar_asignaciones(){


        $id_asignatura = $_POST['asignatura'];

        $asignaturas_data = $this->db_query("select * from relaciones_core where asignatura = '$id_asignatura'")->result();

        echo $this->get_ext_json($asignaturas_data);



    }

    public function guardar_asignatura($option = false){



        if($_POST['id'] and $_POST['id'] != '0'){

        $form = array('nombre'=>$_POST['Nombre'],'duracion' => $_POST['duracion']);
            $this->db->where('id', $_POST['id']);
            $this->db->update('asignaturas', $form);

            redirect('g_institucion/asignaturas_form/'.$_POST['id']);

        }else{

            $form = array('nombre'=>$_POST['Nombre'],'duracion' => $_POST['duracion']);
            $this->db->insert('asignaturas', $form);

            $nid = $this->db->insert_id();

            redirect('g_institucion/asignaturas_form/'.$nid);

        }



    }
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
