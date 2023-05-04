<?php
class MY_Controller extends CI_Controller{ //1.creamos clase extends , EL MASTER CONTROLLER SIRVE PARA NO HACER UNA Y OTRA VEZ LA MISMA FUNCION
//2 CREAMOS ARRAY GLOBAL
public $datos=array();
//3 CREAMOS CONSTRUCT
function __construct(){
    parent::__construct(); 
    if(!$this->session->userdata("usuario_id")){ //para  verificar si estoy logeado , se pone en este CI_Controller para que 
        $this->session->set_flashdata("OP","NO");//esta rutina se haga en todos lados
        redirect("auth/login");
    }
}
//4 COPIAMOS DE ANTES LA FUNCION MOSTRAR
public function mostrar($vista=""){ //CREAMOS FUNCION MOSTRAR (LUEGO VA A IR PROTECTED) CON PARAMETRO VISTA
    $this->output->set_template("catalogo"); //SETEAMOS TEMPLATE 
    $this->load->section("menu","menu");//seccion dentro de la plantilla / archivo que tiene que cargar MENU ADMIN EN ESTE CASO
    $this->load->view($vista,$this->datos); //CARGAR LOS DATOS (global) JUNTO CON LA VISTA
}
}

class MY_Admin_controller extends MY_Controller{ //este extiende al de arriba
    public $datos=array();
    //CREAMOS CONSTRUCT
    function __construct(){
        parent::__construct(); 
        if($this->session->userdata("rol_id")!=ADMIN){ //para ver si soy admin
			$this->session->set_flashdata("OP","NO"); //la pegamos aca para verificar solo admins
			redirect("auth/login");
		}
    }
    //COPIAMOS DE ANTES LA FUNCION MOSTRAR
    public function mostrar($vista=""){ //CREAMOS FUNCION MOSTRAR (LUEGO VA A IR PROTECTED) CON PARAMETRO VISTA
        $this->output->set_template("catalogo"); //SETEAMOS TEMPLATE 
        $this->load->section("menu","menu_admin");//seccion dentro de la plantilla / archivo que tiene que cargar MENU ADMIN EN ESTE CASO
        $this->load->view($vista,$this->datos); //CARGAR LOS DATOS (global) JUNTO CON LA VISTA
    }
    
}

class MY_Cart_controller extends MY_Controller{


    public function mostrar($vista=""){ //CREAMOS FUNCION MOSTRAR (LUEGO VA A IR PROTECTED) CON PARAMETRO VISTA
        $this->output->set_template("catalogo"); //SETEAMOS TEMPLATE 
        $this->load->section("menu","menu_admin");//seccion dentro de la plantilla / archivo que tiene que cargar MENU ADMIN EN ESTE CASO
        $this->load->view($vista,$this->datos); //CARGAR LOS DATOS (global) JUNTO CON LA VISTA
    }
} 
?>
