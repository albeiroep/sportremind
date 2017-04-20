<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	private $nombre;
	private $apellidos;
	private $deporte;
	private $ciudad;
	private $nombre_usuario;
	private $correo;
	private $contraseña;	

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->apellidos = isset($value->apellidos)? $value->apellidos : null;
				$this->deporte = isset($value->deporte)? $value->deporte : null;
				$this->ciudad = isset($value->ciudad)? $value->ciudad : null;
				$this->nombre_usuario = isset($value->nombre_usuario)? $value->nombre_usuario : null;
				$this->correo = isset($value->correo)? $value->correo : null;
				$this->contraseña = isset($value->contraseña)? $value->contraseña : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre':
			case 'apellidos':
			case 'deporte':
			case 'ciudad':
			case 'nombre_usuario':
			case 'correo':
			case 'contraseña':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];

		if ($this->nombre == null) {
			$errores[] = 'El campo nombre no puede ser vacío';
		}

		if ($this->apellidos == null) {
			$errores[] = 'El campo apellidos no puede estar vacío';
		}

		if ($this->deporte == null) {
			$errores[] = 'El campo deporte no puede estar vacío';
		}

		if ($this->ciudad == null) {
			$errores[] = 'El campo ciudad no puede estar vacío';
		}

		if ($this->correo == null) {
			$errores[] = 'El campo correo electrónico no puede estar vacío';
		}

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
			'nombre' => $this->nombre,
			'apellidos' => $this->apellidos,
			'deporte' => $this->deporte,
			'ciudad' => $this->ciudad,
			'correo' => $this->correo,
			'nombre_usuario' => $this->nombre_usuario,
			'contraseña' => $this->contraseña,
		];

		return $this->db->insert('usuario', $data);
		//$data['error']=$this->db->error();
		//if($data['error'] = $this->db->_error_message());
		//return $data;
	}
	
	public function delete($id){

		$this->load->database();
		$this->db->delete('usuario', array('id' => $id ));

	}

	public function agregar_motivo($mensaje){

		$this->load->database();
		$this->db->insert('motivos', array('motivo' => $mensaje));

	}
}
