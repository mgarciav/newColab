<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Sort extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->model('sort_model');
		$var = $this->session->flashdata('datito');
		if($this->sort_model->checkOrden($var)){
			$datosSort = $this->sort_model->cargaAnt($var);
		}
		else{
			$datosSort = $this->sort_model->cargaNueva($var);
			$this->load->view('sort_view',array('datosSort' => $datosSort));
			$datosSort = $this->sort_model->cargaAnt($var);	

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

	

 }
 ?>