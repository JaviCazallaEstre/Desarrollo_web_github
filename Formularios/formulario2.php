<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["enviar"])) {
        $errores = validaFormulario();
    }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?php
                                                if (isset($errores['nombre'])) {
                                                    echo '';
                                                } else if (isset($_POST['nombre'])) {
                                                    echo $_POST['nombre'];
                                                } else {
                                                    echo '';
                                                }
                                                ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['nombre']) ? $errores['nombre'] : '';
                ?>
            </span></p>
        <br />
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?php
                                                    if (isset($errores['apellidos'])) {
                                                        echo '';
                                                    } else if (isset($_POST['apellidos'])) {
                                                        echo $_POST['apellidos'];
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['apellidos']) ? $errores['apellidos'] : '';
                ?>
            </span></p>
        <br />
        <label for="DNI">DNI</label>
        <input type="text" name="DNI" value="<?php
                                                if (isset($errores['DNI'])) {
                                                    echo '';
                                                } else if (isset($_POST['DNI'])) {
                                                    echo $_POST['DNI'];
                                                } else {
                                                    echo '';
                                                }
                                                ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['DNI']) ? $errores['DNI'] : '';
                ?>
            </span></p>
        <br />
        <label for="fechaNac">Fecha nacimiento</label>
        <input type="text" name="fechaNac" value="<?php
                                                    if (isset($errores['fechaNac'])) {
                                                        echo '';
                                                    } else if (isset($_POST['fechaNac'])) {
                                                        echo $_POST['fechaNac'];
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['fechaNac']) ? $errores['fechaNac'] : '';
                ?>
            </span></p>
        <br />
        <label for="correo">Correo electr&oacute;nico</label>
        <input type="text" name="correo" value="<?php
                                                if (isset($errores['correo'])) {
                                                    echo '';
                                                } else if (isset($_POST['correo'])) {
                                                    echo $_POST['correo'];
                                                } else {
                                                    echo '';
                                                }
                                                ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['correo']) ? $errores['correo'] : '';
                ?>
            </span></p>
        <br />
        <label for="web">P&aacute;gina web</label>
        <input type="text" name="web" value="<?php
                                                if (isset($errores['web'])) {
                                                    echo '';
                                                } else if (isset($_POST['web'])) {
                                                    echo $_POST['web'];
                                                } else {
                                                    echo '';
                                                }
                                                ?>" />
        <p><span style="color:red">
                <?php
                echo isset($errores['web']) ? $errores['web'] : '';
                ?>
            </span></p>
        <br />
        <input type="checkbox" name="zumos[]" value="piña" <?php
                                                            if (isset($_POST['zumos']) && in_array("piña", $_POST['zumos']))
                                                                echo 'checked="checked"';
                                                            ?> />
        Zumo de pi&ntilde;a
        <br />
        <input type="checkbox" name="zumos[]" value="naranja" <?php
                                                                if (isset($_POST['zumos']) && in_array("naranja", $_POST['zumos']))
                                                                    echo 'checked="checked"';
                                                                ?> />
        Zumo de naranja
        <br />
        <button type="submit" name="enviar">Enviar</button>
    </form>
    <?php
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
        $patronDNI = "^\d{8}[a-zA-Z]{1}$^";
        if (preg_match($patronDNI, $_POST["DNI"]) == 0) {
            $errores["DNI"] = "El formato del campo\"DNI\" no es correcto";
        }
        if ($_POST["fechaNac"] == "") {
            $errores["fechaNac"] = "El campo \"fechaNac\" es obligatorio";
        }
        $sep = "[\/\-\.]";
        $patronFecha = "#^(((0?[1-9]|1\d|2[0-8]){$sep}(0?[1-9]|1[012])|(29|30){$sep}(0
        ?[13456789]|1[012])|31{$sep}(0?[13578]|1[02])){$sep}(19|[2-9]\d)\d{2}|29{$sep}0?
        2{$sep}((19|[2-9]\d)(0[48]|[2468][048]|[13579][26])|(([2468][048]|[3579][26])00)))$#";
        if (preg_match($patronFecha, $_POST["fechaNac"]) == 0) {
            $errores["fechaNac"] = "La fecha introducida no es valida";
        }
        if ($_POST["correo"] == "") {
            $errores["correo"] = "El campo \"correo\" es obligatorio";
        }
        if (!($_POST["correo"] == filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL))) {
            $errores["correo"] = "El correo introducido no es válido";
        }
        if ($_POST["web"] == "") {
            $errores["web"] = "El campo \"web\" es obligatorio";
        }
        if (!($_POST["web"] == filter_var($_POST["web"], FILTER_VALIDATE_URL))) {
            $errores["web"] = "La web introducida no es válida";
        }
        return $errores;
    }
    ?>
</body>

</html>