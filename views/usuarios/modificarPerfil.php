

<div class="formularioPerfil">
    <form action="<?= base_url ?>Usuarios/modificar" method="post">
        <table>

            <tr>
                <th>
                    <label for="tipoDocumento">Tipo de Documento:</label>
                </th>
                <td>
                    <select name="tipoDocumento" required>
                        <option value="1" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'CEDULA DE CIUDADANIA' ? 'selected' : '' ?>>CEDULA DE CIUDADANIA</option>
                        <option value="2" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'TARJETA DE IDENTIDAD' ? 'selected' : '' ?>>TARJETA DE IDENTIDAD</option>
                        <option value="3" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'REGISTRO CIVIL' ? 'selected' : '' ?>>REGISTRO CIVIL</option>
                        <option value="4" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'CEDULA DE EXTRANJERIA' ? 'selected' : '' ?>>CEDULA DE EXTRANJERIA</option>
                        <option value="5" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'PASAPORTE' ? 'selected' : '' ?>>PASAPORTE</option>
                        <option value="0" <?= isset($_SESSION['miUsuario']['tipo_de_documento']) && $_SESSION['miUsuario']['tipo_de_documento'] == 'OTRO' ? 'selected' : '' ?>>OTRO</option>
                    </select>

                </td>
                <th>
                    <label for="numeroDocumento">Número de Documento:</label>
                </th>
                <td>
                    <input type="text" name="numeroDocumento" required pattern="[0-9]+" value="<?= isset($_SESSION['miUsuario']['num_documento']) ? $_SESSION['miUsuario']['num_documento'] : '' ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="primerNombre">Primer Nombre:</label>
                </th>
                <td>
                    <input type="text" name="primerNombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" value="<?= isset($_SESSION['miUsuario']['primer_nombre']) ? $_SESSION['miUsuario']['primer_nombre'] : '' ?>">
                </td>
                <th>
                    <label for="segundoNombre">Segundo Nombre:</label>
                </th>
                <td>
                    <input type="text" name="segundoNombre" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" value="<?= isset($_SESSION['miUsuario']['segundo_nombre']) ? $_SESSION['miUsuario']['segundo_nombre'] : '' ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="primerApellido">Primer Apellido:</label>
                </th>
                <td>
                    <input type="text" name="primerApellido" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" value="<?= isset($_SESSION['miUsuario']['primer_apellido']) ? $_SESSION['miUsuario']['primer_apellido'] : ''; ?>">
                </td>
                <th>
                    <label for="segundoApellido">Segundo Apellido:</label>
                </th>
                <td>
                    <input type="text" name="segundoApellido" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" value="<?= isset($_SESSION['miUsuario']['segundo_apellido']) ? $_SESSION['miUsuario']['segundo_apellido'] : '' ?>">
                </td>
            </tr>

            <tr>
                <th>
                    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                </th>
                <td>
                    <input type="date" name="fechaNacimiento" required value="<?= isset($_SESSION['miUsuario']['fecha_nacimiento']) ? $_SESSION['miUsuario']['fecha_nacimiento'] : '' ?>">
                </td>
                <th>
                    <label for="genero">Género:</label>
                </th>
                <td>
                    <select name="genero" required>
                        <option value="1" <?= isset($_SESSION['miUsuario']['genero']) && $_SESSION['miUsuario']['genero'] == 'MASCULINO' ? 'selected' : '' ?>>MASCULINO</option>
                        <option value="2" <?= isset($_SESSION['miUsuario']['genero']) && $_SESSION['miUsuario']['genero'] == 'FEMENINO' ? 'selected' : '' ?>>FEMENINO</option>
                        <option value="0" <?= isset($_SESSION['miUsuario']['genero']) && $_SESSION['miUsuario']['genero'] == 'OTRO' ? 'selected' : '' ?>>OTRO</option>
                    </select>

                </td>
            </tr>

            <tr>
                <th>
                    <label for="roll">Rol:</label>
                </th>
                <td>
                    <select name="roll" required>
                        <option value="1" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 1 ? 'selected' : '' ?>>APRENDIZ</option>
                        <option value="2" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 2 ? 'selected' : '' ?>>ADMINISTRADOR</option>
                        <option value="3" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 3 ? 'selected' : '' ?>>INSTRUCTOR</option>
                        <option value="4" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 4 ? 'selected' : '' ?>>VIGILANTE</option>
                        <option value="5" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 5 ? 'selected' : '' ?>>ADMINISTRATIVO</option>
                        <option value="6" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 6 ? 'selected' : '' ?>>VISITANTE</option>
                        <option value="8" <?= isset($_SESSION['miUsuario']['id_roll']) && $_SESSION['miUsuario']['id_roll'] == 8 ? 'selected' : '' ?>>SUPER ADMIN</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="direccion">Dirección:</label>
                </th>
                <td>
                    <input type="text" name="direccion" required value="<?= isset($_SESSION['miUsuario']['direccion']) ? $_SESSION['miUsuario']['direccion'] : '' ?>">
                </td>
                <th>
                    <label for="telefono">Teléfono:</label>
                </th>
                <td>
                    <input type="tel" name="telefono" required pattern="[0-9]+" value="<?= isset($_SESSION['miUsuario']['telefono']) ? $_SESSION['miUsuario']['telefono'] : '' ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="correoElectronico">Correo Electrónico:</label>
                </th>
                <td>
                    <input type="email" name="correoElectronico" required value="<?= isset($_SESSION['miUsuario']['correo_electronico']) ? $_SESSION['miUsuario']['correo_electronico'] : '' ?>">
                </td>
                <th>
                    <label for="user">Usuario:</label>
                </th>
                <td>
                    <input type="text" name="user" required value="<?= isset($_SESSION['miUsuario']['usuario']) ? $_SESSION['miUsuario']['usuario'] : '' ?>">
                </td>
            </tr>

        </table>
        <div class="botonModificar">
            <tr>
                <td>
                    <button type="submit">Modificar</button>
                </td>
            </tr>
        </div>
    </form>
</div>