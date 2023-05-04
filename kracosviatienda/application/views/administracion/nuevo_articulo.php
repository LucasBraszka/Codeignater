
<div class="col-11">
    <h1 class="text-center">New article</h1>
    <form method="post" action="<?php echo site_url("articulos/nuevo"); ?>">
        <div class="form-group col">
            <label for="articulo">Article's name</label>
            <input type="text" name="articulo" class="form-control" value="<?php echo set_value("articulo") ?>" id="">
            <?php echo form_error("articulo", '<small class="text-danger">', "</small>") ?>
            <small id="" class="form-text text-muted"></small>
        </div>
        <div class="form-group col">
            <label for="descripcion">Description</label>
            <textarea class="form-control" name="descripcion" value="<?php echo set_value("descripcion") ?>"></textarea>
            <?php echo form_error("description", '<small class="text-danger">', "</small>") ?>
        </div>
        <div class="form-row">
        <div class="form-group col">
            <label for="precio">Price</label>
            <input type="text" name="precio" class="form-control" value="<?php echo set_value("precio") ?>" id="">
            <?php echo form_error("precio", '<small class="text-danger">', "</small>") ?>
            <small id="" class="form-text text-muted"></small>
        </div>
        <div class="form-group col">
            <label for="stock_actual">Stock</label>
            <input type="text" name="stock_actual" class="form-control" value="<?php echo set_value("stock_actual") ?>" id="">
            <?php echo form_error("stock_actual", '<small class="text-danger">', "</small>") ?>
            <small id="" class="form-text text-muted"></small>
        </div>
        <div class="form-group col">

        <?php $opcion_seleccionada = set_value('categoria_id'); ?>
        <label for="categoria">Category</label>
        <select class="form-control" name="categoria_id">
        <option selected>Choose...</option>
            <?php foreach ($categorias as $c) {
                if ($categoria_seleccionada == $c["categoria_id"]) {
                    $nombre_categoria = $c["categoria"];
                    $categoria_activa = " active";
                } else {
                    $categoria_activa = "";
                }
            ?>
            <option value="<?php echo $c["categoria_id"]; ?>" <?php echo ($opcion_seleccionada == $c["categoria_id"]) ? 'selected' : ''; ?>><?php echo $c['categoria']; ?></option>
            <?php  } ?>
        </select>
            <?php echo form_error("categoria_id", '<small class="text-danger">', "</small>") ?>
        </div>

        </div><!--
        <div class="custom-file form-group">
            <input type="file" class="custom-file-input" id="">
            <label class="custom-file-label" for="articulo_imagen" data-browse="Upload">Load some pictures</label>
        </div>
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Active</label>
        </div> -->
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>