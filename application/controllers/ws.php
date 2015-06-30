<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Ws extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->model('ws_model');
		$var = $this->session->flashdata('datito');
		$this->session->keep_flashdata('datito');
		$datosT = $this->ws_model->obtenerTools();
		if($this->ws_model->antiguo($var)){
			$toolCheck = $this->ws_model->getTools($var);
			$datos = array(
				'datosT' => $datosT,
				'toolCheck' => $toolCheck,
				);
			$this->load->view('ws_view', array('datos' => $datos));
		}
		else{
			
			$this->load->view('ws_view1', array('datosT' => $datosT));
		}
		

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
		$this->load->model('ws_model');
		$var = $this->session->flashdata('datito');
		$this->session->keep_flashdata('datito');
		if($this->ws_model->guardoNuevo($var))
			redirect('visible');
	}

	public function saveOld(){
		$this->load->model('ws_model');
		$var = $this->session->flashdata('datito');
		$this->session->keep_flashdata('datito');
		if($this->ws_model->guardoViejo($var))
			redirect('visible');
	}
	

 }
 ?>