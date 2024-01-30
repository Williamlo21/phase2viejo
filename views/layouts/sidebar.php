<?php
// Verificar si existe la sesión 'notificacion'
if (isset($_SESSION['notificacion'])) {
?>
  <div class="notificacion">
    <?php
    // Obtener el tipo y el mensaje de la notificación
    $tipoNotificacion = $_SESSION['notificacion']['tipo'];
    $mensajeNotificacion = $_SESSION['notificacion']['mensaje'];

    // Imprimir el mensaje con un estilo diferente según el tipo
    if ($tipoNotificacion === 'exito') {
      echo '<div class="exito">' . $mensajeNotificacion . '</div>';
    } elseif ($tipoNotificacion === 'error') {
      echo '<div class="error">' . $mensajeNotificacion . '</div>';
    }

    // Limpiar la sesión de notificación para que no se muestre en futuras cargas de la página
    unset($_SESSION['notificacion']);
    ?>
    <form action="" method="post">
      <button type="submit">Aceptar</button>
    </form>
  </div>
<?php
}
?>
<?php

if (isset($_SESSION['identity'])) {
  // echo "el usuario es de rol: " . $_SESSION['identity']->id_roll;
  // echo "id del usuario es: ". $_SESSION['identity']->id;
?>
  <main class="main">
    <?php
    switch ($_SESSION['nav']['menu']) {
      case 'miPerfil':
        // Verificar si la clave 'opcion' está definida en $_SESSION
        switch ($_SESSION['nav']['opcion']) {
            // comenzamos a hacer cada una de las opciones
          case 'verPerfil':

            require_once "views/usuarios/verPerfil.php";
            break;

          case 'modificarPerfil':

            require_once "views/usuarios/modificarPerfil.php";

            break;
          case 'cambiarPassword':

            require_once "views/usuarios/verificarPassword.php";
            break;
          case 'misVehiculos':
            require_once "views/vehiculos/index.php";
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
            <li><a href="<?= base_url ?>usuarios/cambiarPassword">Cambiar contraseña</a></li>
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