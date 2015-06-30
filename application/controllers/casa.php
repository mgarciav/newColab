<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Casa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		
		$this->load->view('casa_view');

	}
	
	
	private function check_isvalidated(){
		if(! $this->session->userdata('validated')){
			redirect('logTask');
		}
	}
	
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('logTask');
	}

	public function manExp(){
		redirect('home');
	}

	public function manTool(){
		redirect('ui');
	}
	public function manTask(){
		redirect('taskH');
	}
	

 }
 ?>