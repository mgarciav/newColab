<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tasks_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function getDatos(){
		$this->db->select('*')->from('tasks')->order_by('tipo','desc');
		$query = $this->db->get();
		$taskTemp = array();
		$i = 0;
		foreach ($query ->result() as $row){

			$taskTemp[$i]['id_task'] = $row->id_task;
			$taskTemp[$i]['nom_task'] = $row->nom_task;
			$taskTemp[$i]['desc'] = $row->desc;
			$taskTemp[$i]['tipo'] = $row->tipo;
			$taskTemp[$i]['tiempo'] = $row->tiempo;
			$taskTemp[$i]['foto'] = $row->foto;
			$taskTemp[$i]['link'] = $row->link;
			$i++;
		}

		return $taskTemp;

	}

	public function getNameProt($dato){
		$dato1 = $dato;
		$query2 = $this->db->select('nom_prot')->where('id_prot',$dato1)->get('protocolo');
		$dato2 = $query2->row()->nom_prot;
		return $dato2;
	}

	public function loadTasks($dato){
		$this->db->select('*')->from('prottask')->where('id_prot',$dato);
		$selTask = $this->db->get();
		if($selTask != NULL){
			$arrSelect= array();
			$i = 0;
			foreach ($selTask->result() as $row ){
				$arrSelect[$i]= $row->id_task;
				$i++;
			}
			return $arrSelect;
		}
		else{
			return NULL;
		}
	}

	public function modOld($dato){
		$protUse = $dato;
		$datChecks = $this->input->post('taski');
		$tasksDB = $this->db->get('tasks');
		$checkAll = array();
		foreach( $tasksDB->result() as $row ){
			$checkAll[$row->id_task] = 0;
		}
		for($i=0;$i<count($datChecks);$i++){
			if(array_key_exists($datChecks[$i],$checkAll)){
				$checkAll[$datChecks[$i]]=1;
			}
		}

		$flag = true;
		foreach ($checkAll as $key => $value) {
			if($value == 1){
				$query = $this->db->select('*')->where('id_task',$key)->where('id_prot',$protUse)->get('prottask');
				if($query -> num_rows() == 0){
					$queryIns = array(
						'id_prot' => $protUse,
						'id_task' => $key,
						);
					$this->db->insert('prottask',$queryIns);
					$flag = false;
				}

			}
			else{
				$query = $this->db->select('*')->where('id_task',$key)->where('id_prot',$protUse)->get('prottask');
				if($query -> num_rows() == 1){
					$this->db->where('id_task',$key)->where('id_prot',$protUse)->delete('prottask');
					$flag = false;
				}
			}
		}
		if($flag == false){
			$myvar  = empty($myvar) ? NULL : $myvar;
			foreach ($checkAll as $key => $value) {
				$this->db->where('id_task',$key);
				$this->db->where('id_prot',$protUse);
				$this->db->update('prottask',array('pos'=> $myvar));
			}
		}
		$this->db->where('id_prot',$protUse);
		$newData = array(
				'nom_prot' => $this->input->post('nomProto'),
			);
		$this->db->update('protocolo', $newData); 
		return true;

	}

	public function newProt(){
		$this->db->insert('protocolo',array('nom_prot' => $this->input->post('nomProto')));
		$this->db->select('id_prot')->where('nom_prot',$this->input->post('nomProto'));
		$query = $this->db->get('protocolo');
		$idProt = $query->row()->id_prot;
		$datChecks = $this->input->post('taski');
		$tasksDB = $this->db->get('tasks');
		$checkAll = array();
		foreach( $tasksDB->result() as $row ){
			$checkAll[$row->id_task] = 0;
		}
		for($i=0;$i<count($datChecks);$i++){
			if(array_key_exists($datChecks[$i],$checkAll)){
				$checkAll[$datChecks[$i]]=1;
			}
		}
		foreach ($checkAll as $key => $value) {
			if($value == 1){
				$query = $this->db->select('*')->where('id_task',$key)->where('id_prot',$idProt)->get('prottask');	
				$queryIns = array(
					'id_prot' => $idProt,
					'id_task' => $key,
					);
				$this->db->insert('prottask',$queryIns);
			}
		}
		$this->session->set_flashdata('datito',$idProt);
		return true;
	}

	
}
?>