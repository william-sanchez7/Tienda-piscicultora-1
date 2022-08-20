<?php 
    ob_start();
    require_once('includes/conexion.php');
    require_once('includes/dateUser.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="William sanchez">
    <meta name="description" content="Tienda virtual piscicultora">
    <meta name="aplication-name" content="System fish">
    <meta name="keywords" content="tolifish, mojarra ibagué, comprar mojarra, mojarra roja">
    <title>Toli Fish</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="../public/img/icon_tolifish.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- BOX ICONS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="script/login.js"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="main">
    <div class="container mt-3">
        <div class="card animate__animated animate__fadeIn">
            <div class="card-header">
                <?php 
                
                $idUsuario = obtenerDatosUsuario()[0];
                $idVenta = $_POST['idVenta'];


                $consulta = $pdo->prepare("SELECT * FROM `ventas` WHERE ID = $idVenta"); 
                $consulta->execute();
                $ventas = $consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach($ventas as $ventasData){
                     $idVenta = $ventasData['ID'];
                     $fechaVenta = $ventasData['FECHA'];
                     $estadoVenta = $ventasData['ESTADO'];
                     $totalVenta = $ventasData['TOTAL'];
                } 
                
                ?>

                Fecha
                <strong><?php echo $fechaVenta; ?></strong> <br>
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
                    $idDetalleVenta = $item['ID'];
                    $direccionDetalle = $item['DIRECCION'];
                    $ciudadDetalleVenta= $item['CIUDAD'];
                }

                $insertarFactura = $pdo->prepare("INSERT INTO `factura` 
                            (`id_factura`, `fecha_factura`, `fk_venta`, `DETALLE_VENTA`) 
                            VALUES (NULL, now(), :IDVENTA, :DETALLEVENTA);");
                $insertarFactura->bindParam(":IDVENTA", $idVenta);
                $insertarFactura->bindParam(":DETALLEVENTA", $idDetalleVenta);            
                $insertarFactura->execute();
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
</div>   
</body>
</html>
<?php 
$html = ob_get_clean();
require_once('../public/lib/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream('factura_tolifish.pdf', array("Attachment" => false));
?>