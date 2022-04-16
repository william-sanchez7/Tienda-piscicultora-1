<?php 
	
	//VARIABLE GLOBAL PARA MOSTRAR EL VALOR RECIBIDO
	$mensaje="";
		
		// DESENCRIPTA LOS DATOS DEL FORMULARIO EN VARIABLES Y LOS ALMACENA EN LA VARIABLE DE SESION
		if(isset($_POST['btnAccion'])){
		
			switch($_POST['btnAccion']){
					
				case 'Agregar':
								if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
									$id=openssl_decrypt($_POST['id'],$COD,$KEY);
									$mensaje.="OK ID correcto".$id."</br>";
								}else{$mensaje.="oops... ID incorrecto".$id."</br>";}
						
								if(is_string(openssl_decrypt($_POST['nombre'],$COD,$KEY))){
									$nombre=openssl_decrypt($_POST['nombre'],$COD,$KEY);
									$mensaje.="OK NOMBRE".$nombre."</br>";
								}else{$mensaje.="oops... error en el nombre"."</br>"; break;}
						
								if(is_numeric($_POST['cantidad'])){
									$cantidad=$_POST['cantidad'];
									$mensaje.="OK CANTIDAD".$cantidad."</br>";
								}else{$mensaje.="oops... error en la cantidad"."</br>"; break;}
						
								if(is_numeric(openssl_decrypt($_POST['precio'],$COD,$KEY))){
									$precio=openssl_decrypt($_POST['precio'],$COD,$KEY);
									$mensaje.="OK PRECIO".$precio."</br>";
								}else{$mensaje.="oops... error en el precio"."</br>"; break;}
			
					// ALMACENA EN LA VARIABLE DE SESIÓN LOS VALORES RECIBIDOS POR LAS VARIABLES DEL FORMULARIO 
					if(!isset($_SESSION['CARRITO'])){
						$productos = array(
						'ID'=>$id,
						'NOMBRE'=>$nombre,
						'CANTIDAD'=>$cantidad,
						'PRECIO'=>$precio,
						);
						$_SESSION['CARRITO'][0]=$productos;
					}
					
					else{
							$idProductos=array_column($_SESSION['CARRITO'],"ID");
							if(in_array($id,$idProductos)){
								echo "<script> alert('El producto ya fué seleccionado'); </script>";
							}
							else{
								$numeroProductos=count($_SESSION['CARRITO']);
								$productos = array(
								'ID'=>$id,
								'NOMBRE'=>$nombre,
								'CANTIDAD'=>$cantidad,
								'PRECIO'=>$precio,
								);
								$_SESSION['CARRITO'][$numeroProductos]=$productos;
							}
							//IMPRIME LO QUÉ HAY EN LA VARIALE DE SESIÓN	
							$mensaje="producto agregado al carrito...";
							break;
						}
					break;
				case "Eliminar":

					if(is_numeric(openssl_decrypt($_POST['id'],$COD,$KEY))){
						$id=openssl_decrypt($_POST['id'],$COD,$KEY);
						//RECORRE LA VARIABLE DE SESIÓN Y LA ASIGNA A LA VARIABLE DE PRODUCTO
						foreach($_SESSION['CARRITO'] as $indice=>$productos){
							if($productos['ID']==$id){
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