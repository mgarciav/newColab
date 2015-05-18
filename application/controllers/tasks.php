<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Tasks extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		$this->load->model('tasks_model');
		$datosTasks = $this->tasks_model->getDatos();
		$var = $this->session->flashdata('datito');
		if(NULL == $var){
			$this->load->view('tasks_view1', array('datosTasks' => $datosTasks));
		}
		else{
			$allExp = array();
			$allExp['taskCheck'] = $this->tasks_model->loadTasks($var);
			$allExp['nameProt'] = $this->tasks_model->getNameProt($var);
			$datos = array(
				'datosTasks' => $datosTasks,
				'allExp' => $allExp,
				'id_prot' => $var,
				);
			$this->session->keep_flashdata('datito');
			$this->load->view('tasks_view2', array('datos' => $datos));	
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

	public function upOld(){
			$this->load->model('tasks_model');
			$var = $this->session->flashdata('datito');
			$this->session->keep_flashdata('datito');
			if($this->tasks_model->modOld($var))
				redirect('sort');
		

	}

	public function saveNew(){
		$this->load->model('tasks_model');
		if($this->tasks_model->newProt())
			redirect('sort');
	}
	
	

 }