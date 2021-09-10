<?php include('includes/header.php');?>

<!-- SLIDER SHOW OR CARROUSEL -->
<div class="container-slider">
    <div class="slider" id="slider">
        <!-- IMAGENES DEL SLIDER -->
        <div class="slider-section">
            <img src="img/carrousel4.jpg" class="slider-img">
        </div>
        <div class="slider-section">
            <img src="img/carrousel2.jpg" class="slider-img">
        </div>
        <div class="slider-section">
            <img src="img/carrousel3.jpg" class="slider-img">
        </div>
        <!-- BOTONES DEL SLIDER LEFT AND RIGHT -->
        </div>
            <div class="slider-btn slider-btn-left" id="btn-left">&#60;</div>
            <div class="slider-btn slider-btn-right" id="btn-right">&#62;</div>
        </div>
</header>

<!-- MAIN -->
<section class="section">
    <!-- TITULO -->
    <div class="title">
        <h1>Productos</h1>
    </div>

    <div class="product-center container">
        <!-- PREPARA Y ALMACENA LOS DATOS EN UNA VARIABLE -->
        <?php
            $sentencia=$pdo->prepare("SELECT * FROM `productos`");//VARIABLE PDO IN THE ARCHIVE OF CONEXION
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);//devuelve un array que contiene todo las filas de resultado
        ?>
        <!-- CICLO PARA MOSTRAR LOS PRODUCTOS  -->
        <?php foreach($listaProductos as $producto){ ?>
            <div class="product">
                <div class="product-header">
                    
                        <img title="<?php echo $producto['nombre_producto']; ?>"
                        src="<?php echo $producto['imagen_producto']; ?>"
                        alt="<?php echo $producto['nombre_producto']; ?>">
                    
                    <!-- ICONO DE AGREGAR AL CARRITO -->
                    <ul class="icons">
                        <a href="mostrar_carrito.php"><span><i class="bx bx-shopping-bag"></i></span></a>   
                    </ul>
                    <!-- DETALLES DEL PRODUCTO -->
                    <div class="product-footer">
                        <a href="#"><h3 class="item-title"><?php echo $producto['nombre_producto'];?> x 1000kg</h3></a>
                        <h5>Precio Ahora </h5>
                        <h4 class="price">$<?php echo $producto['precio_producto']." Kg";?></h4>
                        <!-- FORMULARIO PARA ENVIAR LA INFORMACIÓN ENCRIPTADA AL CARRITO DE COMPRAS -->
                        <form action="products.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_productos'],$COD, $KEY); ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'],$COD, $KEY); ?>">
                            <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($producto['imagen_producto'],$COD, $KEY); ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'],$COD, $KEY); ?>">
                            <input type="hidden" name="iva" id="iva" value="<?php echo openssl_encrypt($producto['iva'],$COD, $KEY); ?>">
                            <input type="hidden" name="impoconsumo" id="impoconsumo" value="<?php echo openssl_encrypt($producto['impoconsumo'],$COD, $KEY); ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,$COD, $KEY); ?>">
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
<?php include('includes/footer.php'); ?>   