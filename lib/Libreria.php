<?php
function estiloLinea($texto, $num = 0)
{
    if ($num >= 0 && $num <= 6) {
        if ($num == 0) {
            $estilo = $texto;
        } elseif ($num == 1) {
            $estilo = "<h1>" . $texto . "</h1>";
        } elseif ($num == 2) {
            $estilo = "<h2>" . $texto . "</h2>";
        } elseif ($num == 3) {
            $estilo = "<h3>" . $texto . "</h3>";
        } elseif ($num == 4) {
            $estilo = "<h4>" . $texto . "</h4>";
        } elseif ($num == 5) {
            $estilo = "<h5>" . $texto . "</h5>";
        } else {
            $estilo = "<h6>" . $texto . "</h6>";
        }
    } else {
        $estilo = $texto;
    }
    return $estilo;
}
function miVarDump(array $lista)
{
    echo ($_SERVER['DOCUMENT_ROOT'] . "</br>");
    echo ("<b>array</b> (size " . count($lista) . ")</br>");
    for ($i = 0; $i < count($lista); $i++) {
        echo ($i . "<font color=\"#888a85\">=></font> " . gettype($lista[$i]) . " <font color=\"#4e9a06\">$lista[$i]</font></br>");
    }
}
function validaFomularioNumerico($num1, $num2)
{
    if (empty($num1)) {
        $errores["numero1"] = "El primer numero no existe";
    } else if (!is_numeric($num1)) {
        $errores["numero1"] = "El primer número no es numerico";
    }
    if (empty($num2)) {
        $errores["numero2"] = "El segundo numero no existe";
    } else if (!is_numeric($num2)) {
        $errores["numero2"] = "El segundo numero no es numerico";
    }
    return $errores;
}
function pinta($pintar)
{
    echo $pintar;
}
