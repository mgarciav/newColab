<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Uih extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}
	
	public function index(){
		

		$this->load->view('uih_view');

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

	public function nuevo(){
		redirect('uihn');
	}

	public function addH(){
		redirect('uiha');
	}
 }
 ?>