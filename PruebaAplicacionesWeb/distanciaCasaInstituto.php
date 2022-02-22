<?php 
    $fichero = new DOMDocument();
	$fichero->load("http://www.cartociudad.es/services/api/route?orig=37.78161608204093,-3.8044880850815024&dest=37.74604738418171,-3.9135762713450784&locale=es&vehicle=WALK");
	$salida = array();
	$ruta = $fichero->getElementsByTagName("item");
    var_dump($ruta);
	foreach ($ruta as $entry) {
		$nuevo = array();
		$nuevo["title"] = $entry->getElementsByTagName("title")[0]->nodeValue;
		$nuevo["description"] =  $entry->getElementsByTagName("description")[0]->nodeValue;
		$salida[] = $nuevo;
	}
?>
