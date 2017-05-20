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

		if ($this->session->userdata('conectado') == TRUE ){

			$this->load->model('Usuario');
			$Usuario1=new Usuario();
			$tipo_u=$Usuario1->consultar_tipo_usuario($this->session->userdata('nombre_usuario'));

			foreach ($tipo_u as $tipos) {
				$tipo=$tipos->tipo_usuario; 
			}

			if ($tipo=='Administrador') {
				$this->load->view('header');
				$this->load->view('inicio_admin');
				$this->load->view('footer');
			}else{

				$this->load->view('header');
				$this->load->view('inicio');
				$this->load->view('footer');
			}

		}else{

			//Para cargar los nombres de los deportes en la lista desplegable
			$this->load->model('Deporte');
			$data['datos']=$this->Deporte->get_all();

			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer');

		}
	}

	public function provicional(){
		$this->load->view('inicioPrueba');
	}

	public function cargar_usuarios(){
		$msg="";
		$this->load->model('Usuario');
		$nom_usu=$this->input->post('nom');

		if (empty($nom_usu)) {
			$this->load->view('inicioPrueba');
		} else {
			if (empty($this->Usuario->traer_usuarios($nom_usu))) {
				$msg="no existe deportista buscado";	
			}

			$data['msg']=$msg;
			$data['usuarios']=$this->Usuario->traer_usuarios($nom_usu);
			$this->load->view('BusquedaUsuario',$data);
			
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
		$this->form_validation->set_rules('contraseña', 'contraseña', 'required|min_length[8]|callback_is_password_strong');
		$this->form_validation->set_rules('repetir_contrasena', 'repetir contraseña', 'required|matches[contraseña]');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio'); 
		$this->form_validation->set_message('valid_email','El campo %s debe ser un correo valido'); 
		$this->form_validation->set_message('matches','El campo %s debe ser igual al campo repetir contraseña');
		$this->form_validation->set_message('is_unique','El %s ingresado ya lo tiene otro usuario');
		$this->form_validation->set_message('is_password_strong','La %s no tiene la complejidad requerida');

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
			$data['contraseña']=$this->input->post('contraseña');
			$data['repetir_contraseña']=$this->input->post('repetir_contrasena');

			$this->load->view('header');
			$this->load->view('Ingresar', $data);
			$this->load->view('footer', $data);

		}else{

			$this->load->model('Usuario');
			$Usuario1=new Usuario($this->input->post());
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

		
		$this->form_validation->set_rules('nombre_usuario','nombre de usuario','required');
		$this->form_validation->set_rules('contraseña','contraseña','required|callback_verifyUser');

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
				'nombre_usuario' => $this->input->post('nombre_usuario'),
				'contraseña' => $this->input->post('contraseña'),
				'identificador' => $this->input->post('nombre_usuario'),
				'conectado' => TRUE );

			$this->session->set_userdata($nuevos_datos);
			$this->index();
		}
	}

	public function verifyUser(){

		$this->load->model('Usuario');
		$usuario1=new Usuario($this->input->post());
		if($usuario1->login()){
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

	public function perfil()
	{
		$data['nom_usuario']= $this->session->userdata('nombre_usuario');
		$this->load->view('header');
		$this->load->view('perfil', $data);
		$this->load->view('footer');
	}

	public function ver_perfil($id)
	{
		$this->load->model('Usuario');
		$data['usuarios']=$this->Usuario->datos_usuario($id);

		$this->load->view('header');
		$this->load->view('perfil_visitado', $data);
		$this->load->view('footer');
	}

	public function vistaEliminar()
	{
	
		$this->load->view('header');
		$this->load->view('eliminar_cuenta');
		$this->load->view('footer');
	}

	public function pregunta_eliminar()
	{
		
		if ($this->input->post('motivo') == '' ) {
			
			$this->load->view('header');
			$data['mensaje']="Error por favor ingresar el motivo";
			$this->load->view('eliminar_cuenta', $data);
			$this->load->view('footer');

		}else{

			$mensaje = $this->input->post('motivo');
			
			$this->load->model('Usuario');
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

		//Para cargar los nombres de los deportes en la lista desplegable
		$this->load->model('Deporte');
		$data['datos']=$this->Deporte->get_all();

		$data['mensaje']="Su cuenta ha sido eliminada satisfactoriamente";

		$this->load->view('header');
		$this->load->view('ingresar', $data);
		$this->load->view('footer');


	}

	public function logoff(){
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

	public function consultar_id(){
		$this->load->model('Usuario');
		$usuario1=new Usuario();
		return $usuario1->consultar_id($this->session->set_userdata($nombre_usuario));
	}
	
	public function validarCorreo() {
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('header');
			$this->load->view('ValidarCorreo');
			$this->load->view('footer');
		} else {
			
			$email = $this->input->post('email');
			$this->db->where('correo', $email);
			$this->db->from('usuario');
			$numCorreosRegistrados = $this->db->count_all_results();
			
			if ($numCorreosRegistrados == 1) {
				// Código random para verificar
				$code = mt_rand('5000', '200000');
				$data = array(
						'olvidoContrasenia' => $code
				);
				
				$this->db->where('correo', $email);

				$this->load->model('Usuario');
				if ($this->Usuario->actualizar_Usuario($data)) {
					// Email enviado
					$url = "http://localhost/sportremind/index.php/ControladorUsuario/ValidarContrasenia/".$code;
					$body = "\nHaga clic en este enlace para cambiar la contraseña:\n\n".$url."\n\n";
					
					if (mail($email, 'Restablecer Contraseña', $body, 'From: serviciocliente@sportremind.com')) {
						$this->load->model('Deporte');
						$data['submit_success'] = true;
						$data['datos']=$this->Deporte->get_all();
						echo "<script language=\"javascript\">alert('Para finalizar los cambios ingrese al link enviado a su correo');</script>";
						$this->load->view('header');
						$this->load->view('Ingresar', $data);
						$this->load->view('footer');
					} else {
						echo "<script language=\"javascript\">alert('Hubo problemas al enviar el correo. Inténtelo de nuevo');</script>";
						redirect('ControladorUsuario/ValidarCorreo');
					}
				} else {
					// Error al actualizar
					echo "<script language=\"javascript\">alert('No se pudo actualizar el usuario. Inténtelo de nuevo');</script>";
					$data['datos']=$this->Deporte->get_all();
					$this->load->view('header');
					$this->load->view('Ingresar', $data);
					$this->load->view('footer');
				}
			} else {
				// Correo inválido
				echo "<script language=\"javascript\">alert('El correo proveido no se encuentra registrado');</script>";
				$this->load->view('header');
				$this->load->view('ValidarCorreo');
				$this->load->view('footer');
			}
		}
	}
	
	
	public function ValidarContrasenia() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
		$this->form_validation->set_rules('password1', 'Contraseña', 'required|min_length[8]|callback_is_password_strong');
		$this->form_validation->set_rules('password2', 'Confirmar Contraseña', 'required|min_length[8]|callback_is_password_strong');
		
		$this->form_validation->set_message('callback_is_password_strong','La contraseña no tiene la complejidad requerida');
		
		
		// ¿Hay post?
		if ($this->input->post()) {
			$data['code'] = xss_clean($this->input->post('code'));
		} else {
			$data['code'] = xss_clean($this->uri->segment(3));
		}
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('AsignarNuevaContrasenia', $data);
			$this->load->view('footer');
		} else {
			// Coincide el correo y el código?
			$this->load->model('Usuario');
			$email = xss_clean($this->input->post('email'));
			if (!$this->Usuario->does_code_match($data['code'], $email)) {
				// El código no coincide
				echo "<script language=\"javascript\">alert('El cambio de contraseña ha expirado. Debe solicitarla nuevamente');</script>";
				$this->load->view('header');
				$this->load->view('ValidarCorreo', $data);
				$this->load->view('footer');
			} else {// El código coincide
				
				$data = array(
						'contraseña' => $this->input->post('password1'),
						'olvidoContrasenia' => 0
				);
				
				if ($this->Usuario->update_user($data, $email)) {
					echo "<script language=\"javascript\">alert('Correo incorrecto. Inténtelo de nuevo');</script>";
					
				} else
				{
					$this->load->model('Deporte');
					$data['submit_success'] = true;
					$data['datos']=$this->Deporte->get_all();
					echo "<script language=\"javascript\">alert('El cambio se ha realizado satisfactoriamente. Ahora puede usar su nueva contraseña');</script>";
					$this->load->view('header');
					$this->load->view('Ingresar', $data);
					$this->load->view('footer');
				}
			}
		}
	}

}
?> 