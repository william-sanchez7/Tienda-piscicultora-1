<?php session_start();
	//variable para mostrar los valores recibidos
	$mensaje="";
		//si oprime el boton del formulario con el nombre BtnAccion hacer esto
		//desencripta los datos y los agrega en una variable y después los muestra por pantalla
		if(isset($_POST['btnAccion'])){
		
			switch($_POST['btnAccion']){
			
				case 'Agregar':
					//desencriptar los valores y mostrar el mensaje del ID
					if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
						$id=openssl_decrypt($_POST['id'],$COD,$KEY);
						$mensaje.="OK ID correcto".$id."</br>";
					}else{
						$mensaje.="oops... ID incorrecto".$id."</br>";
					}
					//desencriptar los valores y mostrar el mensaje del NOMBRE
					if(is_string(openssl_decrypt($_POST['nombre'],$COD,$KEY))){
						$nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY);
						$mensaje.="OK NOMBRE".$nombre."</br>";
						}else{	$mensaje.="oops... error en el nombre"."</br>"; break; }
						
						//desencriptar los valores y mostrar el mensaje de la cantidad
						if(is_numeric(openssl_decrypt($_POST['cantidad'],$COD,$KEY))){
							$cantidad=openssl_decrypt($_POST['cantidad'],$COD,$KEY);
							$mensaje.="OK CANTIDAD".$cantidad."</br>";
						}else{	$mensaje.="oops... error en la cantidad"."</br>"; break;}
						
						//desencriptar los valores y mostrar el mensaje del precio
						if(is_numeric(openssl_decrypt($_POST['precio'],$COD,$KEY))){
							$precio=openssl_decrypt($_POST['precio'],$COD,$KEY);
							$mensaje.="OK PRECIO".$precio."</br>";
						}else{	$mensaje.="oops... error en el precio"."</br>"; break;}

						//desencriptar los valores y mostrar el mensaje del precio
						if(is_numeric(openssl_decrypt($_POST['iva'],$COD,$KEY))){
							$iva=openssl_decrypt($_POST['iva'],$COD,$KEY);
							$mensaje.="OK PRECIO".$iva."</br>";
						}else{	$mensaje.="oops... error en el iva"."</br>"; break;}
			
						//desencriptar los valores y mostrar el mensaje del precio
						if(is_numeric(openssl_decrypt($_POST['impoconsumo'],$COD,$KEY))){
							$impoconsumo=openssl_decrypt($_POST['impoconsumo'],$COD,$KEY);
							$mensaje.="OK PRECIO".$impoconsumo."</br>";
						}else{	$mensaje.="oops... error en el impoconusmo"."</br>"; break;}
			
				//recibe la informacion de todos los productos que el usuario selecciona 
				if(!isset($_SESSION['CARRITO'])){
					$producto = array(
					'ID'=>$id,
					'NOMBRE'=>$nombre,
					'CANTIDAD'=>$cantidad,
					'PRECIO'=>$precio,
					'IVA'=>$iva,
					'IMPOCONSUMO'=>$impoconsumo
				);
				
				$_SESSION['CARRITO'][0]=$producto;
				}else{
					$numeroProductos=count($_SESSION['CARRITO']);
					$producto = array(
					'ID'=>$id,
					'NOMBRE'=>$nombre,
					'CANTIDAD'=>$cantidad,
					'PRECIO'=>$precio,
					'IVA'=>$iva,
					'IMPOCONSUMO'=>$impoconsumo
					);
					
					$_SESSION['CARRITO'][$numeroProductos]=$producto;
				}
				//imprime la informacion de la sesion	
				$mensaje=print_r($_SESSION,true);

			break;

			case "Eliminar":

			


				if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
					$id=openssl_decrypt($_POST['id'],$COD,$KEY);
					//recorre la variable de sesion y la asigna en producto
					foreach($_SESSION['CARRITO'] as $indice=>$producto){
						
						if($producto['ID']==$id){
							unset($_SESSION['CARRITO'][$indice]);
	 						
						}
						
					}
					
				}	
				else{
						$mensaje= "oops... ID incorrecto".$id."</br>";
					}
						
			break;
		}
	}
?>