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
echo json_encode($salida);
