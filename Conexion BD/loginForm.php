<?php
include_once("sesion.php");
include_once("BD.php");
bd::creaConexion();
if (isset($_POST["enviar"])) {
    if ($_POST["usuario"] != "" && $_POST["contrasena"] != "") {
        if (bd::existeUsuario($_POST["usuario"], $_POST["contrasena"])) {
            Session::escribir("usuario", $_POST["usuario"]);
            Session::escribir("contrasena", $_POST["contrasena"]);
            if($_POST["recuerdame"]=='on'){
                setcookie("usuario",$_POST["usuario"],time()+3600);
                setcookie("contrasena",$_POST["contrasena"],time()+3600);
                setcookie("recuerdame",$_POST["recuerdame"],time()+3600);
            }
            echo ("<p>Login con exito</p>");
        } else {
            echo ("<p>Datos erroneos</p>");
        }
    } else {
        echo ("<p>Hay campos que no han sido rellenos</p>");
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
    <form method="post" name="form" id="form">
        <table>
            <tr>
                <td>
                    <label for="usuario">Usuario:</label>
                </td>
                <td>
                    <input type="text" name="usuario" id="usuario" value=
                    <?php
                        if(isset($_COOKIE)){
                            if(isset($_COOKIE["usuario"])&& isset($_COOKIE["contrasena"])){
                                echo $_COOKIE["usuario"];
                            }else{
                                echo "";
                            }
                        }
                    ?> />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contrasena">Contrase&ntilde;a</label>
                </td>
                <td>
                    <input type="password" name="contrasena" id="contrasena" value=
                    <?php
                        if(isset($_COOKIE)){
                            if(isset($_COOKIE["usuario"])&& isset($_COOKIE["contrasena"])){
                                echo $_COOKIE["contrasena"];
                            }else{
                                echo "";
                            }
                        }
                    ?> />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="recuerdame">Recuerdame</label>
                </td>
                <td>
                    <input type="checkbox" name="recuerdame" id="recuerdame"
                    <?php
                    if(isset($_COOKIE["recuerdame"])=='on'){
                        echo "checked";
                    }else{
                        unset($_COOKIE);
                    }
                    ?>
                    />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="enviar" value="Enviar" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>