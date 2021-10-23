<?php
require_once('../Entidades/CestaObjeto.php');
require_once('../DB/dbProductos.php');
session_start();
$cesta = Cesta::carga_cesta();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/Final.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <div class="contenido">
            <div class="encabezado">
                <h1 class="titulo">Resumen compra</h1>
            </div>
            <div class="listado">
                <?php
                $productos = $cesta->get_productos();
                if (count($productos) > 0) {
                    foreach ($productos as $p => $producto) {
                        $codigo = $producto->getCodigo();
                        $nombre = $producto->getNombre();
                        $precio = $producto->getPrecio();
                        echo "<p><span class='codigo'>$codigo </span>";
                        echo "<span class='nombre'>$nombre </span>";
                        echo "<span class='precio'>$precio €</span></p>";
                    }
                }
                ?>
            </div>
            <div class='pagar'>
            <p><span>Precio total: <?php print $cesta->costeCesta(); ?> €</span></p>
            <p>Gracias por comprar</p>
            </div>
        </div>
    </div>
    <?php
    session_destroy();
    ?>
</body>

</html>