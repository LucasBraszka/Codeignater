
<div class="col-md-11">
    <h3 class="text-center"><i class="bi bi-bag-plus"></i> Your sales !</h3><br>
    <button type="button" onclick="window.location.href='<?php echo site_url('articulos'); ?>'" class="btn btn-dark btn-block">Make a new sale</button><br>
   
    <?php if($this->session->flashdata("OK")){ ?>
                            <div class="alert alert-success text-center">
                                ¡New sale completed!
                            </div>
                            <?php } ?>
   <?php
        if($this->session->flashdata("OP")){ ?>
                            <div class="alert alert-success text-center">
                                ¡Sale deleted!
                            </div>
                        <?php } ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Description</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Delivery status</th> <!-- esta celda manda a otra pagina-->
                    <th scope="col">Pause sale</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $a){ ?>
                    <tr>
                        <td><?php echo $a["articulo"]; ?></td>
                        <td><?php echo $a["descripcion"]; ?></td>
                        <td><?php switch($a["estado"]){
                                    case 1:  
                                        echo "Activo";                                       
                                     break;
                                    case 0:    
                                        echo "Inactivo";                                            
                                    break;
                                            }
                                    
                                        
                                        ?></td>
                        <td>$<?php echo $a["precio"]; ?></td>
                        <td><?php echo $a["stock_actual"]; ?></td>
                        <td></td>
                        <td class="text-center"><a href=""><i class="bi bi-pause-circle"></i></a></td>
                        <td class="text-center"><a href=""><i class="bi bi-pencil-square"></i></a></td>
                        <td class="text-center"><a href="<?php echo site_url("articulos/baja/".$a["articulo_id"]) ?>"><i class="bi bi-trash3"></i></a></td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
        
    </div>
