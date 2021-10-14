<?php
include("../Entidades/Producto.php");
class ProductosDB{
   public static $productos=array(
       Producto[]
   );

   public static function obtieneProductos(){
       return $productos;
   }
}