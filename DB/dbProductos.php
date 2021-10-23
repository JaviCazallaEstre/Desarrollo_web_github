<?php
require_once("../Entidades/ProductoObjeto.php");
class ProductosDB
{
    public static $productos = array();

    public static function obtieneProductos()
    {
        return self::$productos;
    }

    public static function obtieneProductoCodigo($codigo)
    {
        if (isset(self::$productos[$codigo])) {
            return self::$productos[$codigo];
        }
    }

    public static function borraProducto($codigo)
    {
        if (isset($productos[$codigo])) {
            unset($productos[$codigo]);
        }
    }

    public static function añadeProducto(Producto $p)
    {
        if (!isset($productos[$p["codigo"]])) {
            self::$productos[$p["codigo"]] = $p;
        }
    }

    public static function rellenaArray()
    {
        self::$productos[1] = new Producto(1, "Manzana", 5);
        self::$productos[2] = new Producto(2, "Pera", 4);
        self::$productos[3] = new Producto(3, "Naranja", 3);
        self::$productos[4] = new Producto(4, "Sandia", 9);
        self::$productos[5] = new Producto(5, "Fresa", 8);
        return self::$productos;
    }
}
