<?php
    require_once('conexion.php');
    require_once('includes/loginValidate.php'); 
    require_once('includes/dateUser.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="William sanchez">
    <meta name="description" content="Tienda virtual piscicultora">
    <meta name="aplication-name" content="System fish">
    <meta name="keywords" content="tolifish, mojarra ibagué, comprar mojarra, mojarra roja">
    <title>Toli Fish</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="../public/img/icon_tolifish.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- BOX ICONS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="script/login.js"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- HEADER -->
    <header id="home" class="header">
        <!-- MENÚ DE NAVEGACIÓN -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <a href="index.php"><img src="../public/img/icon_tolifish.png" alt="tolifish logo"></a> 
                </div>
                <!-- LOGO -->
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>fish</h1>
                        </div>
                        <div class="close">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>
                    <!-- LISTA DE NAVEGACIÓN -->
                    <ul class="nav-list">
                        <li class="nav-item"><a href= "index.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item"><a href= "index.php#product" class="nav-link">Productos</a></li>
                        <li class="nav-item"><a href="pedidos.php" class="nav-link">Pedidos</a></li>
                        <li class="nav-item"><a href="index.php#contact" class="nav-link">Contacto</a></li>
                        <li class="nav-item"><a href="index.php#about" class="nav-link">Acerca de</a></li>
                        <li class="nav-item">
                            <a class="shopping-car" id="shoppingcart-open">
                                <span class="shopping-car__icon-car">
                                <i class='bx bxl-shopify'></i>
                                </span>
                                <span class="shopping-car__count-items"><?= (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?></span>
                            </a>
                        </li>
                        <li class="nav-item"><?php iconoDeAccesoUsuario(); ?></li>
                    </ul>
                <!-- CARRITO DE COMPRAS ICONO-->
                </div><a id="open-shoppingcart-phone" class="cart-icon"><i class='bx bxs-shopping-bag'></i></a>
                <!-- ICONO DEL MENÚ PARA EL MOVIL -->
                <div class="hamburguer"><i class='bx bx-menu'></i></div>
            </div>
        </nav>
        <!-- CARRITO DE COMPRAS -->
        <div class="overlay-carrito" id="overlay-shoppincart">
            <div class="shopping-title-header">
                <div class="container-shoppingcart">
                     <span class="shoppingcart-cerrar" id="shoppingcart-close"><i class='bx bxs-x-circle'></i></span>       
                </div>
                <img src="../public/img/bienes.png" alt=""><h1>Carrito</h1> 
            </div>
            <div class="popup-carritocompras" id="popup-shoppingcart">
                <!-- ESPACIO PARA AGREGAR LOS PRODUCTOS EN EL CARRITO -->
            </div>
            <div class="footer-shoppingcart">
                <div class="text-shoppingcartfooter">
                    <div class="text-pay">
                        <h4>Subtotal: <h4>
                        <h4>Descuento: <h4>
                        <h4>Total: <h4>
                    </div>
                    <div class="price-pay" id="pricepaytotal">
                        <!-- escribir esos h4 con el innerHTML -->
                    </div>
                </div>
                <div class="confirm-pay">
                    <a href="mostrar_carrito.php" id="processpay">Proceder a pagar</a>
                </div>
            </div>
        </div>
        <!-- PERFIL DE USUARIO -->
        <div class="overlay-user" id="overlay-user">
            <div class="popup-user" id="popup-user">
                <div class="container-btn-close">
                     <span class="btn-close-popup" id="close-popup-user"><i class='bx bxs-x-circle'></i></span>       
                </div>
                <div class="header-profile-user">
                    <div class="user-image">
                        <img src="<?php echo resultadoDatosUsuario()[1]; ?>" alt="imagen usuario">
                   </div> 
                    <div class="user-name">
                        <h3><?php echo resultadoDatosUsuario()[2]; ?></h3>
                    </div>
                </div>
                <div class="content-profile-user">
                    <div class="access-profile">
                        <a href="edituser.php"><i class='bx bx-edit'></i><h4> Editar usuario</h4></a>
                    </div>
                    <div class="access-profile">
                        <a href="pedidos.php"><i class='bx bx-history' ></i><h4> Historial</h4></a>
                    </div>
                    <div class="access-profile">
                        <a href=""><i class='bx bxs-check-shield' ></i><h4> Politicas y privacidad</h4></a>
                    </div>
                    <div class="access-profile">
                        <a href="includes/signout.php"><i class='bx bx-exit' ></i><h4> Cerrar sesión</h4></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- INICIO DE SESIÓN -->
        <div class="overlay" id="overlay">
            <div class="popup" id="popup">
                <div class="btn-cerrar">
                   <span id="btn-cerrar-popup" class="btn-cerrar-popup"><i class='bx bxs-x-circle'></i></span>
                </div>
                <div class="popup-header">
                   <h3>Iniciar sesión</h3> 
                </div>
                <form action="includes/loginValidate.php" class="form-login" method="POST" id="formRegister">
                    <div class="field email">
                        <div class="input-area">
                            <input type="text" placeholder="Cuenta" name="user" id="cuenta-user">
                            <i class="icon fas fa-user-tie"></i>
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                        </div>
                        <div class="error error-text">El campo está vacío</div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input type="password" placeholder="Contraseña" name="password" id="cuenta-clave">
                            <i class="icon fas fa-lock"></i>
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                        </div>
                        <div class="error error-text">El campo está vacío</div>
                    </div>
                    <div class="pass-link">
                        <a href="#">Olvidaste tú contraseña?</a>
                    </div>
                    <input type="submit" value="Entrar" name="register" id="btn-login">
                </form>
                <div class="signup-link">No tienes cuenta?
                    <a href="register.php">Regístrate ahora</a>
                </div>
            </div>
        </div>