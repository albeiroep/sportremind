<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrenamiento extends CI_Model {

	private $nombre;
	private $duracion;
	private $calorias_perdidas;
	private $lugar;
	private $imagen;

	public function __construct($value = null) {
		parent::__construct();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->duracion = isset($value->duracion)? $value->duracion : null;
				$this->calorias_perdidas = isset($value->calorias_perdidas)? $value->calorias_perdidas : null;
				$this->lugar = isset($value->lugar)? $value->lugar : null;
				$this->imagen = isset($value->imagen)? $value->imagen : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre':
			case 'duracion':
			case 'calorias_perdidas':
			case 'lugar':
			case 'imagen':
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

		if ($this->duracion == null) {
			$errores[] = 'El campo duracion no puede estar vacío';
		}

		if ($this->calorias_perdidas == null) {
			$errores[] = 'El campo calorias_perdidas no puede estar vacío';
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
			'duracion' => $this->duracion,
			'calorias_perdidas' => $this->calorias_perdidas,
			'lugar' => $this->lugar,
			'imagen' => $this->imagen,
		];

		return $this->db->insert('entrenamiento', $data);
	}

	
	public function delete($id){

		$this->db->delete('entrenamiento', array('id' => $id ));

	}
	
	public function actualizar() {
		$this->db->where('correo', $email);
		$this->db->update('usuario', $data);
	}
	
	
}
