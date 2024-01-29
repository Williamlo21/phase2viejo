<?php
require_once "models/usuarios.php";
class UsuariosController
{
    public function registrar()
    {
        require_once "views/usuarios/registro.php";
    }
    // la sesion nav es para la barra de navegacion. de acuerdo al enlace que se seleccione
    public function destruirSesionMenu()
    {
        // esta funcion nos ayuda a destruir la sesion nav
        unset($_SESSION['nav']);
    }

    public function destruirSesionOpcion()
    {
        // esta funcion nos ayuda a destruir la sesion opcion
        unset($_SESSION['opcion']);
    }

    public function redireccionar()
    {
        // esta funcion nos recarga la página.
        require_once 'views/helper/redireccionar.php';
    }

    // utilizamos sesiones para asi mostrar lo correspondiente en el aside y el main.
    // la sesion nav es un array asociativo. el menu es para la opcion seleccionada en la barra de navegacion y opcion, es para seleccionar la opcion hecha en el aside.
    public function miPerfil()
    {
        // eliminamos toda sesion de nav

        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    public function hacerRegistro()
    {
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'hacerRegistro');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    public function informes()
    {
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'informes');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    public function crearVigilante()
    {
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'crearVigilante');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    // aqui debemos hacer las sesiones para las opciones del aside segun la opcion seleccionada de la barra de mavegacion
    public function verPerfil()
    {
        $this->destruirSesionMenu();
        $this->destruirSesionOpcion();

        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');

        // Crear una instancia del usuario
        $user = new Usuario;

        // Llamar a la función para obtener el usuario
        $_SESSION['miUsuario'] = $user->verUsuario();

        // Verificar si la consulta fue exitosa
        if ($_SESSION['miUsuario'] !== false) {
            // Incluir la vista que mostrará la información del usuario
            // require_once 'views/usuarios/verPerfil.php';
            // Hacer cualquier otra operación necesaria aquí

            // Redireccionar al final de la función
            header("Location:" . base_url);
        } else {
            // Manejar el caso en que la consulta no fue exitosa
            echo "Error al obtener la información del usuario.";
        }
    }

    public function cambiarPassword()
    {
        unset($_SESSION['passwordVerificada']);
        $this->destruirSesionOpcion();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'cambiarPassword');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    public function verificarPassword()
    {
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $user = $_SESSION['miUsuario']['usuario'];
        try {
            // Verificar si los campos obligatorios no están vacíos
            if (!empty($password)) {

                // Crear un nuevo objeto de modelo (suponiendo que tienes una clase Usuario para manejar usuarios)
                $usuario = new Usuario;
                $usuario->setPassword($password);
                $usuario->setUser($user);
                $passwordVerificada = $usuario->loguearse();
                if ($passwordVerificada && is_object($passwordVerificada)) {
                    $_SESSION['passwordVerificada'] = $passwordVerificada;
                    // var_dump($_SESSION['identity'] = $identity);
                    // die();
                    // $this->redireccionar();
                    header("Location:" . base_url);
                } else {
                    $_SESSION['error_login'] = 'Identificacion fallida!!';
                }
            } else {
                // Campos obligatorios vacíos, manejar de acuerdo a tus necesidades
                echo "Campos obligatorios no pueden estar vacíos.";
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso de guardar
            echo "Error al verificar la contraseña: " . $e->getMessage();
        }
    }
    public function modificarPassword()
    {
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        try {
            // Verificar si los campos obligatorios no están vacíos
            if (!empty($password)) {

                // Crear un nuevo objeto de modelo (suponiendo que tienes una clase Usuario para manejar usuarios)
                $usuario = new Usuario;

                $usuario->setPassword($password);

                ob_start(); // Activar el búfer de salida
                $usuario->modificarPassword();

                $passwordModificada = $usuario->modificarPassword();
                // require_once "views/usuarios/contrasena.php";

                if ($passwordModificada) {
                    $this->verPerfil();
                    exit;
                } else {
                    $_SESSION['error_login'] = 'Modificación fallida!!';
                }
            } else {
                // Campos obligatorios vacíos, manejar de acuerdo a tus necesidades
                echo "Campos obligatorios no pueden estar vacíos.";
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso de guardar
            echo "Error al modificar la contraseña: " . $e->getMessage();
        }
    }

    public function modificarPerfil()
    {
        $this->destruirSesionOpcion();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'modificarPerfil');
        // $this->redireccionar();
        header("Location:" . base_url);
    }
    public function modificar()
    {
        // Obtener valores de $_POST o ajustar según la fuente de datos
        $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : $_SESSION['miUsuario']['tipo_de_documento'];
        $numeroDocumento = isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : $_SESSION['miUsuario']['num_documento'];
        $primerNombre = isset($_POST['primerNombre']) ? $_POST['primerNombre'] : $_SESSION['miUsuario']['primer_nombre'];
        $segundoNombre = isset($_POST['segundoNombre']) ? $_POST['segundoNombre'] : $_SESSION['miUsuario']['segundo_nombre'];
        $primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : $_SESSION['miUsuario']['primer_apellido'];
        $segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : $_SESSION['miUsuario']['segundo_apellido'];
        $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : $_SESSION['miUsuario']['fecha_nacimiento'];
        // $edad = isset($_POST['edad']) ? $_POST['edad'] : $_SESSION['miUsuario']['edad'];
        $genero = isset($_POST['genero']) ? $_POST['genero'] : $_SESSION['miUsuario']['genero'];
        $roll = isset($_POST['roll']) ? $_POST['roll'] : $_SESSION['miUsuario']['id_roll'];
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : $_SESSION['miUsuario']['direccion'];
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : $_SESSION['miUsuario']['telefono'];
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : $_SESSION['miUsuario']['correo_electronico'];
        $user = isset($_POST['user']) ? $_POST['user'] : $_SESSION['miUsuario']['usuario'];

        try {
            // Verificar si los campos obligatorios no están vacíos
            if (!empty($tipoDocumento) && !empty($numeroDocumento) && !empty($primerNombre) && !empty($segundoNombre) && !empty($primerApellido) && !empty($segundoApellido) && !empty($fechaNacimiento)  && !empty($genero) && !empty($roll) && !empty($direccion) && !empty($telefono) && !empty($correoElectronico) && !empty($user)) {

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
                $edad = $usuario->calcularEdad();
                $usuario->setEdad($edad);
                $usuario->setGenero($genero);
                $usuario->setRoll($roll);
                $usuario->setDireccion($direccion);
                $usuario->setTelefono($telefono);
                $usuario->setCorreoElectronico($correoElectronico);
                $usuario->setUser($user);

                // ob_start(); // Activar el búfer de salida
                // Guardar el usuario (suponiendo que tienes un método guardar en la clase Usuario)
                $usuario->actualizar();
                // ob_end_clean(); // Limpiar (borrar) el contenido del búfer de salida sin enviarlo al navegador
                // ob_end_flush();
                $usuarioActualizado = $usuario->verUsuario();
                if ($usuarioActualizado) {
                    // Convertir el arreglo asociativo a un objeto si es necesario
                    $identityObject = (object) $usuarioActualizado;

                    // Actualizar la sesión $_SESSION['identity']
                    $_SESSION['identity'] = $identityObject;
                    // $this->destruirSesionOpcion();
                    $this->verPerfil();
                    // $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');
                    // header("Location: " . base_url );
                    // header("Location:" . base_url);
                    exit();
                }
            } else {
                // Campos obligatorios vacíos, manejar de acuerdo a tus necesidades
                echo "Campos obligatorios no pueden estar vacíos.";
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso de guardar
            echo "Error al guardar el usuario: " . $e->getMessage();
        }
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
        // $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $roll = isset($_POST['roll']) ? $_POST['roll'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';


        try {
            // Verificar si los campos obligatorios no están vacíos
            if (!empty($tipoDocumento) && !empty($numeroDocumento) && !empty($primerNombre) && !empty($segundoNombre) && !empty($primerApellido) && !empty($segundoApellido) && !empty($fechaNacimiento) && !empty($genero) && !empty($roll) && !empty($direccion) && !empty($telefono) && !empty($correoElectronico) && !empty($user) && !empty($password)) {

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
                $edad = $usuario->calcularEdad();
                $usuario->setEdad($edad);
                $usuario->setGenero($genero);
                $usuario->setRoll($roll);
                $usuario->setDireccion($direccion);
                $usuario->setTelefono($telefono);
                $usuario->setCorreoElectronico($correoElectronico);
                $usuario->setUser($user);
                $usuario->setPassword($password);

                ob_start(); // Activar el búfer de salida
                // Guardar el usuario (suponiendo que tienes un método guardar en la clase Usuario)
                $usuario->guardar();
                // Redireccionar a la página principal (o a la que desees)
                echo '<script>window.location.href = "' . base_url . '";</script>';
                exit;
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
            $usuario->setUser($_POST['user']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->loguearse();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                // var_dump($_SESSION['identity'] = $identity);
                // die();
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }
        }

        if ($_SESSION['identity']->id_roll != 4) {

            $this->verPerfil();
        } else {
            // echo "soy vigilante";
            // die();
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
        session_destroy();
        // header("Location: /");
        header("Location:" . base_url);
    }
}
