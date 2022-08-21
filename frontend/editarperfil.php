<?php
include('includes/conexion.php');
include('includes/loginValidate.php');
// Obtener los valores del formulario y guardarlo en variables
$name = $_POST['name'];
$email = $_POST['email'];
$tellphone = $_POST['tellphone'];
$password = $_POST['password'];

    $sessionUser = $_SESSION['user'];
    $idUser = $sessionUser['id_usuarios'];


$foto = $_FILES['photo'];//Array qué contiene tres valores, trae el nombre y el tipo

$tmp_name = $foto['tmp_name'];

$img_file = $foto['name'];
$img_type = $foto['type'];
$foldImage = "../public/img";
$destino = $foldImage . '/' . $img_file;
//Me valida si existe el formato de imagen
    if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))){
        
        $updateUser = $pdo->prepare("UPDATE `usuarios` SET `nombre` = :NOMBRE, `correo` = :CORREO, 
        `telefono` = :TELEFONO, `contraseña` = :CONTRASENIA, 
        `imagen_usuario` = :FOTO WHERE `usuarios`.`id_usuarios` = :ID"); 
        
        $updateUser->bindParam(':NOMBRE',$name);
        $updateUser->bindParam(':CORREO',$email);
        $updateUser->bindParam(':TELEFONO',$tellphone);
        $updateUser->bindParam(':CONTRASENIA',$password);
        $updateUser->bindParam(':FOTO',$destino);
        $updateUser->bindParam(':ID',$idUser);

        $updateUser->execute();
        session_start();
        session_destroy();
        header('Location: index.php');
        if(move_uploaded_file($tmp_name, $destino)){
            return true;
        }
        
    }
    return false;
?>