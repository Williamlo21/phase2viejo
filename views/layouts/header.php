<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHASE2</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <h1>header</h1>
  <?php
  if (isset($_SESSION['identity'])){

 ?>
  <div class="cursor-container">
    <div class="cabecera">
      <?php
      if (isset($_SESSION['identity'])) {
      ?>
        <h3>Bienvenido <?php echo $_SESSION['identity']->primerNombre . " " . $_SESSION['identity']->primerApellido; ?></h3>
      <?php
      } else {
        ?>
        <h3>¿No has iniciado sesión? ve ya mismo a disfrutar de los beneficios de nuestra aplicación!</h3>
      <?php
      }
      ?>

    </div>
    <ul>
      <li><a href="<?= base_url ?>">Inicio</a></li>
      <li><a href="<?= base_url ?>usuarios/registrar">Registrarme</a></li>
      <li><a href="<?= base_url ?>usuarios/login">Iniciar sesión</a></li>

      <?php if (isset($_SESSION['identity'])) { ?>
        <li><a href="<?= base_url ?>usuarios/logout" class="cerrar-sesion">cerrar sesión</a></li>
      <?php } ?>

    </ul>
<?php
    }
  ?>