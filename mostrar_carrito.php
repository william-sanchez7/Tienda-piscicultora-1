<?php include("includes/header.php");?> 

</header>
<main>
    <section class="section featured">
        <!-- TITULO -->
        <div class="title">
            <h1>Carrito de compras</h1>
        </div>
        <!-- BOTON PARA VOLVER A LA PAGINA DE LOS PRODUCTOS -->
        <button class="back-shop">
            <a href="index.php#product"><i class='bx bx-arrow-back' ></i></a>
        </button>
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
                            <td data-titulo="precio" class="top">Precio c/u</td>
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
                            <td data-titulo="Precio:"><?php echo number_format($producto['PRECIO'])?></td>
                            <td data-titulo="Total:"><?php 
                            echo number_format($subTotal=$producto['PRECIO'] * $producto['CANTIDAD']);?></td>
                            <!-- FORMULARIO QUÉ ENVÍA INFORMACIÓN A LA VARIABLE DE SESIÓN -->
                            <td> 
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],$COD,$KEY);?>">
                                    <!-- BOTÓN QUÉ VALIDA LA ELIMINACIÓN DE PRODUCTOS -->
                                    <button class="btn-delete" type="submit" name="btnAccion" 
                                    value="Eliminar"><i class='bx bxs-tag-x' ></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- HACE LA SUMA TOTAL DE TODOS LOS PRODUCTOS -->
                        <?php $total= $total + $subTotal;?>        
                        <?php } ?> <!-- FIN DEL CICLO -->
                        <!-- MUESTRA EL PRECIO TOTAL -->
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td>$<?php echo number_format($total);?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- BOTÓN PARA VALIDAR LA COMPRA -->
                <div class="button-car">
                    
                   <a href="#">
                   <button class="button" type="submit">Validar compra</button>
                   </a>     
                    
                   
                </div>
            </div>
        </div>
            <?php  }  else{ ?>
                <div class="alert">
                    No hay productos en el carrito de compras Error no hay variable de sesion iniciada
                </div>
            <?php } ?>
    </section>
</main>
<?php include("includes/footer.php");  ?>