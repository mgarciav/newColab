<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uihn_model extends CI_Model{
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

	public function saveData(){
		$datos = array(
			'nomCont' => $this->input->post('nomC'),
			'idNom'=> $this->input->post('idC'),
			'wsId'=> $this->input->post('getId'),
			);
		$this->db->insert('contenedor',$datos);
	}
	

	
}
?>