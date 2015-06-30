<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function obtenerTools(){
		$this->db->select('*')->from('tools')->order_by('wsAsoc','asc');
		$query = $this->db->get();
		$toolTemp = array();
		$i=0;
		foreach ($query ->result() as $row){

			$toolTemp[$i]['idTool'] = $row->idTool;
			$toolTemp[$i]['nameTool'] = $row->nameTool;
			$toolTemp[$i]['nameId'] = $row->nameId;
			$this->db->select('nom_ws')->from('workshop')->where('id_ws', $row->wsAsoc);
			$query1 = $this->db->get();
			$nombre = $query1->row()->nom_ws;
			$toolTemp[$i]['nameWs'] = $nombre;
			$i++;
		}

		return $toolTemp;
	}

	public function antiguo($data){
		$this->db->select('*')->from('experimentos')->where('id_exp',$data);
		$query = $this->db->get();
		$idProt = $query->row()->prot;
		$this->db->select('*')->from('prottool')->where('id_exp',$data)->where('id_prot',$idProt);
		$query1 = $this->db->get();
		if($query1->num_rows() > 0){
			return true;
		}
		return false;

	}

	public function guardoNuevo($dato){
		$this->db->select('prot')->where('id_exp',$dato)->from('experimentos');
		$query = $this->db->get();
		$idProt = $query->row()->prot;
		$datChecks = $this->input->post('tooli');
		$toolsDB = $this->db->get('tools');
		$this->db->select('id_task')->from('prottask')->where('id_prot',$idProt);
		$tasks = $this->db->get();
		foreach( $toolsDB->result() as $row ){
			$checkAll[$row->idTool] = 0;
		}
		for($i=0;$i<count($datChecks);$i++){
			if(array_key_exists($datChecks[$i],$checkAll)){
				$checkAll[$datChecks[$i]]=1;
			}
		}
		foreach ($checkAll as $key => $value) {
			if($value == 1){
				foreach( $tasks->result() as $row ){
					$queryIns = array(
						'id_prot' => $idProt,
						'id_tool' => $key,
						'id_exp' => $dato,
						'step' => $row->id_task,
						);
					$this->db->insert('prottool',$queryIns);
				}
			}
		}

		return true;
	}

	public function getTools($data){
		$this->db->select('id_tool')->where('id_exp',$data);
		$query = $this->db->get('prottool');
		$arrSelect = array();
		$i=0;
		foreach($query -> result() as $row){
			$arrSelect[$i] = $row->id_tool;
			$i++;
		}

		return $arrSelect;
	}

	public function guardoViejo($data){
		$this->db->select('prot')->where('id_exp',$data)->from('experimentos');
		$query = $this->db->get();
		$idProt = $query->row()->prot;
		$datChecks = $this->input->post('tooli');
		$toolsDB = $this->db->get('tools');
		$this->db->select('id_task')->from('prottask')->where('id_prot',$idProt);
		$tasks = $this->db->get();
		foreach( $toolsDB->result() as $row ){
			$checkAll[$row->idTool] = 0;
		}
		for($i=0;$i<count($datChecks);$i++){
			if(array_key_exists($datChecks[$i],$checkAll)){
				$checkAll[$datChecks[$i]]=1;
			}
		}
		$flag = true;
		foreach ($checkAll as $key => $value) {
			if($value == 1){
				foreach( $tasks->result() as $row ){
				$query = $this->db->select('*')->where('step',$key)->where('id_prot',$idProt)->where('id_exp',$data)->where('step',$row->id_task)->get('prottool');
				if($query -> num_rows() == 0){
						$queryIns = array(
							'id_prot' => $idProt,
							'id_tool' => $key,
							'id_exp' => $data,
							'step' => $row->id_task
							);
						$this->db->insert('prottool',$queryIns);
						$flag = false;
					}
				}

			}
			else{
				foreach( $tasks->result() as $row ){
				$query = $this->db->select('*')->where('id_tool',$key)->where('step',$row->id_task)->where('id_prot',$idProt)->where('id_exp',$data)->get('prottool');
				if($query -> num_rows() == 1){
						$this->db->where('id_tool',$key)->where('id_prot',$idProt)->where('step',$row->id_task)->where('id_exp',$data)->delete('prottool');
						$flag = false;
					}
				}
			}
		}
		if($flag == false){
			foreach( $tasks->result() as $row ){
			$myvar  = empty($myvar) ? NULL : $myvar;
			foreach ($checkAll as $key => $value) {
				$this->db->where('id_tool',$key);
				$this->db->where('step',$row->id_task);
				$this->db->where('id_prot',$idProt);
				$this->db->where('id_exp',$data);
				$this->db->update('prottool',array('activo'=> $myvar));
			}
		}
	}
		return true;
	}



}
?>