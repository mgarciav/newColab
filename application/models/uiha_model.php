<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uiha_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function getCont(){
		$this->db->select('*');
		$query = $this->db->get('contenedor');
		$datos = array();
		$i = 0;
		foreach ($query ->result() as $row){

			$datos[$i]['idCont'] = $row->idCont;
			$datos[$i]['nomCont'] = $row->nomCont;
			$i++;
		}

		return $datos;


	}

	public function getTools(){
		$this->db->select('*');
		$query = $this->db->get('tools');
		$datos = array();
		$i = 0;
		foreach ($query ->result() as $row){

			$datos[$i]['nomTool'] = $row->nameTool;
			$datos[$i]['idTool'] = $row->idTool;
			$i++;
		}

		return $datos;
	}

	public function guardaPar(){
		$datos = array(
			'idTool' => $this->input->post('getTool'),
			'idCont' => $this->input->post('getCont'),
			);
		$this->db->insert('conttool',$datos);
		return true;

	}
	
	public function getOpti(){
		$conte = $this->input->post('idCont');
		$this->db->select('wsId')->where('idCont',$conte);
		$query = $this->db->get('contenedor');
		$idSys = $query->row()->wsId;
		$this->db->select('*')->where('wsAsoc',$idSys);
		$query1 = $this->db->get('tools');	
		$datos = array();
		$i = 0;
		foreach ($query1 -> result() as $row) {
			$datos[$i]['idTool'] = $row->idTool;
			$datos[$i]['nameTool'] = $row->nameTool;
			$i++;
		}

		return $datos;
	}
	
}
?>