<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sort_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function checkOrden($dato){
		$this->db->select('prot')->where('id_exp',$dato);
		$query1 = $this->db->get('experimentos');
		$idProt = $query1->row()->prot;
		$this->db->select('pos')->where('id_prot',$idProt);
		$query2 = $this->db->get('prottask');
		$checkNull = $query2->row()->pos;
		if($checkNull == NULL){
			return false;
		}
		return true;
	}

	public function cargaNueva($dato){
		$this->db->select('prot')->where('id_exp',$dato);
		$query1 = $this->db->get('experimentos');
		$idProt = $query1->row()->prot;
		$this->db->select('*')->where('id_prot',$idProt);
		$query2 = $this->db->get('prottask');
		$arrDatos = array();
		$i = 0;
		$query = NULL;
		foreach ($query2->result() as $row) {
			$arrDatos[$i]['id_task'] = $row->id_task;
			$this->db->select('nom_task')->where('id_task',$row->id_task);
			$query = $this->db->get('tasks');
			$arrDatos[$i]['nom_task']= $query->row()->nom_task;
			$i++;
		}
		return $arrDatos;

	}

	public function cargaAnt($dato){
		$this->db->select('prot')->where('id_exp',$dato);
		$query1 = $this->db->get('experimentos');
		$idProt = $query1->row()->prot;
		$this->db->select('*')->where('id_prot',$idProt)->order_by('pos','desc');
		$query2 = $this->db->get('prottask');
		$arrDatos = array();
		$i = 0;
		$query = NULL;
		foreach ($query2->result() as $row) {
			$arrDatos[$i]['id_task'] = $row->id_task;
			$this->db->select('nom_task')->where('id_task',$row->id_task);
			$query = $this->db->get('tasks');
			$arrDatos[$i]['nom_task']= $query->row()->nom_task;
			$i++;
		}
		return $arrDatos;

	}
}

?>