<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class UiT_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function cargaDatos(){
		$this->db->select('*');
		$query = $this->db->get('workshop');
		$datos = array();
		$i = 0;
		foreach ($query ->result() as $row){

			$datos[$i]['nomWs'] = $row->nom_ws;
			$datos[$i]['idWs'] = $row->id_ws;
			$i++;
		}

		return $datos;


	}

	public function guardarT(){
		$idWs = $this->input->post('getId'); 
		$datos = array(
			'nameTool' =>$this->input->post('nomT'),
			'nameId' => $this->input->post('idT'),
			'wsAsoc' =>$idWs,
			);
		$this->db->insert('tools', $datos);


	}

	

	
}
?>