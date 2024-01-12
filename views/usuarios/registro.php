<div class="datosUsuario">

    <div class="registroFormulario">
        <form action="<?= base_url ?>Usuarios/guardar" method="post">
            <label for="tipoDocumento">Tipo de Documento:</label>
            <select name="tipoDocumento" required>
                <option value="1">CEDULA DE CIUDADANIA</option>
                <option value="2">TARJETA DE IDENTIDAD</option>
                <option value="3">REGISTRO CIVIL</option>
                <option value="4">CEDULA DE EXTRANJERIA</option>
                <option value="5">PASAPORTE</option>
                <option value="0">OTRO</option>
            </select>

            <label for="numeroDocumento">Número de Documento:</label>
            <input type="text" name="numeroDocumento" required pattern="[0-9]+">

            <label for="primerNombre">Primer Nombre:</label>
            <input type="text" name="primerNombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">

            <label for="segundoNombre">Segundo Nombre:</label>
            <input type="text" name="segundoNombre" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">

            <label for="primerApellido">Primer Apellido:</label>
            <input type="text" name="primerApellido" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">

            <label for="segundoApellido">Segundo Apellido:</label>
            <input type="text" name="segundoApellido" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+">

            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fechaNacimiento" required>

            <label for="edad">Edad:</label>
            <input type="text" name="edad" required pattern="[0-9]+">

            <label for="genero">Género:</label>
            <select name="genero" required>
                <option value="1">MASCULINO</option>
                <option value="2">FEMENINO</option>
                <option value="0">OTRO</option>
            </select>

            <label for="roll">Rol:</label>
            <select name="roll" required>
                <option value="1">APRENDIZ</option>
                <option value="2">ADMINISTRADOR</option>
                <option value="3">INSTRUCTOR</option>
                <option value="5">ADMINISTRATIVO</option>
                <option value="6">VISITANTE</option>
            </select>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" required pattern="[0-9]+">

            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="email" name="correoElectronico" required>

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <button type="submit">Enviar</button>
        </form>
        <p>¿Ya tienes cuenta?</p><a href="<?= base_url ?>">Inicia sesión aquí.</a><br>
    </div>
</div>