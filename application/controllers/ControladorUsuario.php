<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ControladorUsuario extends CI_Controller
{

	public function index()
	{
		//Para cargar los nombres de los deportes en la lista desplegable
		$this->load->model('Deporte');
		$data['datos']=$this->Deporte->get_all();

		$this->load->view('Crear_cuenta', $data);
	}

	public function crear(){

		//Validación de datos ingresados en el formulario
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'required');
		$this->form_validation->set_rules('ciudad', 'ciudad', 'required');
		$this->form_validation->set_rules('deporte', 'deporte', 'required');
		$this->form_validation->set_rules('correo', 'correo', 'required|valid_email');
		$this->form_validation->set_rules('nombre_usuario', 'nombre de usuario', 'required');
		$this->form_validation->set_rules('contrasena', 'contraseña', 'required|matches[repetir_contrasena]');
		//$this->form_validation->set_rules('repetir_contrasena', 'repetir contraseña', 'required| match[contrasena]');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 
		$this->form_validation->set_message('valid_email','El campo %s debe ser un correo valido'); 
		$this->form_validation->set_message('matches','El campo %s debe ser igual al campo repetir contraseña');

		//Se carga la librería y se encripta la contraseña
		$this->load->library('encrypt');
		$contraseña = $this->encrypt->encode($this->input->post('contrasena'));
		$repetir_contraseña = $this->encrypt->encode($this->input->post('repetir_contrasena')); 

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		if($this->form_validation->run()===FALSE){

			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();
			$this->load->view('Crear_cuenta', $data);

		}else{
			$datos = array('nombre' => $this->input->post('nombre'), 'apellidos' => $this->input->post('apellidos'), 'ciudad' => $this->input->post('ciudad'), 'deporte' => $this->input->post('deporte'), 'correo' => $this->input->post('correo'), 'nombre_usuario' => $this->input->post('nombre_usuario'), 'contraseña' => $contraseña, 'repetir_contraseña' => $repetir_contraseña);
			
			$this->load->model('Usuario');
			$Usuario1=new Usuario($datos);
			$Usuario1->registrar();
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();
			$data['usuario']="Los datos fueron registrados satisfactoriamente";
			$this->load->view('Crear_cuenta',$data);
		}

	}

}
?> 