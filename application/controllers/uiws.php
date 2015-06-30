<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Uiws extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		$this->load->view('uiws_view');

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
		$this->load->model('uiws_model');
		$this->uiws_model->graboNuevo();
		redirect('ui');
	}
 }
 ?>