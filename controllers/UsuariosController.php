<?php
require_once "models/usuarios.php";
class UsuariosController
{

    public function registrar()
    {
        require_once "views/usuarios/registro.php";
    }
    public function guardar()
    {
        // Obtener valores de $_POST o ajustar según la fuente de datos
        $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : '';
        $numeroDocumento = isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : '';
        $primerNombre = isset($_POST['primerNombre']) ? $_POST['primerNombre'] : '';
        $segundoNombre = isset($_POST['segundoNombre']) ? $_POST['segundoNombre'] : '';
        $primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
        $segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';
        $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
        $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $roll = isset($_POST['roll']) ? $_POST['roll'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

        try {
            // Verificar si los campos obligatorios no están vacíos
            if (!empty($tipoDocumento) && !empty($numeroDocumento) && !empty($primerNombre) && !empty($segundoNombre) && !empty($primerApellido) && !empty($segundoApellido) && !empty($fechaNacimiento) && !empty($edad) && !empty($genero) && !empty($roll) && !empty($direccion) && !empty($telefono) && !empty($correoElectronico) && !empty($user) && !empty($contrasena)) {
    
                // Crear un nuevo objeto de modelo (suponiendo que tienes una clase Usuario para manejar usuarios)
                $usuario = new Usuario;

                // Asignar valores a las propiedades del modelo
                $usuario->setTipoDocumento($tipoDocumento);
                $usuario->setNumeroDocumento($numeroDocumento);
                $usuario->setPrimerNombre($primerNombre);
                $usuario->setSegundoNombre($segundoNombre);
                $usuario->setPrimerApellido($primerApellido);
                $usuario->setSegundoApellido($segundoApellido);
                $usuario->setFechaNacimiento($fechaNacimiento);
                $usuario->setEdad($edad);
                $usuario->setGenero($genero);
                $usuario->setRoll($roll);
                $usuario->setDireccion($direccion);
                $usuario->setTelefono($telefono);
                $usuario->setCorreoElectronico($correoElectronico);
                $usuario->setUser($user);
                $usuario->setContrasena($contrasena);

                // Guardar el usuario (suponiendo que tienes un método guardar en la clase Usuario)
                $usuario->guardar();

                // Puedes realizar acciones adicionales después de guardar, como redireccionar o mostrar un mensaje de éxito
            } else {
                // Campos obligatorios vacíos, manejar de acuerdo a tus necesidades
                echo "Campos obligatorios no pueden estar vacíos.";
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso de guardar
            echo "Error al guardar el usuario: " . $e->getMessage();
        }
    }

    public function login()
    {
        require_once "views/usuarios/loginUsuarios.php";
    }
    public function iniciarSesion()
    {
        if (isset($_POST)) {
            //Identificar  al usuario 
            //Consulta a la base datos
            $usuario = new Usuario();
            $usuario->setCorreoElectronico($_POST['correoElectronico']);
            $usuario->setContrasena($_POST['contrasena']);

            $identity = $usuario->loguearse();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }
        }
        header("Location:" . base_url);
    }
    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location:" . base_url);
    }
}
