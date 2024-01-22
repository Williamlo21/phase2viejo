<?php if (isset($_SESSION['miUsuario']) && $_SESSION['miUsuario'] !== null) : ?>
    <table class="user-profile">
        <tr>
            <th colspan="2">Información del Usuario</th>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['primer_nombre'] . " " . $_SESSION['miUsuario']['segundo_nombre'] . " " . $_SESSION['miUsuario']['primer_apellido'] . " " . $_SESSION['miUsuario']['segundo_apellido']; ?></td>
        </tr>
        <tr>
            <td><strong>Documento:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['tipo_de_documento'] . ": " . $_SESSION['miUsuario']['num_documento']; ?></td>
        </tr>
        <tr>
            <td><strong>Fecha de Nacimiento:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['fecha_nacimiento']; ?></td>
        </tr>
        <tr>
            <td><strong>Edad:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['edad']; ?></td>
        </tr>
        <tr>
            <td><strong>Rol:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['nombre']; ?></td>
        </tr>
        <tr>
            <td><strong>Dirección:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['direccion']; ?></td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['telefono']; ?></td>
        </tr>
        <tr>
            <td><strong>Correo Electrónico:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['correo_electronico']; ?></td>
        </tr>
        <tr>
            <td><strong>Usuario:</strong></td>
            <td><?php echo $_SESSION['miUsuario']['usuario']; ?></td>
        </tr>
    </table>
<?php else : ?>
    <p>Error al obtener la información del usuario.</p>
<?php endif; ?>


<!-- header("Location:" . base_url); -->