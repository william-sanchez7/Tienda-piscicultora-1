<?php include("config.php");?>  
<?php include('conexion.php');?>
<?php include('carrito_compras.php'); ?>

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="img/icon_tolifish.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- BOX ICONS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- CUSTOM STYLESHEET -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- HEADER -->
    <header id="home" class="header">
        <!-- MENÚ DE NAVEGACIÓN -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <a href="index.php"><img src="img/icon_tolifish.png" alt="tolifish logo"></a> 
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
                        <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item"><a href="index.php#product" class="nav-link">Productos</a></li>
                        <li class="nav-item"><a href="pedidos.php" class="nav-link">Pedidos</a></li>
                        <li class="nav-item"><a href="index.php#contact" class="nav-link">Contacto</a></li>
                        <li class="nav-item"><a href="index.php#about" class="nav-link">Acerca de</a></li>
                        
                        
                        <li class="nav-item">
                            <a href="mostrar_carrito.php" class="nav-link icon-one">
                            <i class="fas fa-shopping-cart"></i>
                                <!-- MUESTRA EL CONTADOR DEL CARRITO DE COMPRAS -->
                                <span class="car-count">
                                <p><?= (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?></p>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item"><?php if(isset($_SESSION)){?>
                            <a href="#" class="btn-user"><i class="fas fa-house-user"></i></a><?php 
                        }else{ ?><a href="#" class="btn-abrir-popup" id="btn-abrir-popup"><i class="fas fa-user-circle"></i></a><?php }?></li>
                    </ul>
                <!-- CARRITO DE COMPRAS -->
                </div><a href="mostrar_carrito.php" class="cart-icon"><i class='bx bxs-shopping-bag'></i></a>
                <!-- ICONO DEL MENÚ PARA EL MOVIL -->
                <div class="hamburguer"><i class='bx bx-menu'></i></div>
            </div>
        </nav>


        <!-- Login -->
        <div class="overlay" id="overlay">
            <div class="popup" id="popup">
                <div class="btn-cerrar">
                   <span id="btn-cerrar-popup" class="btn-cerrar-popup"><i class='bx bxs-x-circle'></i></span>
                </div>
                
                <div class="popup-header">
                   <h3>Iniciar sesión</h3> 
                </div>
                <form action="#" class="form-login" method="POST" id="formRegister">
                    <div class="field email">
                        <div class="input-area">
                            <input type="text" placeholder="Cuenta" name="user">
                            <i class="icon fas fa-user-tie"></i>
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                        </div>
                        <div class="error error-text">El campo está vacío</div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input type="password" placeholder="Contraseña" name="password">
                            <i class="icon fas fa-lock"></i>
                            <i class="error error-icon fas fa-exclamation-circle"></i>
                        </div>
                        <div class="error error-text">El campo está vacío</div>
                    </div>
                    <div class="pass-link"><a href="#">Olvidaste tú contraseña?</a></div>
                    <input type="submit" value="Entrar" name="register">
                </form>
                <div class="signup-link">No tienes cuenta?<a href="register.php">Regístrate ahora</a></div>
            </div>
        </div>
  

   