<?php

class categoria_model extends CI_Model {
    public $table="lista_de_precios";
    public $p_key="lista_de_precios.lista_de_precios_id";

    public function alta($datos=array()){
        $this->db->set("nombre",$datos["nombre"]);
        $this->db->set("estado",$datos["estado"]);
        $this->db->set("ult_modificacion",$datos["ult_modificacion"]);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }
    public function baja($id=false){
        $this->db->where($this->p_key,$id);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function modificacion($id=false, $datos=array()){
        $this->db->where($this->p_key,$id);
        $this->db->limit(1);
        $this->db->update($this->table,$datos);
        return $this->db->affected_rows();
    }
    public function listado(){
        $this->db->from($this->table);
        $this->db->order_by("nombre");
        $this->db->select($this->table,$this->p_key);  
        
    }
    public function obtener_por_id($id=false){
        $this->db->where($this->table,$id);
        $this->db->limit(1);
        return $this->db->get("lista_de_precios")->row_array();
    }
    }
?>        