<?php 

function obtenerDatosUsuario(){
    if(isset($_SESSION['user'])){
       $datosUsuario = $_SESSION['user'];
       
       $imagenUsuario = $datosUsuario['imagen_usuario'];
       $nombreUsuario = $datosUsuario['nombre'];
       $correoUsuario = $datosUsuario['correo'];
       $usuario = $datosUsuario['usuario'];
       return array($imagenUsuario, $nombreUsuario, $correoUsuario,$usuario);
    } 
}

function resultadoDatosUsuario(){
    $resultadoDatosUsuario= list($imagenUsuario, $nombreUsuario) = obtenerDatosUsuario();
    return $resultadoDatosUsuario;
}
function iconoDeAccesoUsuario(){
    try{
        if(isset($_SESSION['user'])){
            echo '<a class="btn-abrir-popup" id="popupuser"><img src="'.resultadoDatosUsuario()[0].'" alt="imagen usuario"></a>';
        }else{
            echo '<a class="btn-abrir-popup" id="btn-abrir-popup"><i class="bx bxs-user-circle bx-tada"></i></a>';
        }
    }catch(e){
        console.log(e);
    }    
}
?>
