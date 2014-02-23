<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sugar extends CI_Controller {

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
		function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
	//	$this->load->library('grocery_CRUD');	
	} 
	
	function _output_display($output = null)
	{
	
	$_SESSION['redirect'] = 0;	
		 
	if(isset($_SESSION['session_id'])){
		
		$this->load->view('../../plantillas/header');
		echo $output;
		$this->load->view('../../plantillas/footer');
		
		
	}else{
	
		
		//$this->load->view('../../plantillas/header');
		$this->login_f();
		//$this->load->view('../../plantillas/footer');
		
	}
	}
	
	 
	public function index()
	{

        $this->load->model('sugar_model');

        $this->sugar_model->get_account_list(85452);

    }
	
	public function login(){
	
	$this->load->model('sugar_model');	
	
	$_SESSION['session_id'] = $this->sugar_model->login_sugar($_POST['user'], $_POST['pws']);	
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */