<?php
ob_start();
if (isset($_SESSION['datosPreRegistro'])) {
?>
    <table class="user-profile">
        <tr>
            <th colspan="2">Información de PreRegistro</th>
        </tr>
        <tr>
            <th>Nombre del usuario:</th>
            <td><?php echo $_SESSION['datosPreRegistro']['primer_nombre'] . " " .
                    $_SESSION['datosPreRegistro']['segundo_nombre'] . " " .
                    $_SESSION['datosPreRegistro']['primer_apellido'] . " " .
                    $_SESSION['datosPreRegistro']['segundo_apellido']; ?>
            </td>
        </tr>
        <tr>
            <th>Documento:</th>
            <td>
                <?php
                echo $_SESSION['datosPreRegistro']['tipo_de_documento'] . " " . $_SESSION['datosPreRegistro']['num_documento']
                ?>
            </td>
        </tr>
        <tr>
            <th>Roll:</th>
            <td><?= $_SESSION['datosPreRegistro']['roll']; ?></td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td><?= $_SESSION['datosPreRegistro']['telefono']; ?></td>
        </tr>
        <tr>
            <th>Correo Electronico:</th>
            <td><?= $_SESSION['datosPreRegistro']['correo_electronico']; ?></td>
        </tr>
        <tr>
            <th colspan="2">Vehículo</th>
        </tr>
        <?php if ($_SESSION['datosPreRegistro']['vehiculo'] !== NULL) { ?>
            <tr>
                <th>Tipo de Vehículo</th>
                <td><?= $_SESSION['datosPreRegistro']['tipoDeVehiculo']; ?></td>
            </tr>
            <tr>
                <th>Marca:</th>
                <td><?= $_SESSION['datosPreRegistro']['marcaVehiculo']; ?></td>
            </tr>
            <tr>
                <th>Placa:</th>
                <td><?= $_SESSION['datosPreRegistro']['placa']; ?></td>
            </tr>
            <tr>
                <th>Color: </th>
                <td><?= $_SESSION['datosPreRegistro']['colorVehiculo']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="#">Cambiar Vehiculo</a></td>
            </tr>
        <?php } else {
        ?>
            <tr>
                <td colspan="2">Añadir Vehiculo</td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="2">Equipo de computo</th>
        </tr>
        <?php if ($_SESSION['datosPreRegistro']['equipo'] !== NULL ) { ?>
            <tr>
                <th>Marca:</th>
                <td><?= $_SESSION['datosPreRegistro']['marcaEquipo']; ?></td>
            </tr>
            <tr>
                <th>Referencia:</th>
                <td><?= $_SESSION['datosPreRegistro']['referencia']; ?></td>
            </tr>
            <tr>
                <th>Color:</th>
                <td><?= $_SESSION['datosPreRegistro']['colorEquipo']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="#">Cambiar Equipo</a></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="2"><a href="#">Añadir Equipo</a></td>
            </tr>
    </table>
<?php
        }
    }
    ?>
