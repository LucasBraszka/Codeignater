<?php
    class Articulos_model extends CI_Model {
        
    public $table="articulos";
    public $p_key="articulos.articulos_id";
    public $categoria_id="";
    public $usuario_id="";

    public function alta($datos=array()){
            return $datos->result_array();
            //FALTA COMPLETAR FUNCIONES
    }

    public function set_categoria_id($valor=""){
        $this->categoria_id=$valor;
    }

    public function set_usuario_id($usuario_id){
        $this->usuario_id=$usuario_id;
    }

    public function articulo_nuevo($nuevo_articulo=array()){
        $usuario_id=$this->usuario_id;
        $this->db->set("articulo",$nuevo_articulo["articulo"]);
        $this->db->set("descripcion",$nuevo_articulo["descripcion"]);
        $this->db->set("precio",$nuevo_articulo["precio"]);
        $this->db->set("stock_actual",$nuevo_articulo["stock_actual"]);
        $this->db->set("categoria_id",$nuevo_articulo["categoria_id"]);
        $this->db->set("usuario_id",$usuario_id);
        $this->db->insert($this->table); 

        return $this->db->insert_id();
    }
    
    public function modificación($datos=array()){            
        $this->db->set("descripcion",$datos["descripcion"]);
        $this->db->set("articulo_id",$datos["articulo_id"]);
        $this->db->insert("articulos");
        return $this->db->insert_id();
    }

    public function baja($id=false){
        $this->db->where("articulo_id",$id);
        $this->db->limit(1);
        $this->db->delete("articulos");
        return $this->db->affected_rows();
    }

    public function actualizar(){
            $this->db->where("articulo_id",$id);
            $this->db->limit(1);
            $this->db->update("articulos",$datos);
            return $this->db->affected_rows();
    }

    public function listado() {
        $this->db->from("articulos");
        $this->db->order_by("descripcion");
        $this->db->select("articulos.*,articulos.articulo");  
        if($this->categoria_id!=""){
            $this->db->where("categoria_id",$this->categoria_id); //
        }
        return $this->db->get()->result_array();
    }

    public function listado_sales() {
        $this->db->from("articulos");
        $this->db->join("usuarios","articulos.usuario_id=usuarios.usuario_id");
        $this->db->where("articulos.usuario_id",$this->usuario_id);

        return $this->db->get()->result_array();
    }

    public function obtener_por_id($id=false){
        $this->db->where("articulo_id",$id);
        $this->db->limit(1);
        return $this->db->get("articulos")->row_array();
    }

}
