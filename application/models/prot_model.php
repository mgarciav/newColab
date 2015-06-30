<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Prot_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function getDatos(){
		$this->db->select('*');
		$query = $this->db->get('protocolo');
		$protTemp = array();
		$i = 0;
		foreach ($query ->result() as $row){

			$protTemp[$i]['id'] = $row->id_prot;
			$protTemp[$i]['nombre'] = $row->nom_prot;

			$i++;
		}

		return $protTemp;
	}
	
	public function getProto($data){
		$this->db->where('prot',$data);
		$query = $this->db->get('experimentos');
		if($query->num_rows() > 0){
			$this->db->select('nom_prot');
			$this->db->where('id_prot',$data);
			$query2 = $this->db->get('protocolo');
			foreach ($query2->result() as $row){
   				$nombre = $row->nom_prot;
			}
			$this->db->insert('protocolo',array('nom_prot' => $nombre));
			$this->db->select('id_prot')->where('nom_prot',$nombre);
			$query3 = $this->db->get('protocolo');
			foreach ($query3->result() as $row){
   				if($row->id_prot != $data){
   					$idNew = $row->id_prot;
   				}
			}
			$this->db->select('id_task');
			$this->db->where('id_prot',$data);
			$query4 = $this->db->get('prottask');
			foreach ($query4->result() as $row){
   				$insert = array(
   					'id_prot' => $idNew,
   					'id_task' => $row->id_task,
   					);
   				$this->db->insert('prottask',$insert);
			}

			return $idNew;
		}
		else{
			return $data;
		}
	}
}
?>