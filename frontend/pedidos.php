
<?php include('includes/header.php');?> 

</header>
<!-- MAIN -->
<main>
    <section class="section featured">
        <div class="title">
            <h1>Historial de pedidos</h1>
        </div>
        <?php 
            if(isset($_SESSION['user'])){
                $idUsuario = obtenerDatosUsuario()[0];
                $sentencia = $pdo->prepare("SELECT * FROM ventas WHERE ID_USUARIO = $idUsuario");
                $sentencia->execute();
                $listaDeVentas = $sentencia->fetchAll(PDO::FETCH_ASSOC);           
        ?>
        <div class="product-center container">
            <?php 
                foreach($listaDeVentas as $venta){
            ?>
            
            <div class="card text-center">
                <form action="cancelar_factura.php" method="POST">
                    <div class="card-header">
                        <div> 
                        </div>
                        <?php echo $venta['FECHA']; ?>
                    </div>
            
                    <div class="card-body">
                    
                        <h5 class="card-title"><?php echo $venta['CIUDAD']; ?></h5>
                        <p class="card-text"><?php echo $venta['DIRECCION']; ?></p>
                        
                        <input type="number" name="idventa" value="<?php echo $venta['ID']; ?>" hidden>
                        <input type="text" name="ciudadVenta" value="<?php echo $venta['CIUDAD']; ?>" hidden>
                        <input type="text" name="direccionVenta" value="<?php echo $venta['DIRECCION']; ?>" hidden>
                        <input type="number" name="idUsuario" value="<?php echo $venta['ID_USUARIO']; ?>" hidden>
                        <input type="text" name="fecha" value="<?php echo $venta['FECHA']; ?>" hidden>
                        <input type="number" name="totalVenta" value="<?php echo $venta['TOTAL']; ?>" hidden>
                        <input type="submit" class="btn btn-warning" value="Cancelar" name="btn-cancel">
                        <input type="submit" class="btn btn-primary" value="Factura" name="btn-invoice">
                        <input type="submit" class="btn btn-danger" value="Eliminar" name="btn-eliminar">
                    </div>
                    <div class="card-footer text-muted">
                      
                        <?php echo $venta['ESTADO']; ?>
                    </div>
                </form>
            </div>
            <?php 
                }
             ?>
        </div>
        <?php } else{ ?>

            <h1> Inicia sesión </h1>
        <?php } ?>
    </section>
</main>
<?php include('includes/footer.php'); ?>