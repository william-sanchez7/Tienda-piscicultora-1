<?php
include('conexion.php');
   //recibe el metodo post por defecto
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
        if(!session_id()) session_start();
        if($numeroRegistros>=1){
                $_SESSION['user'] = $usuario;
                if(isset($_POST['register'])){
                echo json_encode(array('success' => 1));
                }
        }else{
            if(isset($_POST['register'])){
                echo json_encode(array('success' => 0));
            }
        }
    

?>

