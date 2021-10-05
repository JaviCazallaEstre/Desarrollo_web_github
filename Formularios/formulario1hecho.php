<?php
include_once("../lib/Libreria.php");
if (isset($_POST["sumar"])) {
    if (validaFomularioNumerico($_POST["numero1"], $_POST["numero2"])) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $suma = $num1 + $num2;
        $mensaje="La suma es: ";
        header("Location:formulario1.php?mensaje=".$mensaje."&suma=". $suma);
    } else {
        header("Location:formulario1.php");
    }
}else if(isset($_POST["restar"])){
    if (validaFomularioNumerico($_POST["numero1"], $_POST["numero2"])) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $resta = $num1 - $num2;
        $mensaje="La resta es: ";
        header("Location:formulario1.php?mensaje=".$mensaje."&resta=". $resta);
    } else {
        header("Location:formulario1.php");
    }
}else if(isset($_POST["multiplicar"])){
    if (validaFomularioNumerico($_POST["numero1"], $_POST["numero2"])) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $multi = $num1 * $num2;
        $mensaje="La multiplicacion es: ";
        header("Location:formulario1.php?mensaje=".$mensaje."&multiplicar=". $multi);
    } else {
        header("Location:formulario1.php");
    }
}else if(isset($_POST["dividir"])){
    if (validaFomularioNumerico($_POST["numero1"], $_POST["numero2"])) {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $division = $num1 / $num2;
        $mensaje="La division es: ";
        header("Location:formulario1.php?mensaje=".$mensaje."&division=". $division);
    } else {
        header("Location:formulario1.php");
    }
}
