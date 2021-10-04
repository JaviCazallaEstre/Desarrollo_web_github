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
    $roma = array("Manolo", "Javi", "Alberto", "Kike", "Manuel", "Isa", "Rocío", "Verónica", "Marco", "Juan");
    $polonia = array("Isa", "Rocío", "Verónica", "Marco", "Juan", "Alberto", "Kike", "Manuel");
    $viajes = array_merge($polonia, $roma);
    $cuentaViajes = array_count_values($viajes);
    var_dump($cuentaViajes);
    ?>
</body>

</html>