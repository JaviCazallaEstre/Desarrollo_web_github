<?php
include_once('ProductoObjeto.php');
class Cesta
{
    private $cesta = array();

    public function nuevoArticulo(Producto $p)
    {
        array_push($this->cesta, $p);
    }
    public function __get($cesta)
    {
        return $this->$cesta;
    }
    public function limpiaCesta()
    {
        unset($this->cesta);
        $this->cesta=array();
    }
    public static function muestraCesta(array $cesta){
        foreach ($cesta as $producto) {
           echo($producto);
        }
    }
    public static function costeCesta(array $cesta)
    {
        $suma = 0;
        foreach ($cesta as $producto) {
            $suma = $suma + $producto["precio"];
        }
        return $suma;
    }
}
