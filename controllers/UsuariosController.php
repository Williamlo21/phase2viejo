<?php
require_once "models/usuarios.php";
class UsuariosController
{

    public function registrar()
    {
        require_once "views/usuarios/registro.php";
    }
    public function prueba(){
        require_once "views/usuarios/prueba.php";
    }
    public function guardar()
    {
        $primerNombre = isset($_POST['primerNombre']) ? $_POST['primerNombre'] : '';
        $segundoNombre = isset($_POST['segundoNombre']) ? $_POST['segundoNombre'] : '';
        $primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
        $segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';
        $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
        $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

        try {
            if (!empty($primerNombre) && !empty($segundoNombre) && !empty($primerApellido) && !empty($segundoApellido) && !empty($fechaNacimiento) && !empty($edad) && !empty($correoElectronico) && !empty($contrasena)) {
                // Crear un nuevo objeto de modelo (suponiendo que tienes una clase UserModel para manejar usuarios)
                $usuario = new Usuario;

                // Asignar valores a las propiedades del modelo
                $usuario->setPrimerNombre($primerNombre);
                $usuario->setSegundoNombre($segundoNombre);
                $usuario->setPrimerApellido($primerApellido);
                $usuario->setSegundoApellido($segundoApellido);
                $usuario->setFechaNacimiento($fechaNacimiento);
                $usuario->setEdad($edad);
                $usuario->setCorreoElectronico($correoElectronico);
                $usuario->setContrasena($contrasena);

                // Guardar el usuario (suponiendo que tienes un método guardar en UserModel)
                $usuario->guardar();

                // Mostrar una vista de completado
                require_once "views/user/completado.php";
            } else {
                throw new Exception("Todos los campos son obligatorios");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
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
