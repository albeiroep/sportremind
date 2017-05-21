<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Controlador_evento_deportivo extends CI_Controller
{
	public function index()
	{
		$this->load->view('header');
		$this->load->view('crear_evento_deportivo');
	}

	//public function datos()
	//{
	//	$this->load->view('ver_datos_proyecto');
	//}

	public function create(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombre_evento', 'nombre_evento', 'required');
		$this->form_validation->set_rules('temperatura_esperada', 'temperatura_esperada', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('direccion_url', 'direccion_url', 'required');
		$this->form_validation->set_rules('categoria', 'categoria', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

		if($this->form_validation->run()===FALSE){

		  $this->load->view('header');		
		  $this->load->view('crear_evento_deportivo');

        }else{
        $datos = array('nombre_evento' => $this->input->post('nombre_evento') ,'temperatura_esperada' => $this->input->post('temperatura_esperada'), 'lugar' => $this->input->post('lugar'),'fecha' => $this->input->post('fecha'),'direccion_url' => $this->input->post('direccion_url'),'categoria' => $this->input->post('categoria'));
      
        $this->load->view('header');
        $this->load->model('Evento_deportivo');
        $eventoDeportivo1=new Evento_deportivo($datos);
      	$eventoDeportivo1->registrar();
      	$data['evento']="El evento deportivo fue registrado satisfactoriamente";	
      	$this->load->view('crear_evento_deportivo',$data);
      	$this->load->view('footer', $data);

	  }
	}
	public function consultar_eventos_deportivos()
	{

	}

	public function cargar_eventos() {
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		$cantidadEventos = $miEvento->traer_cantidad_eventos();
		if($cantidadEventos > 0){
			$misEventos = $miEvento->get_all();
			$data['misEventos'] = $misEventos;
			$this->load->view('header');
			$this->load->view('Consultar_evento_deportivo', $data);
			$this->load->view('footer');
		} else {
			echo "<script language=\"javascript\">alert('No hay eventos registrados en el sistema');</script>";
		}
	}
	
	public function verificarFecha($date) {
		if (preg_match("/[0-9]{4}\/[0-12]{2}\/[0-31]{2}/", $date)) {
			if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
				return true;
				else
					return false;
		} else {
			return false;
		}
	}
	
	public function listar_eventos() {
		$this->form_validation->set_rules('fecha_inicial', 'fecha_inicial', 'required|callback_verificarFecha');
		$this->form_validation->set_rules('fecha_final', 'fecha_final', 'callback_verificarFecha');
		$this->form_validation->set_rules('categoria', 'categoria', 'required|max_length[100]');
		$this->form_validation->set_rules('lugar', 'lugar', 'max_length[100]');
		
		$this->form_validation->set_message('verificarFecha', 'Ingrese una fecha con el formato AAAA/MM/DD');
		$this->form_validation->set_message('required', 'El campo %s debe tener como máximo 100 caracteres');
		
		
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		
		$parametros = [
				'nombre_evento' => $this->input->post('nombre_evento'),
				'temperatura_esperada' => $this->input->post('temperatura_esperada'),
				'fecha_inicial' => $this->input->post('fecha_inicial'),
				'fecha_final' => $this->input->post('fecha_final'),
				'lugar' => $this->input->post('lugar'),
				'categoria' => $this->input->post('categoria')
		];
		
		$misEventos = $miEvento->traer_eventos($parametros);
		if($misEventos != ''){
			$data['misEventos'] = $misEventos;
			$this->load->view('header');
			$this->load->view('Consultar_evento_deportivo', $data);
			$this->load->view('footer');
		} else {
			echo "<script language=\"javascript\">alert('No hay eventos que coincidan con los parámetros de búsqueda proveídos');</script>";
			$this->cargar_eventos();
		}
	}
	
	public function ingresar_comentario(){
		$id = $_GET['itemid'];
		$data['id'] = $id;
		
		$this->load->view('header');
		$this->load->view('Ingresar_comentario', $data);
		$this->load->view('footer');
	}
	
	public function registrar_comentario() {
		$this->form_validation->set_rules('comentario', 'comentario', 'required|max_length[199]');
		
		$this->form_validation->set_message('max_length', 'El comentario debe tener menos de 200 caracteres');
		
		
		$miId = $this->input->post('idEvento');
		$comentario = $this->input->post('comentario');
		$parametros = [
				'idEvento' => $miId,
				'comentario' => $comentario
		];
		
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		$miEvento->insertar_comentario($parametros);
		echo "<script language=\"javascript\">alert('Comentario registrado exitosamente');</script>";
		
		$this->cargar_eventos();
	}
	
	public function guardar_resultados_futbol(){
		$nombre_equipo1 = $this->input->post('nombre_equipo1');
		$nombre_equipo2 = $this->input->post('nombre_equipo2');
		$marcador_equipo1 = $this->input->post('marcador_equipo1');
		$marcador_equipo2 = $this->input->post('marcador_equipo2');
		$idEvento = $this->input->post('idEvento');
		$nombre_usuario = $this->session->userdata('nombre_usuario');
		
		$parametros = [
				'idEvento' => $idEvento,
				'nombre_usuario' => $nombre_usuario,
				'nombre_equipo1' => $nombre_equipo1,
				'nombre_equipo2' => $nombre_equipo2,
				'marcador_equipo1' => $marcador_equipo1,
				'marcador_equipo2' => $marcador_equipo2
		];
		
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		$miEvento->insertar_resultados_futbol($parametros);
		echo "<script language=\"javascript\">alert('Resultados guardados exitosamente');</script>";
		
		$this->cargar_eventos();
	}
	
	public function guardar_resultados_baloncesto(){
		$nombre_equipo1 = $this->input->post('nombre_equipo1');
		$nombre_equipo2 = $this->input->post('nombre_equipo2');
		$marcador_equipo1 = $this->input->post('marcador_equipo1');
		$marcador_equipo2 = $this->input->post('marcador_equipo2');
		$idEvento = $this->input->post('idEvento');
		$nombre_usuario = $this->session->userdata('nombre_usuario');;
		
		$parametros = [
				'idEvento' => $idEvento,
				'nombre_usuario' => $nombre_usuario,
				'nombre_equipo1' => $nombre_equipo1,
				'nombre_equipo2' => $nombre_equipo2,
				'marcador_equipo1' => $marcador_equipo1,
				'marcador_equipo2' => $marcador_equipo2
		];
		
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		$miEvento->insertar_resultados_baloncesto($parametros);
		echo "<script language=\"javascript\">alert('Resultados guardados exitosamente');</script>";
		
		$this->cargar_eventos();
	}
	
	
	public function guardar_resultados_pesas() {
		$peso_levantado = $this->input->post('peso_levantado');
		$idEvento = $this->input->post('idEvento');
		$nombre_usuario = $this->session->userdata('nombre_usuario');;
		
		$parametros = [
				'idEvento' => $idEvento,
				'nombre_usuario' => $nombre_usuario,
				'peso_levantado' => $peso_levantado
		];
		
		$this->load->model('Evento_deportivo');
		$miEvento = new Evento_deportivo();
		$miEvento->insertar_resultados_pesas($parametros);
		echo "<script language=\"javascript\">alert('Resultados guardados exitosamente');</script>";
		
		$this->cargar_eventos();
	}
	
	public function ingresar_resultados() {
		$data['idEvento'] = $_GET['itemid'];
		$this->load->view('header');
		$this->load->view('Seleccionar_deporte', $data);
		$this->load->view('footer');
	}
	
	public function ingresar_resultados_deporte(){
		$data['deporte'] = $this->input->post('deporte');
		$data['idEvento'] = $this->input->post('idEvento');
		$miDeporte = $data['deporte'];
		if($miDeporte == 'Futbol'){
			$this->load->view('header');
			$this->load->view('Resultados_futbol', $data);
			$this->load->view('footer');
		}
		if($miDeporte == 'Baloncesto'){
			$this->load->view('header');
			$this->load->view('Resultados_baloncesto', $data);
			$this->load->view('footer');
		}
		if($miDeporte == 'Pesas'){
			$this->load->view('header');
			$this->load->view('Resultados_pesas', $data);
			$this->load->view('footer');
		}
		
	}
	
	
}

?>