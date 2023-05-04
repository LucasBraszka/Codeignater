<!doctype html>
<html lang="es">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Lista de Compras</title>
           
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br>
                <h1 class="text-center">Ingreso al Sistema</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                        <div class="card">
                                <div class="card-body">
                                    
                                            <?php 
                                                switch($this->session->flashdata("OP")){
                                                    case "ERROR": ?>
                                                            <div class="alert alert-danger">
                                                            datos incorrectos
                                                            </div> <?php
                                                        break;
                                                    case "NO"?>
                                                            <div class="alert alert-danger">
                                                            no logeado
                                                            </div> <?php
                                                        break;
                                                    case "INACTIVO":?>
                                                            <div class="alert alert-danger">
                                                            usuario desactivado
                                                            </div> <?php
                                                        break;
                                                }
                                            ?>
                                    
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="usuario"> Usuario </label>
                                                    <input type="text" class="form-control" name="usuario">  
                                                    <?php echo form_error("usuario","<small class='text-danger'>","</small"); ?>
  
                                                </div>
                                                <div class="form-group">
                                                    <label for="password"> Contraseña </label>
                                                    <input type="password" class="form-control" name="password">
                                                    <?php echo form_error("password","<small class='text-danger'>","</small"); ?>                                                    
                                                </div>
                                                <br>
                                            <button type="submit" class="btn btn-primary" name="boton">Ingresar</button>
                                        </form>
                                </div>
                        </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>