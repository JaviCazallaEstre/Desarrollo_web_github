<?php
include_once('UsuarioObjeto.php');
include_once('BD.php');
try {
    BD::creaConexion();
} catch (Exception $e) {
    print("Error al crear conexion");
}
if (isset($_POST["enviar"])) {
    $tamanoImagen = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($tamanoImagen !== false) {
        $foto = $_FILES["foto"]["tmp_name"];
        $contenidoFoto = file_get_contents($foto);
        $contenidoFoto = base64_encode($contenidoFoto);
        $usuario = new Usuario($_POST["id"], $_POST["nombre"], $_POST['correo'], $_POST["contrasena"], $_POST["roles"], $contenidoFoto);
        try {
            BD::meteUsuario($usuario);
        } catch (Exception $e) {
            print("Error al insertar");
        }
    } else {
        echo "No has seleccionado imagen";
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
    <form method="post" name="formulario" id="formulario" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="id">ID:</label></td>
                <td><input type="text" name="id" id="id" /></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" name="nombre" id="nombre" /></td>
            </tr>
            <tr>
                <td><label for="correo">Correo:</label></td>
                <td><input type="text" name="correo" id="correo" /></td>
            </tr>
            <tr>
                <td><label for="contrasena">Contrase&ntilde;a:</label></td>
                <td><input type="password" name="contrasena" id="contrasena" /></td>
            </tr>
            <tr>
                <td><label for="roles">Roles</label></td>
                <td><input type="text" id="roles" name="roles" /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto:</label></td>
                <td><input type="file" name="foto" id="foto" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
            </tr>
        </table>
    </form>
</body>

</html>