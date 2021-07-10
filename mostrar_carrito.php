<?php include("includes/header.php");?> 
<?php include("carrito_compras.php");?>
</header>
<main>
    <section class="section featured">
        <!-- TITULO -->
        <div class="title">
            <h1>Carrito de compras</h1>
        </div>
        <!-- BOTON PARA VOLVER A LA PAGINA DE LOS PRODUCTOS -->
        <form action="products.php" class="form-value">
              <input class="button-back" type="submit" value="Volver">
        </form>
        <!-- MUESTRA LOS PRODUCTOS GUARDADOS EN LA VARIABLE DE SESION -->
        <div>
            <?php if(!empty($_SESSION['CARRITO'])){// <- VERIFICA SI LA VARIABLE DE SESIÓN ESTÁ VACÍA?>
            <div>
                <table>
                    <thead class="table-top">
                        <!-- ENCABEZADO DE LA TABLA DEL CARRITO-->
                        <tr>
                            <td data-titulo="producto" class="top">Producto</td>
                            <td data-titulo="cantidad" class="top">Cantidad</td>
                            <td data-titulo="precio" class="top">Precio</td>
                            <td data-titulo="iva" class="top">Iva</td>
                            <td data-titulo="impoconsumo" class="top">impoconsumo</td>
                            <td data-titulo="total" class="top">Total</td>
                            <td data-titulo="accion" class="top">--</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- CICLO PARA MOSTRAR LOS PRODUCTOS GUARDADOS EN LA VARIABLE DE SESION -->
                        <?php $total=0; ?>
                        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                        <tr>
                            <td data-titulo="Producto:"><?php echo $producto['NOMBRE'];?></td>
                            <td data-titulo="Cantidad:"><?php echo $producto['CANTIDAD'];?></td>
                            <td data-titulo="Precio:"><?php echo $producto['PRECIO']?></td>
                            <td data-titulo="Iva:"><?php echo $producto['IVA']."%"?></td>
                            <td data-titulo="Impoconsumo:"><?php echo $producto['IMPOCONSUMO']."%"?></td>
                            <td data-titulo="Total:"><?php $iva = ($producto['IVA']*$producto['PRECIO'])/100* $producto['CANTIDAD']; 
                            $impoconsumo= ($producto['IMPOCONSUMO']*$producto['PRECIO'])/100 * $producto['CANTIDAD'];
                            echo number_format($total1=($producto['PRECIO'] * $producto['CANTIDAD'])+$iva+$impoconsumo);?></td>
                            <!-- FORMULARIO QUÉ ENVÍA INFORMACIÓN A LA VARIABLE DE SESIÓN -->
                            <td> 
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],$COD,$KEY);?>">
                                    <!-- BOTÓN QUÉ VALIDA LA ELIMINACIÓN DE PRODUCTOS -->
                                    <button class="btn btn-danger" type="submit" name="btnAccion" 
                                    value="Eliminar"><i class='bx bxs-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- HACE LA SUMA TOTAL DE TODOS LOS PRODUCTOS -->
                        <?php $total= $total + $total1;?>        
                        <?php } ?> <!-- FIN DEL CICLO -->
                        <!-- MUESTRA EL PRECIO TOTAL -->
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td> </td>
                            <td> </td>
                            <td>$<?php echo number_format($total);?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- BOTÓN PARA VALIDAR LA COMPRA -->
                <div class="button-car">
                    
                   <a href="">
                   <button class="button" type="submit">Comprar</button>
                   </a>     
                    
                   
                </div>
            </div>
        </div>
            <?php  }  else{ ?>
                <div class="alert">
                    No hay productos en el carrito de compras
                </div>
            <?php } ?>
    </section>
</main>
<?php include("includes/footer.php");  ?>