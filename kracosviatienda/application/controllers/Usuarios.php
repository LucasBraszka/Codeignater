<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Admin_Controller {
//public $datos=array(); //lo ponemos aca para que sea en todo el controlador <--- COMENTADO POR QUE VIENE DEL MY_Controller

	function __construct(){
		parent::__construct(); 
		
		$this->load->model("usuarios_model");
	}

	public function index() //va a ser nuestro listado
	{
		$this->datos["usuarios"]=$this->usuarios_model->listado();
		$this->mostrar("usuarios/listado");
		
	}
	
	public function nuevo(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("usuario","Usuario","required|is_unique[usuarios.usuario]");
		$this->form_validation->set_rules("password","contraseña","required");
		$this->form_validation->set_rules("conf-password","confirmar contraseña","required|matches[password]");
		$this->form_validation->set_rules("rol","Rol","required");

		if($this->form_validation->run() == FALSE)
                {
                    $this->mostrar("usuarios/nuevo");
                }
                else
                {					
					$nuevo=array();					
					$nuevo["usuario"]=set_value("usuario");
					$nuevo["password"]=set_value("password");
					$nuevo["rol_id"]=set_value("rol");			

					$this->usuarios_model->alta($nuevo);
					$this->session->set_flashdata("OP","AGREGADO");
					redirect("usuarios/nuevo");
                }	

	}
	public function cambiaestado($id=false,$estado=false){
		if($id!=$this->session->userdata("usuario_id")){
			$usuario=array();
			$usuario["estado"]=$estado;
			$this->usuarios_model->actualizar($id,$usuario);
			$this->session->set_flashdata("OP","Estado actualizado correctamente!");
		}
		redirect("usuarios/index");
	}
	public function editar($id=false){
	 //Array de Transporte ya declarado en master controller
		$this->datos["usuario"]=$this->usuarios_model->obtener_por_id($id);//division del array donde cargo el id del usuario usando el modelo
    //Reglas para editar un usuario
			$this->load->library('form_validation');
			$this->form_validation->set_rules("usuario","Usuario","required|trim|strtolower");//campo usuario
			if($this->input->post("password")){ //si hay algo en el post valida sino dejalo pasar 
				$this->form_validation->set_rules("password","contraseña","required|min_length[4]"); //campo password
		    }
			$this->form_validation->set_rules("rol_id","Rol","required"); //retiene el valor 

    //Prueba logica
			if($this->form_validation->run() == FALSE) //Si el formulario esta vacio carga la vista y carga el array de transporte
					{
					$this->mostrar("usuarios/editar");
					}
					else
					{					
					//si paso todo , almacena los valores!
					$e=array();					//array de transporte
					$e["usuario"]=set_value("usuario"); //set value del campo usuario (NAME EN LA VISTA EDITAR)
					if(set_value("password")){ //si hay algo en el campo actualiza sino pasa de largo
					$e["password"]=set_value("password");
					}
					$e["rol_id"]=set_value("rol_id"); //rol
						
				    if($this->input->post("estado")){//si hay campo tildado es 1= activo
                    $e["estado"]=1;
					}else{ //sino es 0 = inactivo
					$e["estado"]=0;
					}

					$this->usuarios_model->actualizar(set_value("usuario_id"),$e); //se usa el value usuario id y el array de transporte e
					$this->session->set_flashdata("OP","EDITADO");
					redirect("usuarios/editar/".$id);
					}
	}
}