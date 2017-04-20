<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ControladorUsuario extends CI_Controller
{
	public $mensaje='';

	public function index()
	{

		//$this->load->library('session');

		if ($this->session->userdata('conectado') == TRUE ){
			$this->load->view('inicio');

		}else{

			//Para cargar los nombres de los deportes en la lista desplegable
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer');

		}
	}

	public function crear(){

		//Validación de datos ingresados en el formulario

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
		//$this->load->library('encrypt');
		//$contraseña = $this->encrypt->encode($this->input->post('contrasena'));

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		if($this->form_validation->run()===FALSE){

			//Para cargar los nombres de los deportes en la lista desplegable
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

			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer', $data);

		}else{
			$datos = array('nombre' => $this->input->post('nombre'), 'apellidos' => $this->input->post('apellidos'), 'ciudad' => $this->input->post('ciudad'), 'deporte' => $this->input->post('deporte'), 'correo' => $this->input->post('correo'), 'nombre_usuario' => $this->input->post('nombre_usuario'), 'contraseña' => $this->input->post('contrasena'));
			
			$this->load->model('Usuario');
			$Usuario1=new Usuario($datos);
			$Usuario1->validar();
			$Usuario1->registrar();
			
			//Para cargar los nombres de los deportes en la lista desplegable
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			$data['usuario']="El usuario fue registrado satisfactoriamente";
			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer');
		}

	}

	public function checklogin(){

		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_verifyUser');

		$this->form_validation->set_message('verifyUser', 'Nombre usuario o contraseña es incorrecto');
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 


		if($this->form_validation->run() ==false){

			//Para cargar los nombres de los deportes en la lista desplegable
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer');

		}else{
			$nuevos_datos = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'identificador' => $this->input->post('username'),
				'conectado' => TRUE );

			//$this->load->library('session');
			$this->session->set_userdata($nuevos_datos);

			$this->load->view('header');
			$this->load->view('inicio');
			$this->load->view('footer');
		}
	}

	public function verifyUser(){
		$name= $this->input->post('username');
		$pass= $this->input->post('password');

		$this->load->model('Usuario');
		$usuario1=new Usuario();
		if($usuario1->login($name,$pass)){
			return true;

		}else{
			return false;

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

	public function vistaEliminar()
	{
		$this->load->model('Usuario');
	
		$this->load->view('header');
		$this->load->view('eliminar_cuenta');
		$this->load->view('footer');
	}

	public function pregunta_eliminar()
	{
		$this->load->model('Usuario');


		if ($this->input->post('motivo') == '' ) {
			
			$this->load->view('header');
			$data['mensaje']="Error por favor ingresar el motivo";
			$this->load->view('eliminar_cuenta', $data);
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
		//$this->load->library('session');
		$this->Usuario->delete($this->session->userdata('identificador'));

		session_destroy();

		//Para cargar los nombres de los deportes en la lista desplegable
		$this->load->model('Deporte');
		$data['datos']=$this->Deporte->get_all();

		$data['mensaje']="Su cuenta ha sido eliminada satisfactoriamente";

		$this->load->view('header');
		$this->load->view('ingresar', $data);
		$this->load->view('footer');


	}

	public function logoff(){
		//$this->load->library('session');
		session_destroy();

		//Para cargar los nombres de los deportes en la lista desplegable
		$this->load->model('Deporte');
		$data['datos']=$this->Deporte->get_all();

		$this->load->view('header');
		$this->load->view('Ingresar',$data);
		$this->load->view('footer');

	}

	public function login(){

		$this->load->view('header');
		$this->load->view('inicio');
		$this->load->view('footer');

	}

}
?> 