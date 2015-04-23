<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function tieneExp(){
		$idExp = $this->session->userdata('userid');

		$this->db->where('dueno_exp',$idExp);

		$consulta = $this->db->get('experimentos');

		if($consulta->num_rows() >0){
		
		return true;
		}
		return false;

	}

	public function obtenerExp(){
		$idExp = $this->session->userdata('userid');

		$this->db->where('dueno_exp',$idExp);

		$consulta = $this->db->get('experimentos');

		$expTemp = array();
		$i = 0;
		foreach ($consulta ->result() as $row){

			$expTemp[$i]['id_exp'] = $row->id_exp;
			$expTemp[$i]['nom_exp'] = $row->nom_exp;
			$expTemp[$i]['desc'] = $row->desc;
			$expTemp[$i]['fechas'] = $row->fechas;
			$expTemp[$i]['investis'] = $row->investis;
			$expTemp[$i]['prot'] = $row->prot;
			$expTemp[$i]['dueno_exp'] = $row->dueno_exp;
			$expTemp[$i]['estado'] = $row->estado;
			$i++;
		}

		return $expTemp;



		


	}
	
}
?>