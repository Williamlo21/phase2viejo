<?php
if (isset($_SESSION['identity'])) {
    echo "el usuario es de rol: " . $_SESSION['identity']->id_roll;

?>
    <main class="main">
        <p>aqui debe ir todo el contenido</p>
        <h3>hola mindo</h3>
    </main>
    <aside class="aside">
        <p>esta sera la barra de apoyo</p>
        <?php
        if ($_SESSION['nav'] == 'miPerfil') {

        ?>
            <article>
                <ul>
                    <li><a href="#">Modificar perfil</a></li>
                    <li><a href="#">Cambiar contraseña</a></li>
                    <li><a href="#">Generar QR</a </article></li>
                </ul>
                
            <?php
        }
            ?>
    </aside>

<?php
}
?>