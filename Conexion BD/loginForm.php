<?php
include_once("sesion.php");
include_once("BD.php");

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
                    <input type="text" name="usuario" id="usuario"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contrasena">Contrase&ntilde;a</label>
                </td>
                <td>
                    <input type="password" name="contrasena" id="contrasena"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="contrasena"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>