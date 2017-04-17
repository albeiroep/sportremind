<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ControladorUsuario extends CI_Controller
{

	public function index()
	{

		//Se guardan los datos, para repoblar el formulario
			$data['nombre']='';
			$data['apellidos']='';
			$data['ciudad']='';
			$data['deporte1']='';
			$data['correo']='';
			$data['nombre_usuario']='';
			$data['contraseña']='';
			$data['repetir_contraseña']='';

		//Para cargar los nombres de los deportes en la lista desplegable
		$this->load->model('Deporte');
		$data['datos']=$this->Deporte->get_all();

		$this->load->view('header');
		$this->load->view('Crear_cuenta', $data);
		$this->load->view('footer');
	}

	public function crear(){

		//Validación de datos ingresados en el formulario
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('apellidos', 'apellidos', 'required');
		$this->form_validation->set_rules('ciudad', 'ciudad', 'required');
		$this->form_validation->set_rules('deporte', 'deporte', 'required');
		$this->form_validation->set_rules('correo', 'correo', 'required|valid_email|is_unique[usuario.correo]');
		$this->form_validation->set_rules('nombre_usuario', 'nombre de usuario', 'required|is_unique[usuario.nombre_usuario]');
		$this->form_validation->set_rules('contrasena', 'contraseña', 'required|min_length[8]|callback_is_password_strong');
		$this->form_validation->set_rules('repetir_contrasena', 'repetir contraseña', 'required|matches[contrasena]');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 
		$this->form_validation->set_message('valid_email','El campo %s debe ser un correo valido'); 
		$this->form_validation->set_message('matches','El campo %s debe ser igual al campo repetir contraseña');
		$this->form_validation->set_message('is_unique','El %s ingresado ya lo tiene otro usuario');
		$this->form_validation->set_message('callback_is_password_strong','La %s no tiene la complejidad requerida');

		//Se carga la librería y se encripta la contraseña
		$this->load->library('encrypt');
		$contraseña = $this->encrypt->encode($this->input->post('contrasena'));

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		if($this->form_validation->run()===FALSE){

			//Se obtienen los nombres de los deportes que hay en la base de datos
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']=$this->input->post('nombre');
			$data['apellidos']=$this->input->post('apellidos');
			$data['ciudad']=$this->input->post('ciudad');
			$data['deporte1']=$this->input->post('deporte');
			$data['correo']=$this->input->post('correo');
			$data['nombre_usuario']=$this->input->post('nombre_usuario');
			$data['contraseña']=$this->input->post('contrasena');
			$data['repetir_contraseña']=$this->input->post('repetir_contrasena');

			$this->load->view('Crear_cuenta', $data);

		}else{
			$datos = array('nombre' => $this->input->post('nombre'), 'apellidos' => $this->input->post('apellidos'), 'ciudad' => $this->input->post('ciudad'), 'deporte' => $this->input->post('deporte'), 'correo' => $this->input->post('correo'), 'nombre_usuario' => $this->input->post('nombre_usuario'), 'contraseña' => $contraseña);
			
			$this->load->model('Usuario');
			$Usuario1=new Usuario($datos);
			$Usuario1->validar();
			$Usuario1->registrar();
			
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']='';
			$data['apellidos']='';
			$data['ciudad']='';
			$data['deporte1']='';
			$data['correo']='';
			$data['nombre_usuario']='';
			$data['contraseña']='';
			$data['repetir_contraseña']='';

			$data['usuario']="Los datos fueron registrados satisfactoriamente";
			$this->load->view('Crear_cuenta',$data);
		}

	}

	//Función utilizada para comprobar la complejidad de la contraseña ingresada por el usuario
	public function is_password_strong($password)
	{
   		if (preg_match('#[0-9]#', $password) && preg_match('#[a-z]#', $password) && preg_match('/(?=[@#%&*]|-|_)/', $password) && preg_match('#[A-Z]#', $password)){
     	return TRUE;
   	}
   	return FALSE;
	}


}
?> 