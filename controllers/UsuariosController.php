<?php
require_once "models/usuarios.php";
class UsuariosController
{

    public function registrar()
    {
        require_once "views/usuarios/registro.php";
    }
    // la sesion nav es para la barra de navegacion. de acuerdo al enlace que se seleccione
    public function destruirSesionMenu(){
        // esta funcion nos ayuda a destruir la sesion nav
        unset($_SESSION['nav']);
    }
    public function destruirSesionOpcion()
    {
        // esta funcion nos ayuda a destruir la sesion opcion
        unset($_SESSION['opcion']);
    }
    public function redireccionar(){
        // esta funcion nos recarga la página.
        require_once 'views/helper/redireccionar.php';
    }
    // utilizamos sesiones para asi mostrar lo correspondiente en el aside y el main.
    // la sesion nav es un array asociativo. el menu es para la opcion seleccionada en la barra de navegacion y opcion, es para seleccionar la opcion hecha en el aside.
    public function miPerfil(){
        // eliminamos toda sesion de nav

        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');
        $this->redireccionar();
    }
    public function hacerRegistro(){
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu'=> 'hacerRegistro' );
        $this->redireccionar();
    }
    public function informes(){
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'informes');
        $this->redireccionar();
    }
    public function crearVigilante(){
        $this->destruirSesionMenu();
        $_SESSION['nav'] = array('menu' => 'crearVigilante');
        $this->redireccionar();
    }
    // aqui debemos hacer las sesiones para las opciones del aside segun la opcion seleccionada de la barra de mavegacion
    public function verPerfil()
    {
        $this->destruirSesionOpcion();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'verPerfil');

        // Crear una instancia del usuario
        $user = new Usuario;

        // Llamar a la función para obtener el usuario
        $_SESSION['miUsuario'] = $user->verUsuario();
        // var_dump($_SESSION['miUsuario']);
        // var_dump($usuario);
        // die();

        // Verificar si la consulta fue exitosa
        if ($_SESSION['miUsuario'] !== false) {
            // Incluir la vista que mostrará la información del usuario
            // require_once 'views/usuarios/verPerfil.php';
            $this->redireccionar();
        } else {
            // Manejar el caso en que la consulta no fue exitosa
            echo "Error al obtener la información del usuario.";
        }

        // Puedes redireccionar si es necesario
    }
    public function modificarPerfil()
    {
        $this->destruirSesionOpcion();
        $_SESSION['nav'] = array('menu' => 'miPerfil', 'opcion' => 'modificarPerfil');
        $this->redireccionar();
    } 
    public function modificar(){
        
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
            $usuario->setContrasena($_POST['contrasena']);

            $identity = $usuario->loguearse();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }
        }
        if($_SESSION['identity']->id_roll!=4){

            $this->verPerfil();
        }else{
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
        header("Location:" . base_url);
    }
}
