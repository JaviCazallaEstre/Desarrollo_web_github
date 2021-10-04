<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Primera pagina</title>
</head>

<body>
    <?php
    $numero = $_GET["numero"];
    if (isset($numero)) {
        for ($a = 1; $a < 11; $a++) {
            if ($a < 10 && $numero * $a < 10) {
                echo $numero . " x " . $a . " = " . "&nbsp &nbsp" . $numero * $a . "</br>";
                
            } elseif ($a < 10 && $numero * $a >= 10) {
                echo $numero . " x " . $a . " = " . "&nbsp" . $numero * $a . "</br>";
            } else {
                echo $numero . " x " . $a . " = " . $numero * $a . "</br>";
            }
        }
    }
    ?>
</body>

</html>