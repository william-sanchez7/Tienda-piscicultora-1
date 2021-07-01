<?php 
    include("templates/config.php"); 
    include("templates/header.php");
    include("carrito_compras.php");
    
?>
</header>
<main>
    <section class="section featured">
        <div class="title">
            <h1>Carrito de compras</h1>
        </div>
    
    <form action="products.php" class="form-value">
              <input class="button-back" type="submit" value="Volver">
         
        </form>
   
          
        <div>
            <?php if(!empty($_SESSION['CARRITO'])){ ?>
            <div>
            <table>
            <thead class="table-top">
                <tr><!-- ENCABEZADO DE LA TABLA DEL CARRITO-->
                    <td data-titulo="producto" class="top">Producto</td>
                    <td data-titulo="cantidad" class="top">Cantidad</td>
                    <td data-titulo="precio" class="top">Precio</td>
                    <td data-titulo="iva" class="top">Iva</td>
                    <td data-titulo="impoconsumo" class="top">impoconsumo</td>
                    <td data-titulo="total" class="top">Total</td>
                    <td data-titulo="accion" class="top">--</td>
                </tr>
            </thead>
            <tbody>
                <!-- Muestra los datos recibidos por el producto y hace la suma total de todos los productos-->
                <?php $total=0; ?>
                <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                <tr>
                    <td data-titulo="Producto:"><?php echo $producto['NOMBRE']; ?></td>
                    <td data-titulo="Cantidad:"><?php echo $producto['CANTIDAD']; ?></td>
                    <td data-titulo="Precio:"><?php echo $producto['PRECIO'] ?></td>
                    <td data-titulo="Iva:"><?php echo $producto['IVA']."%" ?></td>
                    <td data-titulo="Impoconsumo:"><?php echo $producto['IMPOCONSUMO']."%" ?></td>
                    <td data-titulo="Total:"><?php $iva = ($producto['IVA']*$producto['PRECIO'])/100; 
                    $impoconsumo= ($producto['IMPOCONSUMO']*$producto['PRECIO'])/100;
                    echo number_format($total1=$producto['PRECIO'] * $producto['CANTIDAD']+$iva+$impoconsumo);  ?></td>
                    <td>
                        <form action="" method="POST">
                        <input type="hidden" 
                        name="id" 
                        id="id"
                        value="<?php echo openssl_encrypt($producto['ID'],$COD,$KEY); ?>">
                        <!-- Eliminar productos del carrito -->
                        <button class="btn btn-danger" 
                        type="submit" 
                        name="btnAccion" 
                        value="Eliminar"><i class='bx bxs-trash'></i>
                        </button>
                        </form>
                    </td>
                </tr>
                <!-- Hace la suma de los productos por cantidad, además qué le suma la cantidad ya existente -->
                <?php $total= $total + ($total1 * $producto['CANTIDAD']);
                    
                ?>        
                    
                <?php    } ?>
                <!-- Muestra por pantalla la variable total con la suma de todos los productos -->
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td> </td>
                    <td></td>
                    <td>$<?php echo number_format($total);?></td>
                </tr>
            </tbody>
        </table>
        <div class="button-car">
        <form action="" class="form-value">
              
       <input class="button" type="submit" value=">> Confirmación de la compra <<">
              </form> 
        </div>
           
    </div>
  <?php } else{ ?>
    <div class="alert">
        No hay productos en el carrito de compras
    </div>
    <?php   }  ?>
    
    </section>
</main>
    
    
<?php include("templates/footer.php");  ?>