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

	
}

?>