<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Tasktool extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->model('tt_model');
		$arrDatos = $this->tt_model->getDatos();
		$this->load->view('tt_view', array('arrDatos' => $arrDatos));

	}
	
	
	private function check_isvalidated(){
		if(! $this->session->userdata('validated')){
			redirect('login');
		}
	}

	public function save(){
		$this->load->model('tt_model');
		$var = $this->session->flashdata('idTask');
		if($this->tt_model->saveNewT($var))
			redirect('casa');
	}
	
	
 }
 ?>