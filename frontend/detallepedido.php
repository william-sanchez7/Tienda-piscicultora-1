<?php require_once('includes/header.php');
//Registrar los datos a la tabla ventas 
    $nombre = $_REQUEST['nameOrder'];
    $correo = $_REQUEST['correoOrder'];
    $ciudad = $_REQUEST['city'];
    $direccion = $_REQUEST['address'];
    $numero = $_REQUEST['numberPhone'];
    $total = $_REQUEST['priceTotal'];
     $sentencia = $pdo -> prepare(" INSERT INTO `ventas` 
        (`ID`, `FECHA`, `CORREO`, `TOTAL`, `ESTADO`) 
        VALUES (NULL, Now(), :CORREO, :TOTAL, 'pendiente');");
     $sentencia->bindParam(":CORREO", $correo);
     $sentencia->bindParam(":TOTAL", $total);
     $sentencia->execute();
     $idVenta = $pdo->lastInsertId();
     
   //Recorrer el metodo post, como los nombres de los inputs y asignar el valor 
    foreach ($_POST as $key => $value) {//name input.value
       //Selecciona todos los elementos qué contenga dataProduct
        if(preg_match("/^dataProduct/", $key)){
            $temp = json_decode($value);
            $idProducto = $temp->idProductOrder;
            $precioProducto = $temp->priceUnitaryOrder;
            $cantidadProducto = $temp->quantyOrder;
            
            $insertDetail = $pdo -> prepare("INSERT INTO `detalle_ventas` 
            (`ID`, `ID_VENTAS`, `ID_PRODUCTO`, `PRECIO_UNITARIO`, `CANTIDAD`, `CIUDAD`, `DIRECCION`) 
            VALUES (NULL, :ID_VENTA, :ID_PRODUCTO, :PRECIO_UNITARIO, :CANTIDAD, :CIUDAD, :DIRECCION);");
            $insertDetail->bindParam(":ID_VENTA", $idVenta);
            $insertDetail->bindParam(":ID_PRODUCTO",$idProducto);
            $insertDetail->bindParam(":PRECIO_UNITARIO",$precioProducto);
            $insertDetail->bindParam(":CANTIDAD", $cantidadProducto);
            $insertDetail->bindParam(":CIUDAD", $ciudad);
            $insertDetail->bindParam(":DIRECCION", $direccion);
            $insertDetail->execute();
        }
    }
    
?>
</header>

<div class="main">
    <div class="container mt-3">
        <div class="card animate__animated animate__fadeIn">
            <div class="card-header">
                <?php 
                $idUsuario = obtenerDatosUsuario()[0];
                $consulta = $pdo->prepare("SELECT * FROM `ventas` WHERE ID = $idVenta"); 
                $consulta->execute();
                $ventas = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
                foreach($ventas as $ventasData){
                     $idVenta = $ventasData['ID'];
                     $fechaVenta = $ventasData['FECHA'];
                     $estadoVenta = $ventasData['ESTADO'];
                     $totalVenta = $ventasData['TOTAL'];
                } ?>
                Fecha
                <strong><?php echo $fechaVenta; ?></strong>
                <span class="float-right"> <strong>Estado:</strong> <?php echo $estadoVenta; ?> </span>

            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-6 col-md-6">
                        <h6 class="mb-2">De:</h6>
                        <div>
                            <strong>Tolifish</strong>
                        </div>
                        <div>Nombre Empresario</div>
                        <div>Mz B cs 13 Santacruz Ibagué, Colombia</div>
                        <div>Correo: tolifish@gmail.com</div>
                        <div>Telefono: +57 312 666 3333</div>
                    </div>
                <?php 
                $consultaDetallesVenta = $pdo->prepare("SELECT * FROM detalle_ventas, productos 
                WHERE detalle_ventas.ID_PRODUCTO = productos.id_productos AND detalle_ventas.ID_VENTAS=$idVenta"); 
                
                $consultaDetallesVenta->execute();
                $detalleVentas = $consultaDetallesVenta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($detalleVentas as $item) {
                    
                    $direccionDetalle = $item['DIRECCION'];
                    $ciudadDetalleVenta= $item['CIUDAD'];
                   
                   
                }
                ?>
                 <div class="col-6 col-md-6">
                        <h6 class="mb-2">Para:</h6>
                        <div>
                            <strong><?php echo resultadoDatosUsuario()[2]; ?></strong>
                        </div>
                        <div>Attn: <?php echo resultadoDatosUsuario()[2]; ?></div>
                        <div><?php echo $direccionDetalle; echo " ",$ciudadDetalleVenta;?>, Colombia</div>
                        <div>Correo: <?php echo resultadoDatosUsuario()[3]; ?></div>
                        <div>Telefono: +57 <?php echo resultadoDatosUsuario()[4] ?></div>
                    </div>

                </div>

                <div class="table-responsive-sm">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="2%" class="center">#</th>
                                <th scope="col" width="20%">Producto</th>
                                <th scope="col" class="d-none d-sm-table-cell" width="50%"></th>
                                <th scope="col" width="10%" class="text-right">Precio</th>
                                <th scope="col" width="8%" class="text-right">Cantidad</th>
                                <th scope="col" width="10%" class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Traeme los productos que tengan el mismo id de la tabla detalle venta -->
                            <tr>
                                <?php 
                                    foreach ($detalleVentas as $item) {
                                        $idVentas = $item['ID_VENTAS'];
                                        $precioVenta = $item['precio_producto'];
                                        $cantidadVenta = $item['CANTIDAD'];
                                        $nombreProductoVenta= $item['nombre_producto'];
                                        $subtotalVenta = $cantidadVenta * $precioVenta;
                                 ?>
                                <td class="text-left"><?php echo $idVentas; ?> </td>
                                <td class="item_name"><?php echo $nombreProductoVenta  ?></td>
                                <td class="item_desc d-none d-sm-table-cell"></td>
                                <td class="text-right"><?php echo $precioVenta; ?></td>
                                <td class="text-right"><?php echo $cantidadVenta; ?></td>
                                <td class="text-right"><?php echo $subtotalVenta; ?></td>
                            </tr>
                           <?php }?> 
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-sm table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="text-right bg-light"><?php echo $totalVenta; ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount (0%)</strong>
                                    </td>
                                    <td class="text-right bg-light">$0</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>IVA (0%)</strong>
                                    </td>
                                    <td class="text-right bg-light">$0</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="text-right bg-light">
                                        <strong>$<?php echo $totalVenta; ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div> <br>
<?php require_once('includes/footer.php') ?>