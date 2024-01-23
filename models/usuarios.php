<?php

require_once "config/db.php";

class Usuario
{
    private $tipoDocumento;
    private $numeroDocumento;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $fechaNacimiento;
    private $edad;
    private $genero;
    private $roll;
    private $direccion;
    private $telefono;
    private $correoElectronico;
    private $user;
    private $password;
    public $db;


    public function __construct()
    {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            echo "Error de conexión: " . $e->getMessage();

            exit;
        }
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $this->db->real_escape_string($tipoDocumento);

        return $this;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $this->db->real_escape_string($numeroDocumento);

        return $this;
    }

    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $this->db->real_escape_string($primerNombre);

        return $this;
    }

    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $this->db->real_escape_string($segundoNombre);

        return $this;
    }

    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $this->db->real_escape_string($primerApellido);

        return $this;
    }

    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $this->db->real_escape_string($segundoApellido);

        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
    public function getGenero()
    {
        return $this->genero;
    }

    public function getRoll()
    {
        return $this->roll;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getuser()
    {
        return $this->user;
    }

    // Métodos Set para cada variable

    public function setGenero($genero)
    {
        $this->genero = $this->db->real_escape_string($genero);
        return $this;
    }

    public function setRoll($roll)
    {
        $this->roll = $this->db->real_escape_string($roll);
        return $this;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
        return $this;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $this->db->real_escape_string($telefono);
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $this->db->real_escape_string($user);
        return $this;
    }
    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $this->db->real_escape_string($edad);

        return $this;
    }

    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $this->db->real_escape_string($correoElectronico);

        return $this;
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function calcularEdad()
    {
        // Convertir las fechas a objetos DateTime
        $nacimiento = new DateTime($this->fechaNacimiento);
        $actual = new DateTime();

        // Calcular la diferencia en años
        $diferencia = $nacimiento->diff($actual);

        // Obtener el número de años
        $edad = $diferencia->y;

        return $edad;
    }

    public function actualizar()
    {
        // Asumiendo que tienes un campo único para identificar al usuario, por ejemplo, su ID
        $idUsuario = $_SESSION['identity']->id;

        // Construye la consulta UPDATE excluyendo la contraseña
        $sql = "UPDATE usuarios SET
            id_tipo_documento = '{$this->getTipoDocumento()}',
            num_documento = '{$this->getNumeroDocumento()}',
            primer_nombre = '{$this->getPrimerNombre()}',
            segundo_nombre = '{$this->getSegundoNombre()}',
            primer_apellido = '{$this->getPrimerApellido()}',
            segundo_apellido = '{$this->getSegundoApellido()}',
            fecha_nacimiento = '{$this->getFechaNacimiento()}',
            edad = '{$this->getEdad()}',
            id_generos = '{$this->getGenero()}',
            id_roll = '{$this->getRoll()}',
            direccion = '{$this->getDireccion()}',
            telefono = '{$this->getTelefono()}',
            correo_electronico = '{$this->getCorreoElectronico()}',
            usuario = '{$this->getUser()}'
            WHERE id = $idUsuario";

        if ($this->db->query($sql)) {
            return true;
            exit;
        } else {
            return false;
        }
    }

    public function guardar()
    {
        $sql = "INSERT INTO usuarios
        VALUES (NULL,'{$this->getTipoDocumento()}', '{$this->getNumeroDocumento()}', '{$this->getPrimerNombre()}', '{$this->getSegundoNombre()}', '{$this->getPrimerApellido()}', '{$this->getSegundoApellido()}', '{$this->getFechaNacimiento()}', '{$this->getEdad()}', '{$this->getGenero()}', '{$this->getRoll()}', '{$this->getDireccion()}', '{$this->getTelefono()}', '{$this->getCorreoElectronico()}', '{$this->getuser()}', '{$this->getPassword()}')";
        if ($this->db->query($sql)) {
            return true;

        } else {
            return false;
        }
    }
    public function loguearse()
    {
        $result = false;
        $user = $this->user;
        $password = $this->password;

        // comprobar si existe el user
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();

            // verificar la contraseña
            $verify = password_verify($password, $user->password);

            if ($verify) {
                $result = $user;
            }
        }

        return $result;
    }
    // Dentro de la clase Usuario
    public $lastSqlQuery;

    public function verUsuario()
    {
        $user = $_SESSION['identity']->id;

        // Construir la consulta SQL
        $sql = "SELECT usuarios.id, tipo_documento.descripcion AS tipo_de_documento, usuarios.num_documento,
                usuarios.primer_nombre, usuarios.segundo_nombre, usuarios.primer_apellido, usuarios.segundo_apellido,
                usuarios.fecha_nacimiento, usuarios.edad, generos.nombre as genero, roles.nombre as roll, roles.id as id_roll, usuarios.direccion,
                usuarios.telefono, usuarios.correo_electronico, usuarios.usuario, usuarios.password
            FROM usuarios 
            JOIN tipo_documento ON tipo_documento.id = usuarios.id_tipo_documento
            JOIN generos ON generos.id = usuarios.id_generos
            JOIN roles ON roles.id = usuarios.id_roll
            WHERE usuarios.id = $user";

        try {
            // Almacena la consulta SQL en una variable
            $this->lastSqlQuery = $sql;

            $result = $this->db->query($sql);

            if ($result === false) {
                throw new Exception("Error en la consulta.");
            }

            // Obtener los datos reales de la consulta
            $usuario = $result->fetch_assoc();
            // var_dump($usuario);
            // die();

            return $usuario;
        } catch (Exception $e) {
            // Manejar errores, puedes loguear el error o mostrar un mensaje genérico
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
