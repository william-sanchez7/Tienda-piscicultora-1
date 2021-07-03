<?php include('includes/header.php'); ?>
<section class="section featured">
    <!-- NOMBRE DEL PRODUCTO -->
    <div class="title">
        <h1>Nombre del Producto</h1>
    </div>
        <!-- BOTON PARA VOLVER A LA PAGINA DE LOS PRODUCTOS -->
        <form action="products.php" class="form-value">
              <input class="button-back" type="submit" value="Volver">
        </form>
        <!-- MUESTRA LOS PRODUCTOS GUARDADOS EN LA VARIABLE DE SESION -->
        <div>
            <?php if(!empty($_SESSION['CARRITO'])){// <- VERIFICA SI LA VARIABLE DE SESIÓN ESTÁ VACÍA?>
            <!-- CICLO PARA MOSTRAR LOS PRODUCTOS GUARDADOS EN LA VARIABLE DE SESION -->
            <?php $total=0; ?>
                        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
            <div>
                <img src="<?php echo $producto['CANTIDAD'];?>" alt="">
            </div>
            <div>
                <?php echo $producto['NOMBRE'];?>
                    <?php echo $producto['CANTIDAD'];?>
                    <?php echo $producto['PRECIO']?>
                    <?php echo $producto['IVA']."%"?>
                    <?php echo $producto['IMPOCONSUMO']."%"?>
                    <?php $iva = ($producto['IVA']*$producto['PRECIO'])/100; 
                    $impoconsumo= ($producto['IMPOCONSUMO']*$producto['PRECIO'])/100;
                    echo number_format($total1=$producto['PRECIO'] * $producto['CANTIDAD']+$iva+$impoconsumo);?>
                        
                    <!-- HACE LA SUMA TOTAL DE TODOS LOS PRODUCTOS -->
                    <?php $total= $total + ($total1 * $producto['CANTIDAD']);?>        
                    <?php } ?> <!-- FIN DEL CICLO -->
                    <!-- MUESTRA EL PRECIO TOTAL -->
                    $<?php echo number_format($total);?>
                  
                <!-- BOTÓN PARA VALIDAR LA COMPRA -->
                <div class="button-car">
                    <form action="" class="form-value">
                        <input class="button" type="submit" value=">> Confirmación de la compra <<">
                    </form> 
                </div>
            </div>
        
            <?php } else{ ?>
                <div class="alert">
                    No hay productos en el carrito de compras
                </div>
            <?php } ?>
        </div>   
                
               
               
            
</section>
<?php include('includes/footer.php'); ?>