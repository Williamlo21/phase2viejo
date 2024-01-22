<div class="formularioPerfil">
    <form action="<?= base_url ?>Usuarios/modificar" method="post"></form>
    <table>

        <tr>
            <th>
                <label for="tipoDocumento">Tipo de Documento:</label>
            </th>
            <td>
                <select name="tipoDocumento" required>
                    <option value="1">CEDULA DE CIUDADANIA</option>
                    <option value="2">TARJETA DE IDENTIDAD</option>
                    <option value="3">REGISTRO CIVIL</option>
                    <option value="4">CEDULA DE EXTRANJERIA</option>
                    <option value="5">PASAPORTE</option>
                    <option value="0">OTRO</option>
                </select>
            </td>
            <th>
                <label for="numeroDocumento">Número de Documento:</label>
            </th>
            <td>
                <input type="text" name="numeroDocumento" required pattern="[0-9]+">
            </td>
        </tr>
        <tr>
            <th>
                <label for="primerNombre">Primer Nombre:</label>
            </th>
            <td>
                <input type="text" name="primerNombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">
            </td>
            <th>
                <label for="segundoNombre">Segundo Nombre:</label>
            </th>
            <td>
                <input type="text" name="segundoNombre" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">
            </td>
        </tr>
        <tr>
            <th>
                <label for="primerApellido">Primer Apellido:</label>
            </th>
            <td>
                <input type="text" name="primerApellido" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">
            </td>
            <th>
                <label for="segundoApellido">Segundo Apellido:</label>
            </th>
            <td>
                <input type="text" name="segundoApellido" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">
            </td>
        </tr>

        <tr>
            <th>
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            </th>
            <td>
                <input type="date" name="fechaNacimiento" required>
            </td>
            <th>
                <label for="edad">Edad:</label>
            </th>
            <td>
                <input type="text" name="edad" required pattern="[0-9]+">
            </td>
            <th>
                <label for="genero">Género:</label>
            </th>
            <td>
                <select name="genero" required>
                    <option value="1">MASCULINO</option>
                    <option value="2">FEMENINO</option>
                    <option value="0">OTRO</option>
                </select>
            </td>
        </tr>

        <tr>
            <th>
                <label for="roll">Rol:</label>
            </th>
            <td>
                <select name="roll" required>
                    <option value="1">APRENDIZ</option>
                    <option value="3">INSTRUCTOR</option>
                    <option value="5">ADMINISTRATIVO</option>
                    <option value="6">VISITANTE</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="direccion">Dirección:</label>
            </th>
            <td>
                <input type="text" name="direccion" required>
            </td>
            <th>
                <label for="telefono">Teléfono:</label>
            </th>
            <td>
                <input type="tel" name="telefono" required pattern="[0-9]+">
            </td>
        </tr>
        <tr>
            <th>
                <label for="correoElectronico">Correo Electrónico:</label>
            </th>
            <td>
                <input type="email" name="correoElectronico" required>
            </td>
            <th>
                <label for="user">Usuario:</label>
            </th>
            <td>
                <input type="text" name="user" required>
            </td>
        </tr>

        <div class="botonModificar">
            <tr>
                <td>
                    <button type="submit">Modificar</button>
                </td>
            </tr>
        </div>
    </table>
</div>