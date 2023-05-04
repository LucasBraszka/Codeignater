
        <div class="row">
            <div class="col-12">
                <br>
                <h1><i class="bi bi-list-ol"></i> Lista de Usuarios
                </h1>
                <br>
                <h3>Gestión de usuarios 
                    <a href="<?php echo site_url("administracion/altausuario");?>" class="btn btn-secondary btn-sm"><i class="bi bi-person-plus-fill"></i> Nuevo</a>
                </h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
            <?php if($this->session->flashdata("OP")){ ?>
                    <div class="alert alert-success">
                        <div class="alert-body">
                        <?php echo $this->session->flashdata("OP"); ?>
                        </div>
                    </div>
                    <br>
                <?php } ?>
                <?php if($usuarios){ ?>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario </th>
                                <th>Ult.login</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usuarios as $i){ ?>
                                <tr>
                                    <td><?php echo $i["usuario"]; ?></td>
                                    <td><?php echo $i["ult_login"]; ?></td>
                                    <td><?php echo $i["rol"]; ?></td>
                                    <td>
                                        <?php 
                                        if($i["usuario"]=="admin" or $this->session->userdata("usuario_id")==$i["usuario_id"]){
                                            echo "Activo";
                                        }else{
                                            switch($i["estado"]){
                                                case 1: ?> 
                                                    <a href="<?php echo site_url("usuarios/cambiaestado/".$i["usuario_id"]."/0"); ?>">Activo</a>                                        
                                                <?php
                                                break;

                                                case 0:   ?> 
                                                    <a href="<?php echo site_url("usuarios/cambiaestado/".$i["usuario_id"]."/1"); ?>">Inactivo</a>                                            
                                                    <?php
                                                break;
                                            }
                                    }
                                        
                                        ?>
                                    </td>
                                    <td class="text-right">
                                    <a href="<?php echo site_url("usuarios/editar/".$i["usuario_id"]); ?>" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                
                                    
                                
                            <?php } ?>
                        </tbody>
                    </table>

                <?php }else{ ?>

                    <div class="alert alert-info" role="alert">no hay </div>

                <?php } ?>
            </div>
        </div>