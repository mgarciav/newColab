<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class  Tt_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function getDatos(){
		$this->db->select('*')->order_by('idCont','asc');
		$query = $this->db->get('contenedor');
		$i = 0;
		$protTool = array();
		foreach ($query ->result() as $row){
			$this->db->select('*')->where('idCont', $row->idCont);
			$query1 = $this->db->get('conttool');
			foreach( $query1->result() as $row1){
				$this->db->select('*')->where('idTool', $row1->idTool);
				$query2 = $this->db->get('tools');
				foreach ($query2->result() as $value) {
				
					$protTool[$i]['nameTool'] = $value->nameTool;
					$protTool[$i]['idTool'] = $value->idTool;
					$protTool[$i]['cont'] = $row->nomCont;
					$i++;
				}
				
			}
			
		}
		
		

		return $protTool;
	}

	public function saveNewT($dato){
		echo var_dump($this->input->post('tooli'));
		echo var_dump($this->input->post('visi'));
	}
	
	
}
?>