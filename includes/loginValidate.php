<?php
include('conexion.php');
if(isset($_POST['register'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
}

$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sentencia = $pdo -> prepare("SELECT * FROM `usuarios` WHERE usuario=:USER and contraseña=:CLAVE");
$sentencia->bindParam(':USER',$user);
$sentencia->bindParam(':CLAVE',$password);
$sentencia->execute();
$usuario = $sentencia -> fetch(PDO::FETCH_ASSOC);



$numeroRegistros = $sentencia->rowCount();
session_start();
if($numeroRegistros>=1){
    header('location: ../index.php');
    $_SESSION['user'] = $usuario;
}else{
    
}


?>