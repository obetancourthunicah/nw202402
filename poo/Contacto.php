<?php

class Contacto
{
    // Atributos 
    private $codigo;
    private $nombre;
    private $telefono;
    private $email;
    private $direccion;

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        // Un punto de Validaciones
        $this->codigo = $codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function __construct(
        $codigo = 0,
        $nombre = "",
        $telefono = "",
        $email = "",
        $direccion = ""
    ) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
    }

    public function toAssocArray()
    {
        return [
            "codigo" => $this->codigo,
            "nombre" => $this->nombre,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "direccion" => $this->direccion
        ];
    }

    public function toJson()
    {
        return json_encode($this->toAssocArray());
    }
    // Métodos
    // constructores
}
