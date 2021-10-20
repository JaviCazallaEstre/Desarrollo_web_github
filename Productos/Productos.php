<?php
session_start();
include_once('../Entidades/ProductoObjeto.php');
include_once('../Entidades/CestaObjeto.php');
include_once('../DB/dbProductos.php');
function creaFormularioProductos() {
	$productos = ProductosDB::rellenaArray();
	foreach ($productos as $p) {
		$codigo= $p->codigo;
		$nombre= $p->nombre;
		$precio= $p->precio;
		// Creamos el formulario en HTML para cada producto
		echo "<p><form id='$codigo' action='productos.php' method='post'>";
        // Metemos ocultos los datos de los productos
        echo "<input type='hidden' name='cod' value='".$codigo."'/>";
        echo "<input type='hidden' name='nombre' value='".$nombre."'/>";
        echo "<input type='hidden' name='precio' value='".$precio."'/>";
        echo "<input type='submit' name='enviar' value='Añadir'/>";
        echo " $nombre: ";
        echo $precio." euros.";
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
    <title>Document</title>
</head>
    <div id="productos">
        <?php creaFormularioProductos()?>
    </div>
<body>
<table>
    
</table>
</body>

</html>