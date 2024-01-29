<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8 sin BOM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?= base_url ?>assets/img/logo.png">
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
    <!-- roles:
  
  1: Aprendiz
  2: Administrador
  3: Instructor
  4: Vigilante
  5: Administrativo
  6: visitante
  8: Super Admin  -->
    <!-- Seleccion de opciones que se muestran en la barra de navegacion de acuerdo al roll -->
    <?php
    if (!isset($_SESSION['nav']) || !is_array($_SESSION['nav'])) {
      $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');
    }
    $miPerfilClass = $hacerRegistroClass = $informesClass = $crearVigilanteClass = '';

    switch ($_SESSION['nav']['menu']) {
      case 'miPerfil':
        $miPerfilClass = 'active';
        break;
      case 'hacerRegistro':
        $hacerRegistroClass = 'active';
        break;
      case 'informes':
        $informesClass = 'active';
        break;
      case 'crearVigilante':
        $crearVigilanteClass = 'active';
        break;
        // Agrega más casos según sea necesario
    }
    ?>



    <nav class="barraNavegacion">
      <ul>
        <li class="<?= $miPerfilClass ?>"><a href="<?= base_url ?>usuarios/miPerfil">Mi perfil</a></li>

        <?php if ($_SESSION['identity']->id_roll == 2 || $_SESSION['identity']->id_roll == 4 || $_SESSION['identity']->id_roll == 8) { ?>
          <li class="<?= $hacerRegistroClass ?>"><a href="<?= base_url ?>usuarios/hacerRegistro">Hacer registro</a></li>
          <li class="<?= $informesClass ?>"><a href="<?= base_url ?>usuarios/informes">Informes</a></li>
        <?php } ?>

        <?php if ($_SESSION['identity']->id_roll == 2 || $_SESSION['identity']->id_roll == 8) { ?>
          <li class="<?= $crearVigilanteClass ?>"><a href="<?= base_url ?>usuarios/crearVigilante">Crear vigilante</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['identity'])) { ?>
          <li><a href="<?= base_url ?>usuarios/logout" class="cerrar-sesion">Cerrar sesión</a></li>
        <?php } ?>
      </ul>
    </nav>


  <?php
  }//aqui habria un else
  ?>