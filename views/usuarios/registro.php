
<div class="loginContainer">
    
    <div class="loginFormulario">
        <form action="procesar_datos.php" method="post">
            <label for="tipoDocumento">Tipo de Documento:</label>
            <input type="text" name="tipoDocumento" required>

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

            <label for="genero">Género:</label>
            <select name="genero" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>

            <label for="roll">Rol:</label>
            <select name="roll" required>
                <option value="APRENDIZ">Aprendiz</option>
                <option value="ADMINISTRADOR">Administrador</option>
                <option value="INSTRUCTOR">Instructor</option>
                <option value="ADMINISTRATIVO">Administrativo</option>
                <option value="VISITANTE">Visitante</option>
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