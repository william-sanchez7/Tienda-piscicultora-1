<?php require_once('/././includes/mvc.php'); ?>
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
    <title>System Fish</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="img/icon_tolifish.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- BOX ICONS -->
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- CUSTOM STYLESHEET
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    /> -->
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
                        <li class="nav-item"><a href= "index.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item"><a href= "index.php#product" class="nav-link">Productos</a></li>
                        <li class="nav-item"><a href="pedidos.php" class="nav-link">Pedidos</a></li>
                        <li class="nav-item"><a href="index.php#contact" class="nav-link">Contacto</a></li>
                        <li class="nav-item"><a href="index.php#about" class="nav-link">Acerca de</a></li>
                        </li>
                        <li class="nav-item"><?php iconoDeAccesoUsuario(); ?></li>
                    </ul>
                <!-- CARRITO DE COMPRAS -->
                </div><a href="mostrar_carrito.php" class="cart-icon"><i class='bx bxs-shopping-bag'></i></a>
                <!-- ICONO DEL MENÚ PARA EL MOVIL -->
                <div class="hamburguer"><i class='bx bx-menu'></i></div>
            </div>
        </nav>

        <!-- Perfil de usuario -->
        <div class="overlay-user" id="overlay-user">
            <div class="popup-user" id="popup-user">
                <div class="container-btn-close">
                     <span class="btn-close-popup" id="close-popup-user"><i class='bx bxs-x-circle'></i></span>       
                </div>
                <div class="header-profile-user">
                    <div class="user-image"><img src="<?php echo resultadoDatosUsuario()[0]; ?>" alt="imagen usuario"></a>
                   </div> 
                    <div class="user-name"><h3><?php echo resultadoDatosUsuario()[1]; ?></h3></div>
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

  

   