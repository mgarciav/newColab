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
	
}
?>