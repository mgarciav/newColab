<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class newT extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		$this->load->view('newt_view');

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
		$this->load->model('newt_model');
		$taskId = $this->newt_model->graboNuevo();
		$this->session->set_flashdata('idTask',$taskId);
		redirect('taskTool');
	}
 }
 ?>