<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eliminar_cuenta extends CI_Controller {

	public $mensaje='';

	public function index()
	{
		$this->load->model('Usuario');
	
		$this->load->view('header');
		$this->load->view('Eliminar_cuenta');
		$this->load->view('footer');
	}

	public function pregunta_eliminar()
	{
		$this->load->model('Usuario');


		if ($this->input->post('motivo') == '' ) {
			
			$this->load->view('header');
			$this->load->view('Error');
			$this->load->view('Eliminar_cuenta');
			$this->load->view('footer');

		}else{

		$mensaje = $this->input->post('motivo');
		$this->Usuario->agregar_motivo($mensaje);
		
		$this->load->view('header');
		$this->load->view('pregunta');
		$this->load->view('footer');
		}
	}

	public function eliminar()
	{
		
		$this->load->model('Usuario');

		$mensaje = $this->input->post('motivo');
		$this->Usuario->delete($this->session->userdata('identificador'));
		

		session_destroy();
		$this->load->view('header');
		$nombre['nombre1']='';
		$this->load->view('vistaEjercicio1',$nombre);
		$this->load->view('footer');


	}
}