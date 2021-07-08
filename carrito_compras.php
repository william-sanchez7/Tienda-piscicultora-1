<?php 
	session_start();
	//VARIABLE GLOBAL PARA MOSTRAR EL VALOR RECIBIDO
	$mensaje="";
		
		// DESENCRIPTA LOS DATOS DEL FORMULARIO EN VARIABLES Y LOS ALMACENA EN LA VARIABLE DE SESION
		if(isset($_POST['btnAccion'])){
		
			switch($_POST['btnAccion']){
				// case 'Comprar':	
				// 				// ID
				// 				if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
				// 					$id=openssl_decrypt($_POST['id'],$COD,$KEY);
				// 					$mensaje.="OK ID correcto".$id."</br>";
				// 				}else{$mensaje.="oops... ID incorrecto".$id."</br>";}
				// 				// NOMBRE
				// 				if(is_string(openssl_decrypt($_POST['nombre'],$COD,$KEY))){
				// 					$nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY);
				// 					$mensaje.="OK NOMBRE".$nombre."</br>";
				// 				}else{$mensaje.="oops... error en el nombre"."</br>"; break;}
				// 				// IMAGEN
				// 				if(is_string(openssl_decrypt($_POST['imagen'],$COD,$KEY))){
				// 					$imagen=openssl_decrypt($_POST['imagen'],$COD,$KEY);
				// 					$mensaje.="OK imagen correcta".$imagen."</br>";
				// 				}else{$mensaje.="oops... imagen incorrecto".$imagen."</br>";}
				// 				// CANTIDAD
				// 				if(is_numeric(openssl_decrypt($_POST['cantidad'],$COD,$KEY))){
				// 					$cantidad=openssl_decrypt($_POST['cantidad'],$COD,$KEY);
				// 					$mensaje.="OK CANTIDAD".$cantidad."</br>";
				// 				}else{$mensaje.="oops... error en la cantidad"."</br>"; break;}
				// 				// PRECIO
				// 				if(is_numeric(openssl_decrypt($_POST['precio'],$COD,$KEY))){
				// 					$precio=openssl_decrypt($_POST['precio'],$COD,$KEY);
				// 					$mensaje.="OK PRECIO".$precio."</br>";
				// 				}else{$mensaje.="oops... error en el precio"."</br>"; break;}
				// 				// IVA
				// 				if(is_numeric(openssl_decrypt($_POST['iva'],$COD,$KEY))){
				// 					$iva=openssl_decrypt($_POST['iva'],$COD,$KEY);
				// 					$mensaje.="OK PRECIO".$iva."</br>";
				// 				}else{$mensaje.="oops... error en el iva"."</br>"; break;}
				// 				// IMPOCONSUMO
				// 				if(is_numeric(openssl_decrypt($_POST['impoconsumo'],$COD,$KEY))){
				// 				$impoconsumo=openssl_decrypt($_POST['impoconsumo'],$COD,$KEY);
				// 				$mensaje.="OK PRECIO".$impoconsumo."</br>";
				// 				}else{$mensaje.="oops... error en el impoconusmo"."</br>"; break;}

				// 				// ALMACENA EN LA VARIABLE DE SESIÓN LOS VALORES RECIBIDOS POR LAS VARIABLES DEL FORMULARIO 
				// 				if(!isset($_SESSION['CARRITO'])){
				// 					$producto = array(
				// 					'ID'=>$id,
				// 					'NOMBRE'=>$nombre,
				// 					'IMAGEN'=>$imagen,
				// 					'CANTIDAD'=>$cantidad,
				// 					'PRECIO'=>$precio,
				// 					'IVA'=>$iva,
				// 					'IMPOCONSUMO'=>$impoconsumo
				// 				);
	
				// 				$_SESSION['CARRITO'][0]=$producto;
				// 				}else{
				// 					$numeroProductos=count($_SESSION['CARRITO']);
				// 					$producto = array(
				// 					'ID'=>$id,
				// 					'NOMBRE'=>$nombre,
				// 					'IMAGEN'=>$imagen,
				// 					'CANTIDAD'=>$cantidad,
				// 					'PRECIO'=>$precio,
				// 					'IVA'=>$iva,
				// 					'IMPOCONSUMO'=>$impoconsumo
				// 				);
								
				// 				$_SESSION['CARRITO'][$numeroProductos]=$producto;
				// 				}
				// 				//IMPRIME LO QUÉ HAY EN LA VARIALE DE SESIÓN	
				// 				$mensaje=print_r($_SESSION,true);
				// 				break;	
				case 'Agregar':
								if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
									$id=openssl_decrypt($_POST['id'],$COD,$KEY);
									$mensaje.="OK ID correcto".$id."</br>";
								}
								else{
									$mensaje.="oops... ID incorrecto".$id."</br>";
								}
						
								if(is_string(openssl_decrypt($_POST['nombre'],$COD,$KEY))){
									$nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY);
									$mensaje.="OK NOMBRE".$nombre."</br>";
								}
								else{	
									$mensaje.="oops... error en el nombre"."</br>"; break; 
								}
						
								if(is_numeric($_POST['cantidad'])){
									$cantidad=$_POST['cantidad'];
									$mensaje.="OK CANTIDAD".$cantidad."</br>";
								}
								else{	
									$mensaje.="oops... error en la cantidad"."</br>"; break;
								}
						
								if(is_numeric(openssl_decrypt($_POST['precio'],$COD,$KEY))){
									$precio=openssl_decrypt($_POST['precio'],$COD,$KEY);
									$mensaje.="OK PRECIO".$precio."</br>";
								}
								else{	
									$mensaje.="oops... error en el precio"."</br>"; break;
								}

								if(is_numeric(openssl_decrypt($_POST['iva'],$COD,$KEY))){
									$iva=openssl_decrypt($_POST['iva'],$COD,$KEY);
									$mensaje.="OK PRECIO".$iva."</br>";
								}
								else{	
									$mensaje.="oops... error en el iva"."</br>"; break;
								}
			
								if(is_numeric(openssl_decrypt($_POST['impoconsumo'],$COD,$KEY))){
								$impoconsumo=openssl_decrypt($_POST['impoconsumo'],$COD,$KEY);
								$mensaje.="OK PRECIO".$impoconsumo."</br>";
								}
								else{	
									$mensaje.="oops... error en el impoconusmo"."</br>"; break;
								}
			
					// ALMACENA EN LA VARIABLE DE SESIÓN LOS VALORES RECIBIDOS POR LAS VARIABLES DEL FORMULARIO 
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
					//IMPRIME LO QUÉ HAY EN LA VARIALE DE SESIÓN	
					$mensaje=print_r($_SESSION,true);
					break;
			
				case "Eliminar":

					if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
						$id=openssl_decrypt($_POST['id'],$COD,$KEY);
						//RECORRE LA VARIABLE DE SESIÓN Y LA ASIGNA A LA VARIABLE DE PRODUCTO
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