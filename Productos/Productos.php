<?php
require_once('../Entidades/ProductoObjeto.php');
require_once('../Entidades/CestaObjeto.php');
require_once('../DB/dbProductos.php');
session_start();
$productos = ProductosDB::rellenaArray();
$cesta = Cesta::carga_cesta();

if (isset($_POST['enviar'])) {
    $cesta->nuevo_articulo($_POST['codigo']);
    $cesta->guarda_cesta();
}
function creaFormularioProductos($productos)
{
    foreach ($productos as $p) {
        $codigo = $p->getCodigo();
        $nombre = $p->getNombre();
        $precio = $p->getPrecio();
        echo "<p><form id='$codigo' action='productos.php' method='post'>";
        echo "<input type='hidden' name='codigo' value='" . $codigo . "'/>";
        echo "<input type='hidden' name='nombre' value='" . $nombre . "'/>";
        echo "<input type='hidden' name='precio' value='" . $precio . "'/>";
        echo "<input type='submit' name='enviar' value='Añadir'/>";
        echo " $nombre: ";
        echo $precio . " euros.";
        echo "</form>";
        echo "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/Productos.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<div class="Contenedor">
    <div class="productos">
        <div class="encabezadoSuperior">
            <h1 class="titulo">Productos</h1>
        </div>
        <div class="listado">
            <?php creaFormularioProductos($productos) ?>
        </div>
    </div>
    <div class="cesta">
        <div class="encabezado">
            <h1 class="titulo">Cesta de la compra</h1>
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
        <div class="pagardiv">
            <form action='final.php' method='post'>
                <p>
                    <span class='pagar'>
                        <input type='submit' name='pagar' value='Pagar' />
                    </span>
                </p>
        </div>
    </div>
</div>

<body>
    <table>

    </table>
</body>

</html>