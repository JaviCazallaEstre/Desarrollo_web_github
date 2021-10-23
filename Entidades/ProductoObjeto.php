<?php
class Producto
{
    protected $codigo;
    protected $nombre;
    protected $precio;

    public function __construct($codigo, $nombre, $precio)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    public function __set($propiedad, $valor)
    {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function __toString()
    {
        return $this->codigo . " " . $this->nombre . " " . $this->precio;
    }
}
