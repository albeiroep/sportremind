<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio1 extends CI_Controller {

	public function index(){
	
		if ($this->session->userdata('conectado') == TRUE ){
			$this->load->view('vistalinks');
		}else{
			
			$this->load->view('header');
			$nombre['nombre1']='';
			$this->load->view('vistaEjercicio1',$nombre);
		}

	}

	public function login(){

		if ($this->session->userdata('conectado') == TRUE ){
			$this->load->view('vistalinks');
		}else{

		$datos['empleados']= array('empleado1' => array('nombre'=>'Juan', 'contr' => '123asd1', 'id' => 3), 'empleado2' => array( 'nombre'=>'Jose', 'contr' => '123asd2', 'id' => 4) ,'empleado3' => array( 'nombre'=>'Simone', 'contr' => '123asd3', 'id' => 5) ,'empleado4' => array( 'nombre'=>'Julio', 'contr' => '123asd4', 'id' => 6) ,'empleado5' => array( 'nombre'=>'Maria', 'contr' => '123asd5', 'id' => 7));

		$validador=FALSE;
		foreach ($datos['empleados'] as $item) {
			if ($this->input->post('nom') == $item['nombre'] && $this->input->post('pass') == $item['contr'] ) {
				$validador=TRUE;
				$identificacion = $item['id'];
			}
		}

		$nombre['nombre1']=$this->input->post('nom');

		if ($validador){
			 	$nuevos_datos = array(
				'username' => $this->input->post('nom'),
				'password' => $this->input->post('pass'),
				'identificador' => $identificacion,
				'conectado' => TRUE );
			$this->session->set_userdata($nuevos_datos);
			$this->load->view('vistalinks');
		}else{

			$this->load->view('vistaEjercicio1',$nombre);
			$this->load->view('vistaerror');
		}
		}
	}
	public function logoff(){

		session_destroy();
		$nombre['nombre1']='';
		$this->load->view('vistaEjercicio1',$nombre);

	}
}
