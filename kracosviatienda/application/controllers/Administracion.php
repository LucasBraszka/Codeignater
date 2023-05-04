<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends MY_Admin_controller {
    var $datos=array(); //3. CREAMOS EL ARRAY DE TRANSPORTE GLOBAL TODO LO QUE HAGAMOS PARA EN ESTE ARRAY
	
    public function index()
	{
		redirect("administracion/inicio"); //1.redirigi de catalogo al metodo inicio (el de abajo) VA A TENER QUE LLAMAR A ADMINISTRACION / INICIO
	}
    public function inicio(){//2.CREAMOS METODO INICIO
         $this->mostrar("administracion/principal"); //7.LE PASAMOS A MOSTRAR LA VISTA QUE TIENE QUE MOSTRAR!
        
    }
    public function mostrar($vista=""){ //4. CREAMOS FUNCION MOSTRAR (LUEGO VA A IR PROTECTED) CON PARAMETRO VISTA
       $this->output->set_template("catalogo"); //5. SETEAMOS TEMPLATE 
       $this->load->section("menu","menu_admin");//seccion dentro de la plantilla / archivo que tiene que cargar MENU ADMIN EN ESTE CASO
       $this->load->view($vista,$this->datos); //6. CARGAR LOS DATOS JUNTO CON LA VISTA

    }
    public function lista(){
      $datos=array(); //array de transporte
      $this->load->model("usuarios_model"); // cargo el modelo
      $datos["usuarios"]=$this->usuarios_model->listado();
      $this->load->view("usuarios/listado",$datos);// cargo la vista correspondiente y paso el array de transporte.
    }
    public function altausuario(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules("descripcion","necesito","trim|required");
		if($this->form_validation->run() == FALSE)
                {
                    $this->load->view('usuarios/nuevo');//entonces cargo nuevamente la vista para agregar nueva compra
                }
                else // si es verdadero...
                {
					$this->load->model("usuarios_model");//cargo el modelo
					$nuevo=array(); //creo array de transporte
					//$nuevo["descripcion"]=$this->input->post("descripcion");
					$nuevo['usuario_id'] = $this->session->userdata('usuario_id');  //AGREGADA X MI (captura el usuario_id)
					$nuevo["usuario"]=set_value("usuario"); //funcion de form_validation, captura "descripcion" (antes usabamos input->post)
					$this->usuarios_model->alta($nuevo); //accedo a la funcion del modelo  y le paso el array
					$this->session->set_flashdata("OP","AGREGADO"); //creo un flashdata para un alert en la vista (switch)
					redirect("lista"); //redireciono a la pagina principal
    }
}
public function editar($id=false){  //funcion para editar usuario
    $this->load->model("usuarios_model");
    if($u=$this->usuarios_model->obtener_por_id($id)){ 
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules("usuario","Usuario","required|is_unique[usuarios.usuario]"); //reglas de validacion -- 1ª CAMPO A VALIDAR. 2º COMO LO VE EL HUMANO 3ª REGLAS
        $this->form_validation->set_rules("password","contraseña","required"); //reglas de validacion -- 1ª CAMPO A VALIDAR. 2º COMO LO VE EL HUMANO 3ª REGLAS
        $this->form_validation->set_rules("conf-password","confirmar contraseña","required|matches[password]"); //con "matches[password]" le decimos q tienen q coincidir ambos campos "password".
        $this->form_validation->set_rules("rol_id","Rol","required");//reglas de validacion -- 1ª CAMPO A VALIDAR. 2º COMO LO VE EL HUMANO 3ª REGLAS

        if($this->form_validation->run() == FALSE)  //"run" corrobora las reglas, si no se cumplen es FALSE
                {
                    $this->load->view('usuarios/editar/'.$u); //entonces cargo nuevamente la vista para cambiar contraseña
                }
                else // si es verdadero...
                {
                    $this->load->model("usuarios_model"); //cargo el modelo
                    $nuevo=array(); //array de transporte
                    
                    $nuevo["usuario"]=set_value("usuario"); //funcion de form_validation, captura "usuario" (antes usabamos input->post)
                    $nuevo["password"]=set_value("password"); //funcion de form_validation, captura "password" 
                    $nuevo["rol_id"]=set_value("rol_id"); //funcion de form_validation, captura "rol" 

                    

                    $this->usuarios_model->modificacion($nuevo);  //accedo a la funcion del modelo  y le paso el array
                    $this->session->set_flashdata("OP","AGREGADO"); //creo un flashdata para un alert en la vista (switch)
                    redirect("usuarios/editar/".$id); //redireciono al mismo lugar.
                }	
    }else{
        echo "No existen usuarios";
    }
    
}
}