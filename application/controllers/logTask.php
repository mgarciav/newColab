<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogTask extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL){
		
		$data['msg'] = $msg;
		$this->load->view('nt_view', $data);
	}
	
	public function process(){
		// Load the model
		$this->load->model('nt_model');
		// Validate the user can login
		$result = $this->nt_model->validate();
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show them login page again
			$msg = '<font color=red>Invalid username and/or password.</font><br />';
			$this->index($msg);
		}
		else{
			// If user did validate, 
			// Send them to members area
			redirect('/taskH');
		}		
	}
}
?>