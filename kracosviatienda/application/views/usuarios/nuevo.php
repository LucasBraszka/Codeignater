<div class="row">
            <div class="col-12">
                <h1>Nuevo Usuario
                    </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <br>
                <div class="card">
                    <div class="card-body">
                        <?php if($this->session->flashdata("OP")){ ?>
                            <div class="alert alert-success">
                                ¡Usuario Creado!
                            </div>
                        <?php } ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" name="usuario" class="form-control" value="<?php echo set_value("usuario") ?>">
                                <?php echo form_error("usuario", '<small class="text-danger">', "</small>") ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" value="<?php echo set_value("password") ?>">
                                <?php echo form_error("password", '<small class="text-danger">', "</small>") ?>
                            </div>
                            <div class="form-group">
                                <label for="conf-password">Confirmar Contraseña</label>
                                <input type="password" name="conf-password" class="form-control" value="<?php echo set_value("conf-password") ?>">
                                <?php echo form_error("conf-password", '<small class="text-danger">', "</small>") ?>
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select name="rol" class="form-control">
                                    <option value="1">Administradores</option>
                                    <option value="2" selected>Usuarios</option>
                                </select>
                            </div>
                            <button type="submit" name="boton" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>