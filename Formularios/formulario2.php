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
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        <br />
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" />
        <br />
        <label for="DNI">DNI</label>
        <input type="text" name="DNI" />
        <br />
        <label for="fechaNac">Fecha nacimiento</label>
        <input type="text" name="fechaNac" />
        <br />
        <label for="correo">Correo electr&oacute;nico</label>
        <input type="text" name="correo" />
        <br />
        <label for="web">P&aacute;gina web</label>
        <input type="text" name="web" />
        <br />
        <button type="submit" name="enviar">Enviar</button>
    </form>
    <?php
    if (isset($_POST["enviar"])) {
        validaFormulario();
    }
    function validaFormulario()
    {
        $errores = [];
        if ($_POST["nombre"] == "") {
            $errores["nombre"] = "El campo \"nombre\" es obligatorio.";
        }
        if ($_POST["apellidos"] == "") {
            $errores["apellidos"] = "El campo \"apellidos\" es obligatorio.";
        }
        if (preg_match("*[0-9]*", $_POST["nombre"])) {
            $errores["nombre"] = "El campo \"nombre\" no puede tener numeros";
        }
        if (preg_match("*[0-9]*", $_POST["apellidos"])) {
            $errores["apellidos"] = "El campo \"apellidos\" no puede tener numeros";
        }
        if ($_POST["DNI"] == "") {
            $errores["DNI"] = "El campo \"DNI\" es obligatorio";
        }
        if (preg_match("/[0-9]{7,8}[A-Z]/", $_POST["DNI"])) {
            $errores["DNI"] = "El formato del campo\"DNI\" no es correcto";
        }
        if ($_POST["fechaNac"] == "") {
            $errores["fechaNac"] = "El campo \"fechaNac\" es obligatorio";
        }
        $patronDni = "^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})(\s)([0-1][1-9]|[2][0-3])(:)([0-5][0-9])$";
        if (preg_match($patronDni, $_POST["fechaNac"])) {
            $errores["fechaNac"]="La fecha introducida no es valida";
        }
        if ($_POST["correo"] == "") {
            $errores["correo"] = "El campo \"correo\" es obligatorio";
        }
    }
    ?>
</body>

</html>