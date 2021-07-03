<?php include('includes/header.php');?>
<?php include('carrito_compras.php');?>
</header>
<!-- MAIN -->
<main>
<section class="section featured">
    <div class="title">
        <h1>Nombre del Producto</h1>
    </div>
        <!-- BOTON PARA VOLVER A LA PAGINA DE LOS PRODUCTOS -->
        <form action="products.php" class="form-value">
              <input class="button-back" type="submit" value="Volver">
        </form>
        <!-- MUESTRA LOS PRODUCTOS GUARDADOS EN LA VARIABLE DE SESION -->
        <div class="container-main">
            <div class="container-img">
                <?php $imagen=openssl_decrypt($_POST['imagen'],$COD,$KEY);?>
                <img src="<?php echo $imagen;?>" alt="">
            </div>
            <div class="container-description">
                <div class="container-header">
                    <h1><?php $nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY); echo $nombre." x 1000 g"; ?></h1>
                    <h5>SystemFish | Código de producto: 1</h5>
                    <h3><b>Características principales:</b> <?php echo "llevea a tu casa lo mejor en frutas y hortalizas, han sido seleccionadas y clasificadas con los estándares de calidad que te mereces.";  ?></h3>
                </div> <hr>
                <div class="container-body">
                <h3 class="precioOne">Precio Ahora: $ <?php $precio=openssl_decrypt($_POST['precio'],$COD,$KEY); echo number_format($precio);  ?></h3>
                <h4>Iva:<?php $iva=openssl_decrypt($_POST['iva'],$COD,$KEY); 
                $iva = ($iva*$precio)/100; echo $iva;  ?></h4>
                <form action="" method="post">
                    <input type="number" placeholder="<?php $cantidad=openssl_decrypt($_POST['cantidad'],$COD,$KEY); echo $cantidad; ?>" 
                    value="<?php $cantidad=openssl_decrypt($_POST['cantidad'],$COD,$KEY);?>">
                </form>
                <h4>Cantidad:<?php $cantidad=openssl_decrypt($_POST['cantidad'],$COD,$KEY); echo $cantidad; ?></h4>
                <h4>Impoconsumo:<?php $impoconsumo=openssl_decrypt($_POST['impoconsumo'],$COD,$KEY); 
                $impoconsumo= ($impoconsumo*$precio)/100; echo $impoconsumo;  ?></h4>
                
                <h4>Total:<?php echo number_format($total1=$precio * $cantidad+$iva+$impoconsumo); 
                $total = 0;
                $total= $total + ($total1 * $cantidad);?></h4>
                <!-- BOTÓN PARA VALIDAR LA COMPRA -->
                <form action="" class="form-value">
                        <input class="button" type="submit" value=">> Confirmación de la compra <<">
                    </form> 
                </div>
                <div class="container-footer">
                    <h1><?php $nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY); echo $nombre; ?></h1>
                    <h3>Descripción:<?php  ?></h3>
                </div>
                    
            </div>
                        
            
            
        
            
        </div>   
</section>
<section class="section featured">
    <center><h1>También te podría interesar</h1></center>
    <div class="product-center container">
        
        <!-- PREPARA Y ALMACENA LOS DATOS EN UNA VARIABLE -->
        <?php
            $sentencia=$pdo->prepare("SELECT * FROM `productos`");//VARIABLE PDO IN THE ARCHIVE OF CONEXION
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <!-- CICLO PARA MOSTRAR LOS PRODUCTOS  -->
        <?php foreach($listaProductos as $producto){ ?>
            <div class="product">
                <div class="product-header">
                    <div class="product-img">
                        <img title="<?php echo $producto['nombre_producto']; ?>"
                        src="<?php echo $producto['imagen_producto']; ?>"
                        alt="<?php echo $producto['nombre_producto']; ?>">
                    </div>
                    <!-- ICONO DE AGREGAR AL CARRITO -->
                    <ul class="icons">
                        <a href="mostrar_carrito.php"><span><i class="bx bx-shopping-bag"></i></span></a>   
                    </ul>
                    <!-- DETALLES DEL PRODUCTO -->
                    <div class="product-footer">
                        <a href="#"><h3 class="item-title"><?php echo $producto['nombre_producto'];?></h3></a>
                        <h4 class="price">$<?php echo $producto['precio_producto']." Kg";?></h4>
                        <!-- FORMULARIO PARA ENVIAR LA INFORMACIÓN ENCRIPTADA AL CARRITO DE COMPRAS -->
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_productos'],$COD,$KEY); ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'],$COD,$KEY); ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'],$COD,$KEY); ?>">
                            <input type="hidden" name="iva" id="iva" value="<?php echo openssl_encrypt($producto['iva'],$COD,$KEY); ?>">
                            <input type="hidden" name="impoconsumo" id="impoconsumo" value="<?php echo openssl_encrypt($producto['impoconsumo'],$COD,$KEY); ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,$COD,$KEY); ?>">
                            <button class="button-product" 
                            type="submit" 
                            name="btnAccion" 
                            value="Agregar">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

</main>  
<?php include('includes/footer.php'); ?>