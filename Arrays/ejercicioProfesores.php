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
    $roma = array("Manolo", "Javi", "Alberto", "Kike", "Manuel");
    $polonia = array("Isa", "Rocío", "Verónica", "Marco", "Juan");
    $profesores = array(
        "Manolo", "Javi", "Alberto", "Kike", "Manuel", "Isa",
        "Rocío", "Verónica", "Marco", "Juan", "Miguel", "Jesús", "Cristo", "Hermes", "Pepe", "Ulises", "Luca"
    );
    $dublin = array_diff($profesores, $roma, $polonia);
    var_dump($dublin);
    ?>
</body>

</html>