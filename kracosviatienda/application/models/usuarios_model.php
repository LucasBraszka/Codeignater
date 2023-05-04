<?php
    class usuarios_model extends CI_Model{
        public $table="usuarios";               //con esto nos facilitamos de llamar al a los usuarios de la tabla usuarios
        public $p_key="usuarios.usuario_id";    //los llamamos asi $this->table y $this->p_key
                                                
        public function alta($datos=array()){   //Alta usuario
            $this->db->set("usuario",$datos["usuario"]); //En el campo usuario carga en el array lo que ponga el usuario
            $this->db->set("password",$datos["password"]);//En el campo password carga en el array lo que ponga el usuario
            $this->db->set("rol_id",$datos["rol_id"]); //Carga lo qe el usuario ponga en ROL

            $this->db->insert($this->table); //Inserta los datos en la tabla "usuarios" ($table)

            return $this->db->insert_id(); //Devolve el ID insertado
        }

        public function baja($id=false){ //Baja Usuario
            $this->db->where("usuario_id",$id); //Donde se seleccione el usuario
            $this->db->limit(1); //Establece un limite de 1
            $this->db->delete("usuarios"); //Elimina de la tabla usuarios
            return $this->db->affected_rows(); //Devolve las filas afectadas
        }

        public function editar($id=false, $datos=array()){ //Modificar usaurio necesita ID false y array de datos
            $this->db->where("usuario",$id); //donde usuario y id 
            $this->db->limit(1); // limite 1 
            $this->db->update("usuarios",$datos); //updatea lo que se cargue
            return $this->db->affected_rows(); //devolve rows afectados
        }

        public function listado(){ //Funcion Listar
            $this->db->from("usuarios"); //de usuarios
            $this->db->order_by("usuario"); //ordena por desc 
            $this->db->select("usuarios.*,roles.nombre AS rol");  //selecciona todo el contenido de suarios y de la tabla roles el campo nombre
            $this->db->join("roles","usuarios.rol_id=roles.rol_id","inner");
            $datos=$this->db->get(); //carga todo en datos
             
            return $datos->result_array(); //devolve el resultado como array
        }

        public function obtener_por_id($usuario_id=""){ // OBTENER POR ID necesita parametro el id 
            $this->db->where("usuario_id",$usuario_id); //el campo usuario_id y donde $usuario_id coincidan
            $this->db->limit(1); //limita a 1 resultado
            $res=$this->db->get("usuarios"); //ejecutar recordset donde obtengas estos datos de la tabla usuarios
            return $res->row_array(); //devolver las filas afectadas 
        }     

        public function ultlogin($id=""){  //UUltimo logeo , id sin nada
            $this->db->set("ult_login","NOW()",FALSE); //En el campo ultlogin de la tabla , NOW (ahora) , FALSE
            $this->db->where("usuario",$id); //DONDE usuaaario coincida con ID 
            $this->db->update("usuarios"); //updatea la tabla usuarios
        }
        public function checkusuario($usuario="",$password=""){//recibe usuario y password
            $this->db->select($this->p_key); //variable ya hecha arriba
            $this->db->where("usuario",$usuario); //campo usuario es igual a la variable $usuario
            $this->db->where("password",$password); //lo mismo con pass
            $this->db->limit(1);
            $res=$this->db->get($this->table)->row_array();//consulta que devuelve un solo resultado por eso usamos row array;
            
            if($res){ //si hay resultado (tiene algo)
                return $this->obtener_por_id($res["usuario_id"]); //devuelvo con la funcion obtener por id el campo usuario id
            }else{
                return false; //devuelve falso si no hay coincidencia
            }
        }
        public function actualizar($id=false, $datos=array()){
            $this->db->where("usuario_id",$id);
            $this->db->limit(1);
            $this->db->update("usuarios",$datos);
            return $this->db->affected_rows();
        }
    

    }