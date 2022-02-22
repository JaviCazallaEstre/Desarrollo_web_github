<?php 
    $fichero = new DOMDocument();
	$fichero->load("http://www.aemet.es/es/noticias.rss");
	$salida = array();
	$tiempos = $fichero->getElementsByTagName("item");
	foreach ($tiempos as $entry) {
		$nuevo = array();
		$nuevo["title"] = $entry->getElementsByTagName("title")[0]->nodeValue;
		$nuevo["description"] =  $entry->getElementsByTagName("description")[0]->nodeValue;
		$salida[] = $nuevo;
	}
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Últimas noticias tiempo</title>
		<style> table, td, th { border-style: solid} </style>
	</head>
	<body>
		<table>
			<tr><td>Título</td><td>Descripcion</td></tr>
			<?php
				foreach($salida as $elemento) {
					$titulo = $elemento["title"];
					$description = $elemento["description"];
					echo "<tr><td>$titulo</td><td>$description</td></tr>";
				}
			?>
		</table>
	</body>
</html>