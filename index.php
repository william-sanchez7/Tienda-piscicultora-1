<?php require_once('includes/header.php'); ?>  
        <!-- SE AGREGA EL CARROUSEL PARA MOSTRAR CONTENIDO PUBLICITARIO O PROMOCIONES -->
        <div class="container-slider">
            <div class="slider" id="slider">

                <div class="slider-section">
                    <img src="img/carrousel4.jpg" class="slider-img">
                </div>
                <div class="slider-section">
                    <img src="img/carrousel2.jpg" class="slider-img">
                </div>
                <div class="slider-section">
                    <img src="img/carrousel3.jpg" class="slider-img">
                </div>

                </div>
                    <div class="slider-btn slider-btn-left" id="btn-left"><i class='bx bxs-chevron-left'></i></div>
                    <div class="slider-btn slider-btn-right" id="btn-right"><i class='bx bxs-chevron-right'></i></div>
                </div>
            </div>
        </div>

    </header>
    <!-- MAIN -->
    <main>
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
                            
                                <img class="item-image" title="<?php echo $producto['nombre_producto']; ?>"
                                src="<?php echo $producto['imagen_producto']; ?>"
                                alt="<?php echo $producto['nombre_producto']; ?>">
                            
                            
                            <!-- DETALLES DEL PRODUCTO -->
                            <div class="product-footer">
                                <h3 class="item-title"><?php echo $producto['nombre_producto'];?> x 1000kg</h3>
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
                            <form >
                                    <input type="hidden" name="id" class="item-id" value="<?php echo $producto['id_productos']; ?>">
                                    <input type="hidden" name="nombre"  value="<?php echo $producto['nombre_producto']; ?>">
                                    <input type="hidden" name="imagen"  value="<?php echo $producto['imagen_producto']; ?>">
                                    <input type="hidden" name="precio"  value="<?php echo $subTotal; ?>">
                                    <input type="hidden" name="cantidad"  value="<?php echo 1; ?>">
                                    <button class="button-product" 
                                 
                                    
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
                                        <input type="text" name="nombre" placeholder="john">
                                    </div>
                                    <div class="inputBox">
                                        <span>Apellidos</span>
                                        <input type="text" name="apellido" placeholder="Doe">
                                    </div>
                                </div>

                                <div class="row50">
                                    <div class="inputBox">
                                        <span>Correo</span>
                                        <input type="email" name="correo" placeholder="johnDoe12@gmail.com">
                                    </div>
                                    <div class="inputBox">
                                        <span>Telefono</span>
                                        <input type="text" name="telefono" placeholder="+57 3223454312">
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
                       
                    </div>
                </div>
        </section>

        <section class="section about" id="about">
            <div class="title"><h1>Quienes somos</h1></div>
                
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
                    <h1 class="heading"><span>Cónoce</span> Nuestros clientes</h1>
                    
                    <div class="profiles">
                        <div class="profile">
                            <img src="img/perfil-mujer.jpg" alt="<a href='https://www.freepik.es/fotos/chicas-felices'>Foto de chicas felices creado por benzoix - www.freepik.es</a>" class="profile-img">
                            <h3 class="comment-user-name">Isabella</h3>
                            <h5>Comprardora local</h5>
                            <p>Reconozco los esfuerzos de Tolifish en la calidad de sus productos, los cuales me ha permitido ofrecerles a mis clientes un pescado de calidad</p>
                        </div>
                        <div class="profile">
                            <img src="img/william.jpg" alt="" class="profile-img">
                            <h3 class="comment-user-name">Fernando</h3>
                            <h5>Comprador comercial</h5>
                            <p>Lo qué mas me gusta de Tolifish es su gestión de entregas de sus productos, siempre rápido y correctas las entregas</p>
                        </div>
                        <div class="profile">
                            <img src="img/martha.jpg" alt="<a href='https://www.freepik.es/fotos/mujer-emprendedora'>Foto de mujer emprendedora creado por karlyukav - www.freepik.es</a>" class="profile-img">
                            <h3 class="comment-user-name">Martha</h3>
                            <h5>Distribuidora regional</h5>
                            <p>Tolifish ha demostrado gran responsabilidad en la entrega de sus productos y en su garantía de éstos mismos. Mis clientes les agrada y yo estoy satisfecha.</p>    
                        </div>
                    </div>
                </div>
        </section>
    </main>
<?php require('includes/footer.php'); ?>
    