
    <div class="col-md-2">
    

        <div class="list-group">
            <?php foreach ($categorias as $c) {
                if ($categoria_seleccionada == $c["categoria_id"]) {
                    $nombre_categoria = $c["categoria"];
                    $categoria_activa = " active";
                } else {
                    $categoria_activa = "";
                }
            ?>
                <a href="<?php echo site_url("catalogo/categoria/" . $c["categoria_id"]); ?>" class="list-group-item list-group-item-action<?php echo $categoria_activa; ?>"><i class="bi bi-boxes"></i> <?php echo $c["categoria"]; ?></a>
                <?php } ?>
        </div>
    </div>
    <div class="col-md-9">
        <h1>Welcome to <?php echo $nombre_categoria; ?></h1>
        <?php //$archivos = glob("assets/img/*.jpg");
        if ($c["categoria_id"] == 0 ) { //buscar en articulos categoria id
      ?>
        <div class="col-md">
          <br>
          <div class="alert alert-primary">It looks like we don't have any <?php echo $nombre_categoria; ?> to display</div>
        </div> <?php
              } else {
                foreach ($articulos as $a) { ?>
          <div class="col-md-3">
            <!-- con col-md-numero acomodamos en este caso las imagemes em 3 lugares y la hacemos responsive con sm tmb -->
            <div class="card">
              <div class="card-body">
                <p><img src="data:image/png;base64, <?php echo base64_encode($a["img"]); ?>" class="img-thumbnail vista"></p> <!-- data-toggle="modal" es el disparador -->
                <p class="text-center"><?php echo $a["articulo"]; ?> <br>
                <p class="text-center"><?php echo $a["precio"]; ?> $ </p> 
                <span class="float-right"><a href=""><i class="bi bi-heart"></i></a></span></p>
              </div>
            </div>
          </div>
      <?php }
                // print_r($archivo);
              }
      ?>
        <!--
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Article</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Seller</th>
                </tr>
            </thead>
            <tbody>
                <?php //foreach ($articulos as $a) { ?>
                    <tr>
                        <td><?php //echo $a["articulo"] ?></td>
                        <td><?php // echo $a["descripcion"] ?></td>
                        <td><?php // echo $a["precio"] ?> $</td>
                        <td><?php // echo $a["articulo_id"] ?></td>
                    </tr>
                <?php // }; ?>
            </tbody>
        </table> -->
    </div>