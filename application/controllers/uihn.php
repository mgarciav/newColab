	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Uihn extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		
		$this->load->model('uihn_model');
		$datosWs = $this->uihn_model->cargaDatos();
		$this->load->view('uihn_view', array('datosWs' => $datosWs));

	}
	
	
	private function check_isvalidated(){
		if(! $this->session->userdata('validated')){
			redirect('login');
		}
	}
	
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function saveNew(){
		$this->load->model('uihn_model');
		$this->uihn_model->saveData();
		redirect('ui');
	}


 }
 ?>