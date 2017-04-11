<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deporte extends CI_Model {

	public function get_all()
	{
		$this->load->database();
		$query=$this->db->get('deporte');
		return $query->result();
	}
	
}
