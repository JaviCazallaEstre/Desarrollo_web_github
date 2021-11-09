<?php
include_once('UsuarioObjeto.php');
class BD
{
    private static $conexion;
    public static function creaConexion()
    {
        self::$conexion = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
    }

    public static function meteUsuario(Usuario $usuario)
    {
        $id = $usuario->id;
        $nombre = $usuario->nombre;
        $correo = $usuario->correo;
        $contrasena = $usuario->contrasena;
        $roles = $usuario->roles;
        $sentencia = "INSERT INTO users VALUES(:ID, :Nombre, :Correo, :Password, :Roles)";
        $registros = self::$conexion->prepare($sentencia);
        $registros->bindParam(':ID', $id);
        $registros->bindParam(':Nombre', $nombre);
        $registros->bindParam(':Correo', $correo);
        $registros->bindParam(':Password', $contrasena);
        $registros->bindParam(':Roles', $roles);
        $registros->execute();
    }
}
