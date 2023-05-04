<?php

class categorias_model extends CI_Model {
    public $table="categorias";
    public $p_key="categorias.categoria_id";

    public function alta($datos=array()){
        $this->db->set("categoria",$datos["categoria"]);
        $this->db->set("estado",$datos["estado"]);
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
    public function listado($mostrar_todas=false){
        $this->db->from($this->table);
        $this->db->order_by("orden");
        if(!$mostrar_todas){
            $this->db->where("estado",1);
        }  
        return $this->db->get()->result_array(); 
    }
    public function obtener_por_id($id=false){
        $this->db->where($this->p_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }
    }
?>        