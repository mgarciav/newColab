<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Prot extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->model('prot_model');
		$datosProt = $this->prot_model->getDatos();
		$this->load->view('prot_view', array('datosProt' => $datosProt));

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
		$idPedido = $this->input->post('proti');
		$this->session->set_flashdata('datito',$idPedido);
		redirect('/tasks');
		

	}

	public function nuevo(){
		redirect('/tasks');
	}
	
	

 }
 ?>