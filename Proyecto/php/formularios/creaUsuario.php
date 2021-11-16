<?php
include_once("../gestion/BD.php");
include_once("../entidades/usuarioObjeto.php");
function validateDateEs($date)
{
    $pattern = "/^(0?[1-9]|[12][0-9]|3[01])[\/|-](0?[1-9]|[1][012])[\/|-]((19|20)?[0-9]{2})$/";
    if (preg_match($pattern, $date)) {
        $values = preg_split("[\/|-]", $date);
        if (checkdate($values[1], $values[0], $values[2]))
            return true;
    }
    return false;
}
if (isset($_POST)) {
    $errores = array();
    if ($_POST["email"] == "") {
        $errores["email"] = "Debes de introducir un email";
    } else if (!($_POST["email"] == filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
        $errores["email"] = "El email introducido no es válido";
    }
    if ($_POST["nombre"] == "") {
        $errores["nombre"] = "El campo nombre no puede estar vacio";
    } else if (preg_match("*[0-9]*", $_POST["nombre"])) {
        $errores["nombre"] = "El campo nombre no puede tener numeros";
    }
    if ($_POST["apellidos"] == "") {
        $errores["apellidos"] = "El campo de los apellidos no puede estar vacio";
    } else if (preg_match("*[0-9]*", $_POST["apellidos"])) {
        $errores["apellidos"] = "El campo de los apellidos no puede tener numeros";
    }
    if ($_POST["contrasena"] == "") {
        $errores["contrasena"] = "La contrase&ntilde;a debe de estar rellena";
    }
    if ($_POST["contrsenaIgual"] == "") {
        $errores["contrasenaIgual"] = "El confirmar contrase&ntilde;a debe de estar relleno";
    } else if ($_POST["contrasena"] != $_POST["contrasenaIgual"]) {
        $errores["contrasenaIgual"] = "Las contrase$ntilde;as no coinciden deben de ser iguales";
    }
    if ($_POST["fecha"] == "") {
        $errores["fecha"] = "El campo fecha debe de estar relleno";
    } else if (!(validateDateEs($_POST["fecha"]))) {
        $errores["fecha"] = "El campo fecha no es válido";
    }

    if (count($errores) == 0) {
        if (isset($_FILES["foto"])) {
            $usuario = new Usuario($_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["contrasena"], $_POST["fecha"], $_FILES["foto"], null);
        } else {
            $usuario = new Usuario($_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["contrasena"], $_POST["fecha"], null, null);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea usuario</title>
</head>

<body>
    <h1>Alta de usuario</h1>
    <form id="formu" name="formu" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input type="text" id="email" name="email" value=<?php
                        if(isset($errores["email"])){
                            echo "";
                        }else{
                            
                        }
                    ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label>
                </td>
                <td>
                    <input type="text" id="nombre" name="nombre" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellidos">Apellidos:</label>
                </td>
                <td>
                    <input type="text" id="apellidos" name="apellidos" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contrasena">Contrase&ntilde;a:</label>
                </td>
                <td>
                    <input type="password" id="contrasena" name="contrasena" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contrasenaIgual">Confirmar contrase&ntilde;a:</label>
                </td>
                <td>
                    <input type="password" id="contrasenaIgual" name="contrasenaIgual" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fecha">Fecha de nacimiento:</label>
                </td>
                <td>
                    <input type="date" id="fecha" name="fecha" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto">Foto de perfil:</label>
                </td>
                <td>
                    <input type="file" id="foto" name="foto" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="crear" name="crear" value="Crear" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>