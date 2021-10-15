<?php
include("../Entidades/Producto.php");
class ProductosDB
{
    public static $productos = array();

    public static function obtieneProductos()
    {
        return self::$productos;
    }

    public static function obtieneProductoCodigo($codigo)
    {
        if (isset($productos[$codigo])) {
            return self::$productos[$codigo];
        }
    }

    public static function borraProducto($codigo)
    {
        if (isset($productos[$codigo])) {
            unset($productos[$codigo]);
        }
    }
}
