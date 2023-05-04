<div class="row">
            <div class="col-12">
            <br>
            <h3>Editar usuario:</h3>
            </div>
            </div>
        <div class="row">
            <?php if($usuario){ //LLEGA DESDE EL CONTROLADOR USUARIOS (es la division de $datos["usuarios"]<- un array) ?>
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-body">
                        <?php if($this->session->flashdata("OP")){ ?>
                            <div class="alert alert-success">
                                ¡Usuario editado correctamente!
                            </div>
                        <?php } ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" name="usuario" class="form-control" value="<?php echo set_value("usuario",$usuario["usuario"]); //setvalue el valor que establezco , valor por defecto?>">
                                <?php echo form_error("usuario", '<small class="text-danger">', "</small>") ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" value="<?php echo set_value("password") ?>">
                                <?php echo form_error("password", '<small class="text-danger">', "</small>") ?>
                            </div>
                            <div class="form-group">
                                <label for="rol_id">Rol</label>
                                <select name="rol_id" class="form-control">
                                    <option value="1" <?php echo set_select("rol_id",1,($usuario["rol_id"]==1)?true:false); //primer valor nombre del campo , segundo el valor correcto y el tercero si es el que t iene que estar seleccionado?>>Administradores</option>
                                    <option value="2" <?php echo set_select("rol_id",2,($usuario["rol_id"]==2)?true:false);?>>Usuarios</option>
                                </select>
                            </div>
                            <div class="form-group form-check">
                               <input type="checkbox" class="form-check-input" name="estado" value="1" <?php echo($usuario["estado"]==1)?"checked":""; //if condensado?>>
                               <label class="form-check-label" for="estado">Activo</label>
                            </div>
                            <button type="submit" name="boton" class="btn btn-primary">Guardar</button>
                            <!--CONTROL OCULTO PARA TENER EL ID A MANO-->
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario["usuario_id"]; //segmento del array del controlador y solo el campo usuario_id ?>">
                        </form>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="col-12">
                <div class="alert alert-danger">
                    El Usuario no existe!
                </div>
                <br>
                <a href="<?php echo site_url("usuarios"); ?>">Ir a lista de Usuarios</a>
            </div>
            <?php } ?>
        </div>
 