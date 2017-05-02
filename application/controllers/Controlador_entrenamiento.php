<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Controlador_entrenamiento extends CI_Controller
{

	public function index()
	{

			$this->load->view('header');
			$this->load->view('publicar_entrenamiento');
			$this->load->view('footer');

	}

	public function publicar(){

		//Validación de datos ingresados en el formulario

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('duracion', 'duración', 'required');
		$this->form_validation->set_rules('calorias_perdidas', 'calorías pérdidas', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		if($this->form_validation->run()===FALSE){

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']=$this->input->post('nombre');
			$data['duracion']=$this->input->post('duracion');
			$data['calorias_perdidas']=$this->input->post('calorias_perdidas');
			$data['lugar']=$this->input->post('lugar');
			$data['imagen']=$this->input->post('imagen');

			$this->load->view('header');
			$this->load->view('publicar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{

			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			$Entrenamiento1->validar();
			$Entrenamiento1->registrar();

			$data['entrenamiento']="El entrenamiento fue registrado satisfactoriamente";
			$this->load->view('header');
			$this->load->view('entrenamiento', $data);
			$this->load->view('footer');
		}

	}

	public function editar_entrenamiento()
	{
		$this->load->view('header');
		$this->load->view('editar_entrenamiento');
		$this->load->view('footer');
	}

	public function editar(){

		//Validación de datos ingresados en el formulario

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('duracion', 'duración', 'required');
		$this->form_validation->set_rules('calorias_perdidas', 'calorías pérdidas', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		if($this->form_validation->run()===FALSE){

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']=$this->input->post('nombre');
			$data['duracion']=$this->input->post('duracion');
			$data['calorias_perdidas']=$this->input->post('calorias_perdidas');
			$data['lugar']=$this->input->post('lugar');
			$data['imagen']=$this->input->post('imagen');

			$this->load->view('header');
			$this->load->view('editar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{

			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			$Entrenamiento1->validar();
			$Entrenamiento1->actualizar();

			$data['entrenamiento']="El entrenamiento fue actualizado satisfactoriamente";
			$this->load->view('header');
			$this->load->view('entrenamiento', $data);
			$this->load->view('footer');
		}

	}
}

?>