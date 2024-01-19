<?php
if (isset($_SESSION['identity'])) {
  echo "el usuario es de rol: " . $_SESSION['identity']->id_roll;
?>
  <main class="main">
    <?php
    switch ($_SESSION['nav']['menu']) {
      case 'miPerfil':
        // Verificar si la clave 'opcion' está definida en $_SESSION
        switch ($_SESSION['nav']['opcion']) {
          case 'verPerfil':
    ?>
            <li><a href="#">Opcion 1 registro</a></li>
          <?php
            echo "aqui van los datos del usuario";
            require_once "views/usuarios/verPerfil.php";
            break;
          case 'modificarPerfil':
          ?>
            <h2>aqui modificamos el perfil o llamamos el formulario</h2>
        <?php
        break;
          default:
            echo "aun no ha seleccionado una opcion";
            // Otros casos según sea necesario
        }

        ?>
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
        break;
      default:
      ?>
        <p>Aún no ha intentado realizar ninguna acción</p>
    <?php
    }
    ?>
  </main>
  <aside class="aside">
    <p>esta sera la barra de apoyo</p>
    <article>
      <ul>
        <?php
        switch ($_SESSION['nav']['menu']) {
          case 'miPerfil':
        ?>
            <li><a href="<?= base_url ?>usuarios/verPerfil">Ver perfil</a></li>
            <li><a href="<?= base_url ?>usuarios/modificarPerfil">Modificar perfil</a></li>
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
            break;
          default:
          ?>
            <p>Aún no ha intentado realizar ninguna acción</p>
        <?php
        }
        ?>
      </ul>
    </article>
  </aside>
<?php
}
?>