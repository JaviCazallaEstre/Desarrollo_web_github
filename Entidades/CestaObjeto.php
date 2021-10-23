<?php
require_once('ProductoObjeto.php');
class Cesta
{
    protected $cesta = array();

    public function nuevo_articulo($codigo)
    {
        $producto = ProductosDB::obtieneProductoCodigo($codigo);
        $this->cesta[] = $producto;
    }

    public function get_productos()
    {
        return $this->cesta;
    }

    public function limpiaCesta()
    {
        unset($this->cesta);
        $this->cesta = array();
    }
    public static function muestraCesta(array $cesta)
    {
        foreach ($cesta as $producto) {
            echo ($producto);
        }
    }
    public  function costeCesta()
    {
        $suma = 0;
        foreach ($this->cesta as $producto) {
            $suma = $suma + $producto->getPrecio();
        }
        return $suma;
    }
    public function guarda_cesta()
    {
        $_SESSION['cesta'] = $this;
    }
    public static function carga_cesta()
    {
        if (!isset($_SESSION['cesta'])) {
            return new Cesta();
        } else {
            return $_SESSION['cesta'];
        }
    }
}
