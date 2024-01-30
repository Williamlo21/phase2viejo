<?php
require_once 'config/db.php';
class vehiculos{
    private $id;
    private $user;
    private $tipo;
    private $marca;
    private $placa;
    public $db;
    // user es el id del usuario
    // id_tipo de vehiculo (carro o moto)
    // id_marca


    public function __construct()
    {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            echo "Error de conexión: " . $e->getMessage();

            exit;
        }
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $this->db->real_escape_string($user);

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $this->db->real_escape_string($tipo);

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $this->db->real_escape_string($marca);

        return $this;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $this->db->real_escape_string($placa); 

        return $this;
    }
}