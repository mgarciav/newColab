<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Exp extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		
		$this->load->model('exp_model');
		$datosTasks = $this->exp_model->getDatos();
		$var = $this->session->userdata('id_exp');
		if(NULL == $var){
			$this->load->view('exp_view1', array('datosTasks' => $datosTasks));
		}
		else{
			$allExp = array();
			$allExp['nom_exp'] = $this->exp_model->getNombre($var);
			$allExp['desc'] = $this->exp_model->getDesc($var);
			$allExp['taskCheck'] = $this->exp_model->loadTasks($var);
			$allExp['fechaIni'] = $this->exp_model->getFechaIni($var);
			$allExp['fechaFin'] = $this->exp_model->getFechaFin($var);
			$allExp['nameProt'] = $this->exp_model->getNameProt($var);
			$datos = array(
				'datosTasks' => $datosTasks,
				'allExp' => $allExp,
				'id_exp' => $var,
				);
			$this->load->view('exp_view2', array('datos' => $datos));	
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

	public function sortOld(){
			$this->load->model('exp_model');
			$var = $this->session->userdata('id_exp');
			if($this->exp_model->modOld($var))
				redirect('sort');
	}
	public function sortNew(){
		$this->load->model('exp_model');
		$var = $this->session->userdata('id_exp');
		if($this->exp_model->newExp($var))
			redirect('sort');
	}

 }
 ?>