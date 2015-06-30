<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Uit extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		$this->load->model('uit_model');
		$datosWs = $this->uit_model->cargaDatos();
		$this->load->view('uit_view', array('datosWs' => $datosWs));

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
		$this->load->model('uit_model');
		$this->uit_model->guardarT();
		redirect('ui');
	}


 }
 ?>