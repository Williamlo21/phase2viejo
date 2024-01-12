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
    private $contrasena;
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

    public function setUser($user) {
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

    public function getContrasena()
    {
        return password_hash($this->db->real_escape_string($this->contrasena), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    public function guardar()
    {
        $sql = "INSERT INTO users 
        VALUES (NULL,'{$this->getTipoDocumento()}', '{$this->getNumeroDocumento()}', '{$this->getPrimerNombre()}', '{$this->getSegundoNombre()}', '{$this->getPrimerApellido()}', '{$this->getSegundoApellido()}', '{$this->getFechaNacimiento()}', '{$this->getEdad()}', '{$this->getGenero()}', '{$this->getRoll()}', '{$this->getDireccion()}', '{$this->getTelefono()}', '{$this->getCorreoElectronico()}', '{$this->getuser()}', '{$this->getContrasena()}')";
        if ($this->db->query($sql)) {
            // Éxito: registro insertado correctamente
            echo "user registrado correctamente";
            die();
        } else {
            // Error al insertar el registro
            echo "Error al insertar user: " . $this->db->error;
            die();
        }
    }
    public function loguearse()
    {
        $result = false;
        $user = $this->user;
        $contrasena = $this->contrasena;

        // comprobar si existe el user
        $sql = "SELECT * FROM users WHERE user = '$user'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();

            // verificar la contraseña
            $verify = password_verify($contrasena, $user->contrasena);

            if ($verify) {
                $result = $user;
            }
        }
        return $result;
    }
}
