<?php
include_once("../lib/Libreria.php");
if (isset($_POST["enviar"])) {
    if (validaFomularioNumerico($_POST["numero1"], $_POST["numero2"])) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $suma = $num1 + $num2;
        pinta($suma);
        header("Location:formulario1.?suma=". $suma);
    } else {
        header("Location:formulario1.php");
    }
}
