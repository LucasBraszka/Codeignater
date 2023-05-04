<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
		redirect("auth/login");
		// $this->login();
	}
	public function login(){
			$this->load->library("form_validation");
			$this->form_validation->set_rules("usuario","usuario","trim|required");
			$this->form_validation->set_rules("password","contraseña","required");	
			//prueba logica
		if($this->form_validation->run()==false){
			
			$this->load->view("usuarios/login"); //si falla muestra la vista login con los errores y demas
		}else{
			$this->load->model("usuarios_model"); //sino fuera asi ,  se carga el modelo , se toman los datos escritos por el usuario
			$usuario=set_value("usuario"); //set value de los campos (helpers) solo funcionan si fueron validados
			$password=set_value("password");
			if($u=$this->usuarios_model->checkusuario($usuario,$password)){ //me fijo si en usuarios model tengo checkusuario
							if($u["estado"]==1){ //ACTIVO y establezco variables de sesion necesarias
								$this->session->set_userdata("usuario_id",$u["usuario_id"]);
								$this->session->set_userdata("usuario",$u["usuario"]);
								$this->session->set_userdata("rol_id",$u["rol_id"]);
								$this->usuarios_model->ultlogin($u["usuario_id"]);
								if($u["rol_id"]==1){ //Si es admin redirige a administracion(controlador)
									redirect("administracion");
								}else{
									redirect("catalogo"); //Sino redirige a catalogo para usuarios :u 
								}
							}else{
								$this->session->set_flashdata("OP","INACTIVO"); //INACTIVO
								redirect("auth/login");
							}
				
			}else{
				$this->session->set_flashdata("OP","ERROR");
				redirect("auth/login");
			}
			
		}
		
	}	
	public function salir(){
		$this->session->sess_destroy();
		redirect("auth/login");
	}
}
