<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Exper extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		
		$this->load->model('exper_model');
		if( $this->exper_model->tieneExp() ){
			$datosExp = $this->exper_model->obtenerExp();
			$this->load->view('exper_view', array('datosExp'=> $datosExp));
		}
		else{
		$this->load->view('exper_view2');
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

	public function antiguo(){
		
		$idPedido = $this->input->post('experi');

		$this->session->set_flashdata('datito',$idPedido);
		
		redirect('/exp');
	}

	public function nuevo(){
		redirect('/exp');
	}

 }
 ?>