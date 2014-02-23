<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sugar_Model  extends CI_Model  {
	protected $primary_key = null;
	protected $table_name = null;
	protected $relation = array();
	protected $relation_n_n = array();
	protected $primary_keys = array();
    var $response = -1;
    var $options = array(
        "location" => 'http://www.pixelweb.com.co/network/sugar/soap.php',
        "uri" => 'http://www.sugarcrm.com/sugarcrm',
        "trace" => 1
    );

    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
	
	}
	
	public function login_sugar($usuario='', $password=''){
		


//user authentication array
$user_auth = array(
"user_name" => $usuario,
"password" => MD5($password),
"version" => '.01'
);
 
// connect to soap server
$client = new SoapClient(NULL, $this->options);
 
// Login to SugarCRM
$this->response = $client->login($user_auth,'test');


	
		
if($this->response->id != -1){
	echo "ok";
}else{
	echo "error";
} 

return $this->response->id;
}


    public function get_account_list(){

        if(isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1){

            echo "Correcto obteniendo contactos: <br>";

            // connect to soap server
            $client = new SoapClient(NULL, $this->options);

            // Login to traer contactos demo
            $result = $client->get_entry_list(
                $_SESSION['session_id'],
                'Accounts',
                '',
                'accounts.name asc',
                0,
                array(
                    'id',
                    'name'
                ),
                0,
                false
            );

            $data_result = array();

            foreach($result->entry_list as $row){

                array_push($data_result,array(
                    'id'=> $row->name_value_list[0]->value,
                    'nombre' => $row->name_value_list[1]->value));

            }

            print_r($data_result);

        }else{

            echo "necesita loguearse<br>";
        }


    }

	public function get_contact_list($account_id){

        if(isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1){

            echo "Correcto obteniendo contactos: <br>";

            // connect to soap server
            $client = new SoapClient(NULL, $this->options);

            // Login to traer contactos demo
            $result = $client->get_entry_list(
                $_SESSION['session_id'],
                'Contacts',
                '',
                'contacts.last_name asc',
                0,
                array(
                    'id',
                    'first_name',
                    'last_name',
                    'account_name',
                    'account_id',
                    'email1',
                    'phone_work',
                ),
                0,
                false
            );

           $data_result = array();

            foreach($result->entry_list as $row){

                 array_push($data_result,array(
                    'id'=> $row->name_value_list[0]->value,
                    'nombres' => $row->name_value_list[1]->value,
                    'apellidos' => $row->name_value_list[2]->value,
                    'telefono'=>$row->name_value_list[3]->value,
                    'email'=>$row->name_value_list[4]->value,
                    'account_name'=>$row->name_value_list[5]->value,
                    'account_id' =>$row->name_value_list[6]->value));

            }



        }else{

            echo "necesita loguearse<br>";
        }


    }
	
}

