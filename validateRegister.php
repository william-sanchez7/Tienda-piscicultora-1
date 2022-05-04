<?php
    include('includes/conexion.php');
    // Obtener los valores del formulario y guardarlo en variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tellphone = $_POST['tellphone'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $rol = 1; //rol de usuario
    
    $foto = $_FILES['foto'];
    $tmp_name = $foto['tmp_name'];
    
    $img_file = $foto['name'];
    $img_type = $foto['type'];
    $foldImage = "img";

    if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) 
    || strpos($img_type, "png"))){

        $destino = $foldImage . '/' . $img_file;

        $insertUser = $pdo->prepare("INSERT INTO 
        `usuarios` (`id_usuarios`, `nombre`, `correo`, `telefono`, `usuario`, `contraseña`, `imagen_usuario`, `fk_rol`) 
        VALUES (NULL, :NOMBRE, :CORREO, :TELEFONO, :USUARIO, :CONTRASENIA, :FOTO, :ROL);");

        $insertUser->bindParam(':NOMBRE',$name);
        $insertUser->bindParam(':CORREO',$email);
        $insertUser->bindParam(':TELEFONO',$tellphone);
        $insertUser->bindParam(':USUARIO',$user);
        $insertUser->bindParam(':CONTRASENIA',$password);
        $insertUser->bindParam(':FOTO',$destino);
        $insertUser->bindParam(':ROL',$rol);
        
        $insertUser->execute();
        header('Location: index.php');
        //
        if(move_uploaded_file($tmp_name, $destino)){
            return true;
        }
        
    }
   
        return false;
        
?>