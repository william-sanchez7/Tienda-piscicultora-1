<?php
include('conexion.php');
$user = $_POST['user'];
$password = $_POST['password'];
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sentencia = $pdo -> prepare("SELECT * FROM `usuarios` WHERE usuario=:USER and contraseña=:CLAVE");
$sentencia->bindParam(':USER',$user);
$sentencia->bindParam(':CLAVE',$password);
$sentencia->execute();
$usuario = $sentencia -> fetch(PDO::FETCH_ASSOC);
if($usuario){
    $_SESSION['usuario'] = $usuario["usuario"];
    header('location: ../index.php');
    echo "<script> alert('Conectado perra'); </script>";
}else{
    echo "Contraseña o usuario incorrecto!";
}

?>