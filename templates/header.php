<?php include("config.php");  
 include('conexion.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toli Fish</title>
    <!-- FAVICON -->

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Box Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <header id="home" class="header">
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <h1>Tolifish</h1>
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>Tolifish</h1>
                        </div>
                        <div class="close">
                            <i class='bx bx-x'></i>
                        </div>
                    </div>
    
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="products.php" class="nav-link">Productos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="pedidos.php" class="nav-link">Pedidos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="contacto.php" class="nav-link">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a href="acercade.php" class="nav-link">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a href="mostrar_carrito.php" class="nav-link icon-one"><i class='bx bxs-shopping-bag'></i>
                            <span class="cart-count"> <b><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?></b></span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="iniciarSesion.php" class="nav-link icon-two"> <i class='bx bx-user-circle'></i></i></a>
                        </li>
                    </ul>
                </div>
            
                        <a href="mostrar_carrito.php" class="cart-icon"><i class='bx bxs-shopping-bag'></i></a>
                
                
                <div class="hamburguer">
                    <i class='bx bx-menu'></i>
                </div>
            </div>
        </nav>