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
<section class="section" id="product">
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
                        <h4 class="price">$
                            <?php 
                            $precio= $producto['precio_producto'];
                            $subIva=$producto['iva']; 
                            $iva = ($subIva*$precio)/100; 
                            $subImpoconsumo=$producto['impoconsumo'];
                            $impoconsumo= ($subImpoconsumo*$precio)/100; 
                            $subTotal=$precio+$iva+$impoconsumo;
                            echo number_format($subTotal)." Kg";?></h4>
                        <!-- FORMULARIO PARA ENVIAR LA INFORMACIÓN ENCRIPTADA AL CARRITO DE COMPRAS -->
                        
                    </div>
                    <form action="products.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $producto['id_productos']; ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre_producto']; ?>">
                            <input type="hidden" name="imagen" id="imagen" value="<?php echo $producto['imagen_producto']; ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $subTotal; ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                            <button class="button-product" 
                            type="submit" 
                            name="btnAccion"
                            >Comprar</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<section class="section contactUs" id="contact">
        <div class="title">
            <h1>Contáctenos</h1>
        </div>
        <div class="box">
            <!-- Formulario de contacto -->
            <div class="contact form">
                <h3>Enviar un mensaje</h3>
                <form action="contacto.php" method="POST">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>Nombre</span>
                                <input type="text" name="nombre" id="" placeholder="john">
                            </div>
                            <div class="inputBox">
                                <span>Apellidos</span>
                                <input type="text" name="apellido" id="" placeholder="Doe">
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <span>Correo</span>
                                <input type="email" name="correo" id="" placeholder="johnDoe12@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>Telefono</span>
                                <input type="text" name="telefono" id="" placeholder="+57 3223454312">
                            </div>
                        </div>
                        
                        <div class="row100">
                            <div class="inputBox">
                                <span>Mensaje</span>
                                <textarea placeholder="Escribe tú mensaje aqui..." name="mensaje"></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Caja de información --> 
            <div class="contact info">
                <h3>Información de contacto</h3>
                <div class="infoBox">
                    <div>
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <p>Tolima, Ibagué<br>COLOMBIA</p>
                    </div>
                    <div>
                        <span><i class="fas fa-envelope"></i></span>
                        <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank">lorem@gmail.com</a>
                    </div>
                    <div>
                        <span><i class="fas fa-phone-alt"></i></span>
                        <a href="tel:+57 3123232424">+57 3122323242</a>
                    </div>
                    <!-- Redes sociales -->
                    <ul class="sci">
                        <li><a href="https://es-la.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i> </a></li>
                        <li><a href="https://www.instagram.com/?hl=es" target="_blank"><i class="fab fa-instagram"></i> </a></li>
                        <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i> </a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                    </ul>
                </div>
            </div>
            <!-- Mapa -->
            <div class="contact map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d127295.
                76612158972!2d-75.2568187411721!3d4.412457376919026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!5e0!3m2!1ses!2sco!4v1636076053088!5m2!1ses!2sco" 
                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
</section>

<section class="section about" id="about">
    <div class="title">
    <h1>Quienes somos</h1>
    </div>
        <div class="about-section">
            
            <div class="inner-container">
            
                <h1>Toli fish</h1>
                <p class="text">Empresa piscicultora en ibagué con gran participación en el comercio en ventas de mojarra roja
                        y otros diferentes tipos de pez, en los cuales nos basamos en dar la mejor calidad y sabor al pescado
                        con perservación de la carne y su sabor natural. <br>
                        Nuestros productos son distribuidos a muchas comerciantes de mercados, en los cuales están satisfechos
                        con nuestra calidad de servicios y producción.
                </p>
                <p class="text">Contamos con diversos aliados para la compra de nuestros productos, de los cuales se destacan 
                los comercializadores de mercadería u personas de emprendimiento local. <br>
                Compañía ubicada en el sector (ingrse vereda) del cual cuenta con el ambiente adecuado para producir pescados
                en gran cantidad para su comercialización a nivel regional.
                </p>
            </div>
            
        </div>
        <div class="container-comments">
            <h1 class="heading"> <span>Cónoce</span> Nuestros clientes</h1>
            <div class="profiles">
                <div class="profile">
                    <img src="img/perf1.jpg" alt="" class="profile-img">
                    <h3 class="user-name">Isabella</h3>
                    <h5>Comprardora local</h5>
                    <p>Reconozco los esfuerzos de Tolifish en la calidad de sus productos, los cuales me ha permitido ofrecerles a mis clientes un pescado de calidad</p>
                </div>
                <div class="profile">
                    <img src="img/perfil2.jpg" alt="" class="profile-img">
                    <h3 class="user-name">William</h3>
                    <h5>Comprador comercial</h5>
                    <p>Lo qué mas me gusta de Tolifish es su gestión de entregas de sus productos, siempre rápido y correctas las entregas</p>
                </div>
                <div class="profile">
                    <img src="img/perfil3.jpg" alt="" class="profile-img">
                    <h3 class="user-name">Martha</h3>
                    <h5>Distribuidora regional</h5>
                    <p>Tolifish ha demostrado gran responsabilidad en la entrega de sus productos y en su garantía de éstos mismos. Mis clientes les agrada y yo estoy satisfecha.</p>    
                </div>
            </div>
            
        </div>
</section>


<?php include('includes/footer.php'); ?>   