<?php 
//Si no existe un id de sesión, entonces inicia sesión
if(!session_id()) session_start();

function obtenerDatosUsuario(){
    if(isset($_SESSION['user'])){
       $datosUsuario = $_SESSION['user'];//Se asigna los valores de la sesión user
       //Destructura los datos en variables
       $idUsuario = $datosUsuario['id_usuarios'];
       $imagenUsuario = $datosUsuario['imagen_usuario'];
       $nombreUsuario = $datosUsuario['nombre'];
       $correoUsuario = $datosUsuario['correo'];
       $telefono = $datosUsuario['telefono'];
       $usuario = $datosUsuario['usuario'];
       return array($idUsuario, $imagenUsuario, $nombreUsuario, $correoUsuario, $telefono, $usuario);
    } 
}
//Obtiene los datos de la función obtenerDatosUsuario
function resultadoDatosUsuario(){
    $resultadoDatosUsuario = list($idUsuario, $imagenUsuario, $nombreUsuario, $correoUsuario, $telefono, $usuario) = obtenerDatosUsuario();
    return $resultadoDatosUsuario;
}
//Obtiene el ícono de login ó la imagen del usuario
function iconoDeAccesoUsuario(){
    try{
        if(isset($_SESSION['user'])){
            echo '<a class="btn-abrir-popup" id="popupuser"><img src="'.resultadoDatosUsuario()[1].'" alt="imagen usuario"></a>';
        }else{
            echo '<a class="btn-abrir-popup" id="btn-abrir-popup"><i class="bx bxs-user-circle bx-tada"></i></a>';
        }
    }catch(error){
        
    }    
}
//Devuelve el id del usuario, si existe una sesión
function verificarUsuarioLogeado(){
    $datosDelUsuario = obtenerDatosUsuario();
    return ($datosDelUsuario == null)? [] : $datosDelUsuario[0];
}
//Envía la validación de si existe un usuario logeado a un documento JS, pedido.js 
try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(verificarUsuarioLogeado() == null){
            echo json_encode(['success' => 0]);//Envía 0 como caso de error
        }else{
            echo json_encode(['success' => verificarUsuarioLogeado()]);//Envía el id del usuario
        }     
    }    
}catch(error){
    
}
?>
