<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHASE2</title>
  <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>

<body>


    
      <?php
      if (isset($_SESSION['identity'])) {
      ?>
        <div class="cabeceraBienvenida">
          <div class="cabeceraBienvenidaUsuario">
            <h3>Bienvenido <?php echo $_SESSION['identity']->primer_nombre . " " . $_SESSION['identity']->primer_apellido; ?></h3>
          </div>
          <div class="cabeceraBienvenidaSede">
            <p><strong>Sede:</strong>Modelo 950001</p>
            <!-- Aqui debemos hacer el proceso para poner en que sede se ha iniciado sesion si es un  vigilante -->
          </div>
        </div>
        <form class="botonCerrarSesion" action=" <?= base_url ?>usuarios/logout" method="post">
          <button class="botonCerrarSesionB" type="submit"><img class="botonCerrarSesionImagen" src=" <?= base_url ?>assets/img/botonRojo.png" alt="cerrar sesion">Cerrar sesion</button>
        </form>
    </div>
    <nav class="barraNavegacion">
    <ul>
      <li><a href="<?= base_url ?>">Inicio</a></li>
      <li><a href="<?= base_url ?>usuarios/registrar">Registrarme</a></li>
      <li><a href="<?= base_url ?>usuarios/login">Iniciar sesión</a></li>

      <?php if (isset($_SESSION['identity'])) { ?>
        <li><a href="<?= base_url ?>usuarios/logout" class="cerrar-sesion">cerrar sesión</a></li>
      <?php } ?>

    </ul>
  </nav>

  <?php
      } else {
  ?>
    
  <?php
      }
  ?>
