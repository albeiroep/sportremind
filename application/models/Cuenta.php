<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	private $nombre_usuario;
	private $contraseña;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nombre_usuario = isset($value->nombre_usuario)? $value->nombre_usuario : null;
				$this->contraseña = isset($value->contraseña)? $value->contraseña : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre_usuario':
			case 'contraseña':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];

		if ($this->nombre_usuario == null) {
			$errores[] = 'El campo nombre de usuario no puede estar vacío';
		}

		if ($this->contraseña == null) {
			$errores[] = 'El campo contraseña no puede estar vacío';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'nombre_usuario' => $this->nombre_usuario,
			'contraseña' => $this->contraseña,
		];

		return $this->db->insert('cuenta', $data);
		//$data['error']=$this->db->error();
		//if($data['error'] = $this->db->_error_message());
		//return $data;
	}
	
}
