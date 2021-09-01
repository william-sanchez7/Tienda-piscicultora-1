<?php include('includes/header.php'); ?>
</header>

<!-- contenedor todo -->
<div class="overlay">
    <!-- caja trasera -->
    <div class="popup"> 
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class='bx bxs-x-circle'></i></a>
        <!-- caja trasera login -->
        <div class="login_box">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesión para entrar a tu cuenta!</p>
            <button id="btn-login">Iniciar sesión</button>
        </div>
        <div class="register_box">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>Regístrate para que puedas iniciar sesión!</p>
            <button id="btn-register">Regístrarse</button>
        </div>
    </div>
    <div class="login-register">
        <form action="#" class="form-login">
            <h2>Iniciar sesión</h2>
            <input type="text" class="" placeholder="Cuenta">
            <input type="password" placeholder="Contraseña">
            <button>Entrar</button>
        </form>
        <form action="#" class="form-register">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Nombres">
            <input type="text" placeholder="Apellidos">
            <input type="text" placeholder="Correo">
            <input type="text" placeholder="telefono">
            <input type="text" placeholder="Usuario">
            <input type="password" placeholder="Contraseña">
            <button>Registrarse</button>
        </form>
    </div>
</div>