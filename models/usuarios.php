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
    private $usuario;
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

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;

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
        $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getPrimerNombre()}', '{$this->getSegundoNombre()}', '{$this->getPrimerApellido()}', '{$this->getSegundoApellido()}', '{$this->getFechaNacimiento()}', '{$this->getEdad()}', '{$this->getCorreoElectronico()}', '{$this->getContrasena()}')";
        if ($this->db->query($sql)) {
            // Éxito: registro insertado correctamente
            echo "Usuario insertado correctamente";
            die();
        } else {
            // Error al insertar el registro
            echo "Error al insertar usuario: " . $this->db->error;
            die();
        }
    }
    public function loguearse()
    {
        $result = false;
        $correoElectronico = $this->correoElectronico;
        $contrasena = $this->contrasena;

        // comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE correoElectronico = '$correoElectronico'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            // verificar la contraseña
            $verify = password_verify($contrasena, $usuario->contrasena);

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
