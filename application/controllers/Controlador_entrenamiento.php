<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Controlador_entrenamiento extends CI_Controller
{

	private $id;

	public function index()
	{

			$this->load->view('header');
			$this->load->view('publicar_entrenamiento');
			$this->load->view('footer');

	}

	public function publicar_entrenamiento(){

		//Validación de datos ingresados en el formulario

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('duracion', 'duración', 'required');
		$this->form_validation->set_rules('calorias_perdidas', 'calorías pérdidas', 'required');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		$id_usuario=$_GET['itemid'];

		if($this->form_validation->run()===FALSE){

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']=$this->input->post('nombre');
			$data['duracion']=$this->input->post('duracion');
			$data['calorias_perdidas']=$this->input->post('calorias_perdidas');
			$data['fecha']=$this->input->post('fecha');
			$data['lugar']=$this->input->post('lugar');
			$data['imagen']=$this->input->post('imagen');

			$this->load->view('header');
			$this->load->view('publicar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{


			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			$Entrenamiento1->validar();
			if($Entrenamiento1->registrar($id_usuario)){
				$data['entrenamiento']="El entrenamiento fue registrado satisfactoriamente";
			}else{
				$data['entrenamiento']="El entrenamiento no pudo ser registrado";
			}

			$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($id_usuario);
			
			$this->load->view('header');
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer');

		}

	}

	public function consultar_entrenamiento()
	{
		$this->load->model('Usuario');
		$usuario1=new Usuario();
		$id=$usuario1->consultar_id();

		foreach ($id as $ids) {
			$identificacion=$ids->id; 
		}

		$this->load->model('Entrenamiento');
		$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($identificacion);

		$this->load->view('header');
		$this->load->view('consultar_entrenamiento', $data);
		$this->load->view('footer');
	}

	public function editar_entrenamiento()
	{
		$this->load->model('Entrenamiento');
		$data['datos']=$this->Entrenamiento->consultar_entrenamiento();

		$this->load->view('header');
		$this->load->view('editar_entrenamiento', $data);
		$this->load->view('footer');
	}

	public function editar(){

		//Validación de datos ingresados en el formulario

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('duracion', 'duración', 'required');
		$this->form_validation->set_rules('calorias_perdidas', 'calorías pérdidas', 'required');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		$id_entrenamiento=$_GET['itemid'];

		if($this->form_validation->run()===FALSE){

			//Se guardan los datos, para repoblar el formulario
			$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamiento();

			$this->load->view('header');
			$this->load->view('editar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{

			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			$Entrenamiento1->validar();
			if($Entrenamiento1->actualizar($id_entrenamiento)){
				$data['entrenamiento']="El entrenamiento fue actualizado satisfactoriamente";
			}else{
				$data['entrenamiento']="El entrenamiento no pudo ser actualizado";
			}
			
			$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($this->input->post('id_usuario'));

			$this->load->view('header');
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer');
		}

	}

	public function eliminar_entrenamiento()
	{
		$this->load->model('Entrenamiento');
		$Entrenamiento1=new Entrenamiento();
		$Entrenamiento1->eliminar();
		
		$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($_GET['id_usuario']);
		$this->load->view('header');
		$this->load->view('consultar_entrenamiento', $data);
		$this->load->view('footer');
	}
}

?>