<?php
class CuentaModel extends CI_Model{

	public function login($name,$pass){
		$this->db->select('nombre_usuario,contraseña');
		$this->db->from('usuario');
		$this->db->where('nombre_usuario',$name);
		$this->db->where('contraseña',$pass);

		$query=$this->db->get();

		if($query->num_rows() ==1){
			return true;
		}else{
			return false;
		}


	}
}
?>