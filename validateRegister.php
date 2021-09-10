<?php
    include('includes/conexion.php');
    // Obtener los valores del formulario y guardarlo en variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tellphone = $_POST['tellphone'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $rol = 1; //rol de usuario
    
    echo "Los datos ingresados son:".$name.$rol.$email.$user.$password.$tellphone;

    $insertUser = $pdo->prepare("INSERT INTO 
    `usuarios` (`id_usuarios`, `nombre`, `correo`, `telefono`, `usuario`, `contraseña`, `fk_rol`) 
    VALUES (NULL, :NOMBRE, :CORREO, :TELEFONO, :USUARIO, :CONTRASENIA, :ROL);");

    $insertUser->bindParam(':NOMBRE',$name);
    $insertUser->bindParam(':CORREO',$email);
    $insertUser->bindParam(':TELEFONO',$tellphone);
    $insertUser->bindParam(':USUARIO',$user);
    $insertUser->bindParam(':CONTRASENIA',$password);
    $insertUser->bindParam(':ROL',$rol);
    
    $insertUser->execute();
    
    
?>