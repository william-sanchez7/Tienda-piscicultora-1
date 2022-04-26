<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
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
    
        $_SESSION['user'] = $usuario;
    
       
        header('location: ../index.php');
}else{
   ?>
    <script type="text/javascript"> 
       
    </script>
   <?php
}


?>
</body>
</html>
