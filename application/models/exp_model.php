<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exp_model extends CI_Model{
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

	public function loadTasks($dato){
		$this->db->select('*');
		$this->db->where('id_exp',$dato);
		$consult = $this->db->get('experimentos');
		$protocolo = $consult->row()->prot;

		$this->db->select('*')->from('prottask')->where('id_prot',$protocolo);
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

	public function getNombre($dato){
		$this->db->select('nom_exp');
		$this->db->where('id_exp',$dato);
		$consult = $this->db->get('experimentos');
		$nombre = $consult->row()->nom_exp;
		return $nombre;

	}

	public function getFechaIni($dato){
		$this->db->select('fechaIni');
		$this->db->where('id_exp',$dato);
		$consult = $this->db->get('experimentos');
		$fechaI = $consult->row()->fechaIni;
		$fecha = date("d/m/Y", strtotime($fechaI));
		return $fecha;		
	}

	public function getFechaFin($dato){
		$this->db->select('fechaFin');
		$this->db->where('id_exp',$dato);
		$consult = $this->db->get('experimentos');
		$fechaF = $consult->row()->fechaFin;
		$fecha = date("d/m/Y", strtotime($fechaF));
		return $fecha;		
	}

	public function getDesc($dato){
		$this->db->select('desc');
		$this->db->where('id_exp',$dato);
		$consult = $this->db->get('experimentos');
		$descri = $consult->row()->desc;
		return $descri;		
	}

	public function modOld($dato){
		$query = $this->db->where('id_exp',$dato)->get('experimentos');
		$protUse = $query->row()->prot;
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
		$this->db->where('id_exp',$dato);
		$fechaFormatI = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaIni'));
		$fechaFormatF = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaFin'));
		$newData = array(
				'nom_exp'=> $this->input->post('nomProto'),
				'desc' => $this->input->post('descProto'),
				'fechaIni' => $fechaFormatI->format('Y-m-d'),
				'fechaFin' => $fechaFormatF->format('Y-m-d'),
			);
		$this->db->update('experimentos',$newData);
		return true;

	}

	public function newExp($dato){
		$this->db->insert('protocolo',array('nom_prot' => $this->input->post('nameProto')));
		$this->db->select('id_prot')->where('nom_prot',$this->input->post('nameProto'));
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
		$this->db->where('id_exp',$dato);
		$fechaFormatI = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaIni'));
		$fechaFormatF = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaFin'));
		$newData = array(
				'nom_exp'=> $this->input->post('nomProto'),
				'desc' => $this->input->post('descProto'),
				'fechaIni' => $fechaFormatI->format('Y-m-d'),
				'fechaFin' => $fechaFormatF->format('Y-m-d'),
				'estado' => 'incompleta',
				'dueno_exp' => $this->session->userdata('userid'),
				'prot' => $idProt,
			);
		$this->db->insert('experimentos', $newData);
		$this->db->select('id_exp')->where('nom_exp',$this->input->post('nomProto'));
		$query2 = $this->db->get('experimentos');
		$datoUse = $query2->row()->id_exp;
		$data['id_exp'] = $datoUse;
		$this->session->set_userdata($data,$datoUse);
		return true;
	}

	public function getNameProt($dato){
		$this->db->select('prot');
		$this->db->where('id_exp',$dato);
		$query1 = $this->db->get('experimentos');
		$dato1 = $query1->row()->prot;
		$query2 = $this->db->select('nom_prot')->where('id_prot',$dato1)->get('protocolo');
		$dato2 = $query2->row()->nom_prot;
		return $dato2;
	}

}
?>