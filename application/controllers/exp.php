<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Exp extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		
		$this->load->model('exp_model');
		$datosTasks = $this->exp_model->getDatos();
		$var = $this->session->flashdata('datito');
		if(NULL == $var){
			$this->load->view('exp_view1', array('datosTasks' => $datosTasks));
		}
		else{
			$this->exp_model->loadExp($var);
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