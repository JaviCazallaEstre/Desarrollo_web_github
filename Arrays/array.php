<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <?php
        include("../lib/Libreria.php");
    ?>
</head>
<body>
    <?php
    $numeroAleatorio;
    $nuemros=array();
    for($i=0; $i<20;$i++){
        do{
            $numeroAleatorio= rand(1,100);
        }while(in_array($numeroAleatorio,$nuemros));
        $numeros[$i]=$numeroAleatorio;
    }
    sort($numeros);
    miVarDump($numeros);
    ?>
</body>
</html>