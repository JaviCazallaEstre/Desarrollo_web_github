<?php
include_once("../lib/Libreria.php");
$errores = validaFomularioNumerico($_POST["numero1"], $_POST["numero2"]);
if (isset($_POST["sumar"])) {
    if (count($errores) == 0) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $suma = $num1 + $num2;
        $mensaje = "La suma es: ";
        header("Location:formulario1.php?mensaje=" . $mensaje . "&suma=" . $suma);
    }
} else if (isset($_POST["restar"])) {
    if (count($errores) == 0) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $resta = $num1 - $num2;
        $mensaje = "La resta es: ";
        header("Location:formulario1.php?mensaje=" . $mensaje . "&resta=" . $resta);
    } 
} else if (isset($_POST["multiplicar"])) {
    if (count($errores) == 0) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $multi = $num1 * $num2;
        $mensaje = "La multiplicacion es: ";
        header("Location:formulario1.php?mensaje=" . $mensaje . "&multiplicar=" . $multi);
    }
} else if (isset($_POST["dividir"])) {
    if (count($errores) == 0) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $division = $num1 / $num2;
        $mensaje = "La division es: ";
        header("Location:formulario1.php?mensaje=" . $mensaje . "&division=" . $division);
    }
}
if (count($errores) > 0) {
    var_dump($errores);
}
