<?php include('includes/header.php'); ?>
</header>
<div class="container-xl px-4 mt-4 mainperfil">
    
    <form action="editarperfil.php" method="POST" enctype="multipart/form-data">
        <div class="row headerperfil">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Imagen de perfil</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?php echo resultadoDatosUsuario()[1] ?>" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG ó PNG no más de 5 MB</div>
                            <!-- Profile picture upload button-->
                            <input class="btn btn-primary" type="file" name="photo" required>
                        </div>
                    </div>
                </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detalles de la cuenta</div>
                    <div class="card-body">
                        
                            
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Nombres y apellidos</label>
                                <input name="name" class="form-control" type="text" placeholder="Ingresa tu nombre completo" value="<?php echo resultadoDatosUsuario()[2]; ?>" required>
                                
                            </div>
                
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Correo electrónico</label>
                                <input name="email" class="form-control" id="inputEmailAddress" type="email" placeholder="Ingresa tu correo electronico" value="<?php echo resultadoDatosUsuario()[3]; ?>" required>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Numero de teléfono</label>
                                    <input name="tellphone" class="form-control" id="inputPhone" type="text" placeholder="Ingresa tu numero de telefono" value="<?php echo resultadoDatosUsuario()[4]; ?>" required>
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Contraseña</label>
                                    <input name="password" class="form-control" id="inputBirthday" type="password" placeholder="Ingresa tu contraseña" value="<?php echo resultadoDatosUsuario()[6]; ?>" required>
                                </div>  
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-success keep" type="submit">Guardar cambios</button>
                       
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('includes/footer.php'); ?>