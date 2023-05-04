<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends MY_Controller {
	public function __construct(){
        parent::__construct();

        $this->load->model("categorias_model");
        $this->load->model("articulos_model");
        $this->load->library('session');
        $this -> load -> library('form_validation');
    
    }

    public function index()
	{
		redirect("articulos/inicio"); //1.redirigi de catalogo al metodo inicio (el de abajo)
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

    public function view_sales_history(){
        $this->mostrar("catalogo/view_sales_history"); 
    }

    public function inicio($categoria_id=DEFAULT_CATEGORY){
        $this->datos["categoria_seleccionada"]=$categoria_id;
        $this->datos["categorias"]=$this->categorias_model->listado();

        $this->articulos_model->set_categoria_id($categoria_id);



        $this->datos["articulos"]=$this->articulos_model->listado();
        $this->mostrar("administracion/nuevo_articulo");
    }

    public function categoria($categoria_id=DEFAULT_CATEGORY){
        $this->inicio($categoria_id);
    }

    public function nuevo(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("articulo","Name","required");
		$this->form_validation->set_rules("descripcion","Descripction","required");
		$this->form_validation->set_rules("precio","Price","required");
		$this->form_validation->set_rules("stock_actual","Stock","required");
        $this->form_validation->set_rules("categoria_id","Category","required");
		if($this->form_validation->run() == FALSE)
                {
                   $this->mostrar("administracion/nuevo_articulo");
                }
                else
                {				
                    $usuario_id=$this->session->userdata("usuario_id");
                    $this->articulos_model->set_usuario_id($usuario_id);	
					$nuevo_articulo=array();					
					$nuevo_articulo["articulo"]=set_value("articulo");
					$nuevo_articulo["descripcion"]=set_value("descripcion");
					$nuevo_articulo["precio"]=set_value("precio");
                    $nuevo_articulo["stock_actual"]=set_value("stock_actual");
                    $nuevo_articulo["categoria_id"]=set_value("categoria_id");			

					$this->articulos_model->articulo_nuevo($nuevo_articulo);
					$this->session->set_flashdata("OK","AGREGADO");
					redirect("catalogo/view_sales");
                }	

	}

    public function baja($id=false){
        
        $this->articulos_model->baja($id);
        $this->session->set_flashdata("OP","BORRADO");
        redirect("catalogo/view_sales");
    }
}
