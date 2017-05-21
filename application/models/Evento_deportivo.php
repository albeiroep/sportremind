<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_deportivo extends CI_Model {

	private $nombre_evento;
	private $temperatura_esperada;
	private $lugar;
	private $fecha;
	private $direccion_url;
	private $categoria;
	
	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->nombre_evento = isset($value->nombre_evento)? $value->nombre_evento: null;
				$this->temperatura_esperada = isset($value->temperatura_esperada)? $value->temperatura_esperada : null;
				$this->lugar = isset($value->lugar)? $value->lugar: null;
				$this->fecha = isset($value->fecha)? $value->fecha: null;
				$this->direccion_url= isset($value->direccion_url)? $value->direccion_url: null;
				$this->categoria= isset($value->categoria)? $value->categoria: null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre_evento':
			case 'temperatura_esperada':
			case 'lugar':
			case 'fecha':
			case 'direccion_url':
			case 'categoria':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->nombre_evento == null) {
			$errores[] = 'El nombre del evento no puede ser vacío';
		}

		if ($this->temperatura_esperada == null) {
			$errores[] = 'la temperatura esperada no puede ser vacío';
		}

		if ($this->lugar == null) {
			$errores[] = 'lugar no puede ser vacía';
		}
		if ($this->fecha == null) {
			$errores[] = 'la fecha no puede ser vacía';
		}
		if ($this->direccion_url == null) {
			$errores[] = 'la direccion no puede ser vacía';
		}
		if ($this->categoria == null) {
			$errores[] = 'la categoria no puede ser vacía';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'nombre_evento' => $this->nombre_evento,
			'temperatura_esperada' => $this->temperatura_esperada,
			'lugar' => $this->lugar,
			'fecha' => $this->fecha,
			'direccion_url' => $this->direccion_url,
			'categoria' => $this->categoria,
		];

		return $this->db->insert('eventodeportivo', $data);
	}

	public function get_all()
	{
		$this->load->database();
		$query=$this->db->get('eventodeportivo');
		return $query->result();
	}
	
	public function traer_cantidad_eventos(){
		$this->load->database();
		$query=$this->db->get('eventodeportivo');
		return $query->num_rows();
	}
	
	public function traer_eventos($parametros){
		$this->load->database();
		if (is_array($parametros))
			settype($parametros, 'object');
			if($parametros->temperatura_esperada != ''){
				$this->db->where('temperatura_esperada', $parametros->temperatura_esperada);
			}
			if($parametros->nombre_evento != ''){
				$this->db->where('nombre_evento', $parametros->nombre_evento);
			}
			if($parametros->fecha_inicial != '' && $parametros->fecha_final == ''){
				$this->db->where('fecha >= ', $parametros->fecha_inicial);
			} else {
				if($parametros->fecha_inicial != '' && $parametros->fecha_final != ''){
					$this->db->where('fecha >= ', $parametros->fecha_inicial);
					$this->db->where('fecha <= ', $parametros->fecha_final);
				} else {
					if ($parametros->fecha_inicial == '' && $parametros->fecha_final != '') {
						$this->db->where('fecha <= ', $parametros->fecha_final);
					}
				}
			}
			if ($parametros->lugar != '') {
				$this->db->where('lugar ', $parametros->lugar);
			}
			if($parametros->categoria != ''){
				$this->db->where('categoria', $parametros->categoria);
			}
			$query = $this->db->get('eventodeportivo');
			if($query->num_rows() > 0){
				return $query->result();
			} else {
				return '';
			}
			
	}
	
	public function insertar_comentario($parametros){
		return $this->db->insert('eventoComentario', $parametros);
	}
	
	public function insertar_resultados_futbol($parametros){
		$this->load->database();
		return $this->db->insert('resultados_futbol', $parametros);
	}
	
	public function insertar_resultados_baloncesto($parametros){
		$this->load->database();
		return $this->db->insert('resultados_baloncesto', $parametros);
	}
	
	public function insertar_resultados_pesas($parametros) {
		$this->load->database();
		return $this->db->insert('resultados_pesas', $parametros);
	}
}

?>