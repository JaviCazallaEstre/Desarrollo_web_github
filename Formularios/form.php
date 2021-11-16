<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="nombre">
        <input type="text" name="apellidos">

        <input type="submit" name="boton" value="Te digo tu nombre">
        <input type="submit" name="botonCaps" value="Pasar a mayúscula">
    </form>
    <?php




    $sentencia = "INSERT INTO users VALUES($usuario->id,'$usuario->nombre','$usuario->correo',
                                            '$usuario->contrasena','$usuario->roles')";








    if (isset($_POST["boton"])) {
        validaNombre($_POST["nombre"], $_POST["apellidos"]);
    }

    if (isset($_POST["botonCaps"])) {
        $_POST["nombre"] = strtoupper($_POST["nombre"]);
        $_POST["apellidos"] = strtoupper($_POST["apellidos"]);
        validaNombre($_POST["nombre"], $_POST["apellidos"]);
    }

    function validaNombre(String $nombre, String $Apellidos)
    {
        $errores = [];

        if ($_POST["nombre"] == "") {
            $errores["nombre"] = "Error: Campo \"Nombre\" vacio.";
        }
        if ($_POST["apellidos"] == "") {
            $errores["apellidos"] = "Error: Campo \"Apellido\" vacio.";
        }
        if (preg_match("*[0-9]*", $_POST["nombre"])) {
            $errores["nombre"] = "Error: Dudo que tu nombre tenga números.";
        }
        if (preg_match("*[0-9]*", $_POST["apellidos"])) {
            $errores["apellidos"] = "Error: Dudo que tus apellidos tenga números.";
        }
        if (count($errores) == 0) {
            pintaNombre($_POST);
        } else {
            foreach ($errores as $key => $value) {
                echo "<p style=\"color:red\">{$key} => {$value} </p><br>";
            }
        }
    }
    function pintaNombre(array $array)
    {
        if (isset($_POST["boton"])) {
            echo "<p> Te llamas " . $array["nombre"] . " " . $array["apellidos"] . ".</p>";
        } else if (isset($_POST["botonCaps"])) {
            echo "<p> TE LLAMAS " . $array["nombre"] . " " . $array["apellidos"] . ".</p>";
        }
    }
    ?>
</body>

</html>