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
	private $tipo_usuario;	

	public function __construct($value = null) {
		parent::__construct();
		
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
				$this->tipo_usuario='Deportista';
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

	public function traer_usuarios($nom_Usuario){

		$this->db->select('nombre_usuario,,nombre, apellidos,id');
		$this->db->from('usuario');
		$this->db->where('nombre_usuario',$nom_Usuario);

		$query=$this->db->get();

		return $query->result();
	}

		public function datos_usuario($id){

		$this->db->select('nombre_usuario');
		$this->db->from('usuario');
		$this->db->where('id',$id);

		$query=$this->db->get();

		return $query->result();
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
			'tipo_usuario' => $this->tipo_usuario,
		];

		return $this->db->insert('usuario', $data);
	}

	public function login(){
		$this->db->select('nombre_usuario,contraseña');
		$this->db->from('usuario');
		$this->db->where('nombre_usuario',$this->nombre_usuario);
		$this->db->where('contraseña',$this->contraseña);

		$query=$this->db->get();

		if($query->num_rows() ==1){
			return true;
		}else{
			return false;
		}
	}

	public function todos_datos_usuario($usuario){
		$this->db->select('id');
		$query = $this->db->get_where('usuario', ['nombre_usuario' => $usuario]);
		return $query->result();
	}

	public function consultar_id()
	{
		$this->db->select('id');
		$query = $this->db->get_where('usuario', ['nombre_usuario' => $_GET['itemid']]);

		return $query->result();
	}

	public function consultar_tipo_usuario($nombre_usuario)
	{
		$this->db->select('tipo_usuario');
		$query = $this->db->get_where('usuario', ['nombre_usuario' => $nombre_usuario]);

		return $query->result();
	}

	public function actualizar_Usuario($data){
		if($this->db->update('usuario', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function delete($id){

		$this->db->delete('usuario', array('nombre_usuario' => $id ));

	}

	public function agregar_motivo($mensaje){

		$this->db->insert('motivos', array('motivos' => $mensaje));

	}
	
	public function actualizarUsuario($data, $email) {
		$this->db->where('correo', $email);
		$this->db->update('usuario', $data);
	}
	
	public function update_user($data, $email) {
		$this->db->where('correo', $email);
		$this->db->update('usuario', $data);
	}
	
	
	public function does_email_exist($email) {
		$this->db->where('correo', $email);
		$this->db->from('usuario');
		$num_res = $this->db->count_all_results();
		if ($num_res == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function does_code_match($code, $email) {
		$this->db->where('correo', $email);
		$this->db->where('olvidoContrasenia', $code);
		$this->db->from('usuario');
		$num_res = $this->db->count_all_results();
		
		if ($num_res == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
