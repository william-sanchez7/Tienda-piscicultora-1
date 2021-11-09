<?php include('includes/header.php'); ?>
</header>
<div class="body-s">
    <div class="container-r">
        <div class="title-r">Registrar</div>
        <!-- Formulario de registro -->
        <form id="formulario" action="validateRegister.php" class="form-r" method="POST">
            <div class="user-details" id="details">
                
                <div class="input-box" id="group-name">
                    <label for="name" class="details-label">Nombres y apellidos</label>
                    <div class="form-group-input">
                        <input class="input-r" type="text" placeholder="Ingresa tú nombre" name="name" id="name" required>
                        <i class="form-status-validate fas fa-times-circle"></i>
                    </div>
                    <p class="form-input-error">El nombre solo puede contener letras y espacios</p>
                </div>
                <div class="input-box" id="group-email">
                    <label for="email" class="details-label">Correo</label>
                    <div class="form-group-input">
                        <input class="input-r" type="email" placeholder="correo@correo.com" name="email" id="email" required>
                        <i class="form-status-validate fas fa-times-circle"></i>   
                    </div>
                    <p class="form-input-error">El correo solo puede contener letras, numeros, puntos y guion bajo</p>
                </div>
                
                <div class="input-box" id="group-tellphone">
                    <label for="tellphone" class="details-label">Teléfono</label>    
                    <div class="form-group-input">
                        <input class="input-r" type="text" placeholder="3223125909" name="tellphone" id="tellphone" required>
                        <i class="form-status-validate fas fa-times-circle"></i>
                    </div>
                    <p class="form-input-error">El telefono solo puede contener numeros</p>
                </div>
                <div class="input-box" id="group-user">
                    <label for="user" class="details-label">Usuario</label>
                    <div class="form-group-input">
                        <input class="input-r" type="text" placeholder="john123" name="user" id="user" required>
                        <i class="form-status-validate fas fa-times-circle"></i>
                    </div>
                    <p class="form-input-error">El usuario solo puede contener letras, numeros y guion bajo</p>
                </div>
                <div class="input-box" id="group-password">
                    <label for="password" class="details-label">Contraseña</label>
                    <div class="form-group-input">
                        <input class="input-r" type="password" placeholder="Ingresa tú contraseña" name="password" id="password" required>
                        <i class="form-status-validate fas fa-times-circle"></i>
                    </div>
                    <p class="form-input-error">La contraseña debe tener más de 8 dígitos</p>
                </div>
                <div class="input-box" id="group-password2">
                    <label for="password2" class="details-label">Confirmar contraseña</label>
                    <div class="form-group-input">
                        <input class="input-r" type="password" placeholder="Ingresa tú contraseña" name="password2" id="password2" required>
                        <i class="form-status-validate fas fa-times-circle"></i>
                    </div>
                    <p class="form-input-error">Las contraseña deben ser iguales</p>
                </div>
                <!-- Terminos y condiciones -->
                <div class="group-terminos" id="group-terminos">
                    <label class="details-label">
                        <input class="form-checkbox" type="checkbox" id="terminos" name="terminos" required>
                        Acepto los términos y condiciones 
                    </label>
                </div>
                <div class="msj-error" id="msj-error">
                    <p><i class="fas fa-exclamation-circle"></i> <b>Error:</b> porfavor llena el formulario correctamente.</p>
                </div>
            </div>

            <div class="button-r">
                <button type="submit" class="form-btn" name="btnRegister" id="btnRegister">Enviar</button>
                <p class="form-msj-exito" id="form-msj-exito">Formulario enviado exitosamente!</p>
            </div>
        </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>