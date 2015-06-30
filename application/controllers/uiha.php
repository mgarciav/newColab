<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Uiha extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		
		$this->load->model('uiha_model');
		$datos = array(
			'cont' => $this->uiha_model->getCont(),
			'tools' => $this->uiha_model->getTools(),
			);
		$this->load->view('uiha_view', array('datos' => $datos));

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

	public function savePar(){
		$this->load->model('uiha_model');
		if($this->uiha_model->guardaPar())
			redirect('uih');
	}

	public function getTo(){
		$this->load->model('uiha_model');
		$data = $this->uiha_model->getOpti();
		echo json_encode($data);
		die();	
	}

 }
 ?>