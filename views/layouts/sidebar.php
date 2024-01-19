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
    <article>
      <ul>
    <?php
    switch ($_SESSION['nav']) {
      case 'miPerfil':
    ?>
        
          
            <li><a href="#">Modificar perfil</a></li>
            <li><a href="#">Cambiar contraseña</a></li>
            <li><a href="#">Generar QR</li></a>
          
          
      <?php
    break;
    case 'hacerRegistro':
      ?>
      <li><a href="#">Opcion 1 registro</a></li>
      <li><a href="#">Opcion 2 registro</a></li>
      <li><a href="#">Opcion 3 registro</a></li>
    <?php
    break;
    case 'informes':
    ?>
    <li><a href="#">Opcion 1 informes</a></li>
    <li><a href="#">Opcion 2 informes</a></li>
    <li><a href="#">Opcion 3 informes</a></li>
    <?php
    break;
    case 'crearVigilante':
    ?>
    <li><a href="#">Opcion 1 vigilante</a></li>
    <li><a href="#">Opcion 2 vigilante</a></li>
    <li><a href="#">Opcion 3 vigilante</a></li>

    <?php
    }
    ?>


      </ul>
      </article>
  </aside>

<?php
}
?>