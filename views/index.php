<?php
    if(isset($_SESSION['identity'])){
        echo "Ya iniciaste sesion";
        
    }else{
    
?>

<div class="loginContainer">

    <div class="loginLogo">
        <img src="assets/img/logo.png">
    </div>
    <div class="login">
        <div class="loginTitulo">
            <h1>INICIAR SESIÓN</h1>
        </div>
        <div class="loginFormulario">
            <form action="<?= base_url ?>Usuarios/iniciarsesion" method="post">
                <label for="user">Usuario</label>
                <input type="text" name="user">

                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena">

                <button type="submit" class="loginBotonIniciarsesion">INICIAR SESIÓN</button>
            </form>
        </div>
        <div class="loginAdministrador">
            <a href="<?= base_url ?>Usuarios/registrar">¿No tienes cuenta aun?</a><br>

        </div>
    </div>

</div>
<?php
}
?>