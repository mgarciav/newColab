<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uiws_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function graboNuevo(){
		$datos= array(
			'nom_ws' => $this->input->post('nomWs'),
			'nom_id' => $this->input->post('idWs'),
			);
		$this->db->insert('workshop', $datos);

	}

	
}
?>