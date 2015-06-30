<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newt_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function graboNuevo(){
		if($this->input->post('autoT')){
			$auto = 1;
		}
		else{
			$auto = 0;
		}
		$data = array(
			'nom_task' => $this->input->post('nomT'),
			'desc' => $this->input->post('descT'),
			'tipo' => $this->input->post('typeT'),
			'foto' => $this->input->post('imgT'),
			'link' => $this->input->post('linkT'),
			'tiempo' => $this->input->post('timeT'),
			'auto' => $auto,
			);
		$this->db->insert('tasks', $data);
		$this->db->select('id_task')->where('nom_task', $this->input->post('nomT'));
		$query = $this->db->get('tasks');
		$dato = $query->row()->id_task;
		return $dato;
	}
}
?>