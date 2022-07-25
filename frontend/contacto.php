<?php
include('includes/conexion.php');
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $mensaje=$_POST['mensaje'];

    echo $nombre, $apellido, $correo, $telefono, $mensaje;
    
    $insertarMensaje = $pdo->prepare("INSERT INTO `contacto` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `mensaje`) 
    VALUES (NULL, :NOMBRE, :APELLIDO, :CORREO, :TEL, :MENSAJE);");

    $insertarMensaje->bindParam(':NOMBRE',$nombre);
    $insertarMensaje->bindParam(':APELLIDO',$apellido);
    $insertarMensaje->bindParam(':CORREO',$correo);
    $insertarMensaje->bindParam(':TEL',$telefono);
    $insertarMensaje->bindParam(':MENSAJE',$mensaje);
    
    $insertarMensaje->execute();
    header('Location: index.php');
?>