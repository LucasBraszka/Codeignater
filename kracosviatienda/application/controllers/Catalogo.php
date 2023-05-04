<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends MY_Controller {
	public function __construct(){
        parent::__construct();

        $this->load->model("categorias_model");
        $this->load->model("articulos_model");
        $this->load->library('session');
    
    }

    public function index()
	{
		redirect("catalogo/inicio"); //1.redirigi de catalogo al metodo inicio (el de abajo)
	}

    public function view_cart(){
        $this->mostrar("catalogo/view_cart"); 
    }

    public function view_shopping(){
        $this->mostrar("catalogo/view_shopping"); 
    }

    public function view_sales(){
        $usuario_id=$this->session->userdata("usuario_id");
        $this->articulos_model->set_usuario_id($usuario_id);
        $this->datos["articulos"]=$this->articulos_model->listado_sales(); 
        $this->mostrar("catalogo/view_sales");
    }

    public function view_bookstore(){
        $this->mostrar("catalogo/view_bookstore"); 
    }

    public function inicio($categoria_id=DEFAULT_CATEGORY){//2.CREAMOS METODO INICIO
        $this->datos["categoria_seleccionada"]=$categoria_id;
        $this->datos["categorias"]=$this->categorias_model->listado();

        $this->articulos_model->set_categoria_id($categoria_id);



        $this->datos["articulos"]=$this->articulos_model->listado();
        $this->mostrar("catalogo/principal");
    }

    public function categoria($categoria_id=DEFAULT_CATEGORY){
        $this->inicio($categoria_id);
    }
}
