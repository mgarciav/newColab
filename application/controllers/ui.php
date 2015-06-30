<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Ui extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		
		$this->load->view('ui_view');

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

	public function uiws(){
		redirect('/uiws');
	}

	public function uit(){
		redirect('/uit');
	}

	public function uih(){
		redirect('/uih');
	}

	public function casita(){
		redirect('/casa');
	}

 }
 ?>