<?php

class LoginController extends CI_controller{
	public function index(){
		$this->load->view('iniciarSession');
	}

	public function checklogin(){

		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_verifyUser');

		if($this->form_validation->run() ==false){
			$this->load->view('iniciarSession');

		}else{
			$this->load->view('inicio');
		}
	}

	public function verifyUser(){
		$name= $this->input->post('username');
		$pass= $this->input->post('password');

		$this->load->model('CuentaModel');

		if($this->CuentaModel->login($name,$pass)){
			return true;

		}else{
			$this->form_validation->set_message('verifyUser', 'incorrecto usuario o contraseña');

	    }
	}
}
?>