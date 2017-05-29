<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Controlador_entrenamiento extends CI_Controller
{

	public function publicar_entrenamiento(){

		//Validación de datos ingresados en el formulario

		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('duracion', 'duración', 'required');
		$this->form_validation->set_rules('calorias_perdidas', 'calorías pérdidas', 'required');
		$this->form_validation->set_rules('fecha', 'fecha', 'required|callback_validar_fecha');
		$this->form_validation->set_rules('lugar', 'lugar', 'required');

		//Mensajes
            // %s es el nombre del campo que ha fallado
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('validar_fecha','El campo %s no es correcto, por favor ingrésalo nuevamente');

		//Si los datos ingresados en el formulario no son correctos se regresa  a la vista sin guardar los datos en la bd.

		$id_usuario=$_GET['itemid'];

		if($this->form_validation->run()===FALSE){

			//Se guardan los datos, para repoblar el formulario
			$data['nombre']=$this->input->post('nombre');
			$data['duracion']=$this->input->post('duracion');
			$data['calorias_perdidas']=$this->input->post('calorias_perdidas');
			$data['fecha']=$this->input->post('fecha');
			$data['lugar']=$this->input->post('lugar');

			$this->load->view('header');
			$this->load->view('publicar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{


			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			if($Entrenamiento1->registrar($id_usuario)){
				$data['entrenamiento1']="El entrenamiento ha sido publicado exitosamente";
			}else{
				$data['entrenamiento2']="El entrenamiento no pudo ser publicado";
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
			$data['id_usuario']=$ids->id; 
		}

		$this->load->model('Entrenamiento');
		$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($identificacion);

		$this->load->view('header');
		$this->load->view('consultar_entrenamiento', $data);
		$this->load->view('footer');
	}

	public function editar_entrenamiento()
	{

		$data['id_usuario']=$_GET['id_usuario']; 

		$this->load->model('Entrenamiento');
		$data['datos']=$this->Entrenamiento->consultar_entrenamiento();
		$dat=$this->Entrenamiento->consultar_entrenamiento();

		$idU=0;

		foreach ($dat as $dato) {
			$idU=$dato->id_usuario; 
		}

		if ($idU==0){

			$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($_GET['id_usuario']);
			
			$data['entrenamiento2']='Este entrenamiento ha sido eliminado';
			$this->load->view('header');
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer');

		}else{

			$this->load->view('header');
			$this->load->view('editar_entrenamiento', $data);
			$this->load->view('footer');
		}
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
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer', $data);

		}else{
		
			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento($this->input->post());
			if($Entrenamiento1->actualizar($id_entrenamiento)){
				$data['entrenamiento1']="El entrenamiento fue actualizado satisfactoriamente";
			}else{
				$data['entrenamiento2']="El entrenamiento no pudo ser actualizado";
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

		$data['id_usuario']=$_GET['id_usuario'];

		$this->load->model('Entrenamiento');
		$data['datos']=$this->Entrenamiento->consultar_entrenamiento();
		$dat=$this->Entrenamiento->consultar_entrenamiento();

		$idU=0;

		foreach ($dat as $dato) {
			$idU=$dato->id_usuario; 
		}

		if ($idU==0){
			
			$this->load->model('Entrenamiento');
			$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($_GET['id_usuario']);
			
			$data['entrenamiento2']='Este entrenamiento ya habia sido eliminado';
			$this->load->view('header');
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer');

		}else{

			$this->load->model('Entrenamiento');
			$Entrenamiento1=new Entrenamiento();
			if($Entrenamiento1->eliminar()){
				$data['entrenamiento1']="El entrenamiento fue eliminado satisfactoriamente";
			}else{
				$data['entrenamiento2']="El entrenamiento no pudo ser eliminado";
			}
		
			$this->load->model('Entrenamiento');
				$data['datos']=$this->Entrenamiento->consultar_entrenamientos_por_usuario($_GET['id_usuario']);
			$this->load->view('header');
			$this->load->view('consultar_entrenamiento', $data);
			$this->load->view('footer');
		}
	}

	public function validar_fecha($fecha)
	{
		$formato = 'Y/m/d';
    	$d = DateTime::createFromFormat($formato, $fecha);
    	$data=$d && $d->format($formato) == $fecha;
    	if($data==False){
    		return $data;
    	}else{
    		$fechaActual=date("Y/m/d");
    		if($fecha>$fechaActual){
    			return False;
    		}else{
    			return True;
    		}
    	}
	}
}

?>