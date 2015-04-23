<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
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

	public function loadExp($dato){
		$this->db->select('tasks');
		$this->db->where('id_exp',$dato);

		$consult = $this->db->get('experimentos');
		$tareas = $consult->row()->tasks;

		return $tareas;

	}
}
?>