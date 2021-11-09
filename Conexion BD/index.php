<?php
include_once('UsuarioObjeto.php');
include_once('BD.php');
try {
    BD::creaConexion();
} catch (Exception $e) {
    print("Error al crear conexion");
}
if (isset($_POST["enviar"])) {
    $usuario = new Usuario($_POST["id"], $_POST["nombre"], $_POST['correo'], $_POST["contrasena"], $_POST["roles"]);
    try {
        BD::meteUsuario($usuario);
    } catch (Exception $e) {
        print("Error al insertar");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" name="formulario" id="formulario">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" />
        <br />
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" />
        <br />
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" />
        <br />
        <label for="contrasena">Contrase&ntilde;a:</label>
        <input type="password" name="contrasena" id="contrasena" />
        <br />
        <label for="roles">Roles</label>
        <input type="text" id="roles" name="roles" />
        <br />
        <input type="submit" name="enviar" id="enviar" value="Enviar" />
    </form>
</body>

</html>