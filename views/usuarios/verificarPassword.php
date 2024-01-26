<?php
// var_dump($_SESSION['miUsuario']['usuario']);
if (isset($_SESSION['passwordVerificada'])) {
?>
    <p>ya se verifico la contraseña</p>
    <div class="verificarPassword">

        <form action="<?= base_url ?>Usuarios/modificarPassword" method="post">
            <label for="password">Ingrese la nueva contraseña</label>
            <input type="password" name="password" required>

            <button type="submit">Verificar contaseña</button>
        </form>
    </div>

<?php
} else {
?>
    <p>no se ha verificado la contraseña</p>
    <div class="verificarPassword">
        <h3>Por favor verifica la contraseña</h3>
        <form action="<?= base_url ?>Usuarios/verificarPassword" method="post">
            <label for="password">Ingrese su contraseña</label>
            <input type="password" name="password" required>
            <button type="submit">Cambiar contraseña</button>
        </form>
    </div>
<?php
}
?>