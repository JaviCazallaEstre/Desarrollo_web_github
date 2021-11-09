<?php
class Usuario
{
    private $id;
    private $nombre;
    private $correo;
    private $contrasena;
    private $roles;

    public function __construct($id, $nombre, $correo, $contrasena, $roles)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->roles = $roles;
    }

    public function __set($propiedad, $valor)
    {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }
    public function __get($propiedad)
    {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }
}
