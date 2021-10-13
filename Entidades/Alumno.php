<?php
class Alumno
{
    private $nombre;
    private $apellidos;
    private $dni;
    private $fechaNac;
    private $correo;
    private $web;
    private $zumos = [];

    public function __construct($nombre, $apellidos, $dni, $fechaNac, $correo, $web, $zumos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->fechaNac = $fechaNac;
        $this->correo = $correo;
        $this->web = $web;
        $this->zumos = $zumos;
    }
    public function __set($propiedad,$valor)
    {
        if(property_exists($this,$propiedad)){
            $this->$propiedad=$valor;
        }
    }
    public function __get($propiedad)
    {
        if(property_exists($this,$propiedad)){
            return $this->$propiedad;
        }
    }
}
