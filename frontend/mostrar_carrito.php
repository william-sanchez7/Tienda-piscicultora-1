<?php require_once("includes/header.php"); ?> 
</header>
<main>
    <section class="section featured">
        <div class="title">
            <h1>Datos del pedido</h1>
        </div>
        <button class="back-shop">
            <a href="index.php#product"><i class='bx bx-arrow-back' ></i></a>
        </button>
            <div class="container-payindex"> 
                <div class="list-product-pay" id="list-pay">
                    <div class="details-buyer">
                        <h1>Datos del comprador</h1>
                    </div>
                    <div class="form-container-order">
                        <!-- Imprime el formulario con o sin los datos del usuario -->
                            <?php if(isset($_SESSION['user'])) {?>
                            <form action="detallepedido.php" class="form-orders" id="btn-order" method="POST">
                                <span>Nombre: </span>
                                    <input class="inputOrder" type="text" name="nameOrder" value="<?php echo resultadoDatosUsuario()[2]; ?>" required readonly>
                                <span>Correo: </span>
                                    <input class="inputOrder" type="email" name="correoOrder" value="<?php echo resultadoDatosUsuario()[3]; ?>" required readonly>
                                <span>Ciudad: </span>
                                    <input class="inputOrder" type="text" name="city" required>
                                <span>Direccion: </span>
                                    <input class="inputOrder" type="text" name="address" required>
                                <span>Telefono: </span>
                                    <input class="inputOrder" type="text" name="numberPhone" value="<?php echo resultadoDatosUsuario()[4]; ?>" required readonly>
                                    <input type="number" id="subtotalOrder" name="priceTotal" value="" hidden>  
                                <?php } 
                            
                            else{ ?>
                            <form action="detallepedido.php" class="form-orders" id="btn-order" method="POST">
                                <span>Nombre: </span>
                                    <input class="inputOrder" type="text" name="nameOrder" value="" required>
                                <span>Correo: </span>
                                    <input class="inputOrder" type="email" name="correoOrder" value="" required>
                                <span>Ciudad: </span>
                                    <input class="inputOrder" type="text" name="city" required>
                                <span>Direccion: </span>
                                    <input class="inputOrder" type="text" name="address" required>
                                <span>Telefono: </span>
                                    <input class="inputOrder" type="text" name="numberPhone" value="" required>
                                    <input type="number" id="subtotalOrder" name="priceTotal" value="" hidden>  
                                    
                             
                            <?php }
                            ?>
                    </div> 
                </div>
                <div class="methods-pay">
                    <div class="details-pay">
                        <div class="orders-header">
                            <h1>Detalles del pedido</h1>
                            <table class="table" id="table-orderpay">
                                <thead class="table-light">
                                  <td>Producto</td>
                                  <td>Cantidad</td>
                                  <td>Subtotal</td>
                                </thead>
                                <tbody id="tbody-table-pay">
                                    <!-- imprime productos desde el localStorage con el documento pedido.js -->
                                </tbody>
                            </table>
                        </div>

                        <div class="methods-orders">
                            <div class="method-pay-currency">
                            <i class='bx bx-credit-card'></i><h4>Metodos de pago:</h4> <h5>Efecty</h5>
                            </div>
                             <div class="method-shipping">
                                <i class='bx bxs-package'></i><h4>Metodos de envío:</h4> <h5>Envío a domicilio</h5>
                             </div>
                        </div>
                        
                        <div class="count-pay-orders">
                            <div class="title-order-pay">
                                <h4>Subtotal: </h4>
                                <h4>iva: </h4>
                                <h4>Total: </h4>
                            </div>
                            <div class="numbers-order-pay" id="total-subtotal-pay">
                                <!-- Imprime el precioTotal desde el localStorage con el documento pedido.js -->
                            </div> 
                        </div>
                    </div>
                        <input class="validate-purchase" type="submit" value="Validar Compra" name="btn-submitOrder">
                    </form> 
                </div>
            </div>
    </section>
</main>
<?php include("includes/footer.php"); ?>