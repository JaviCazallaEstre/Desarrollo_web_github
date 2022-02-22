<?php
require_once '../vendor/autoload.php';
$cliente = new Zend\Soap\Client('http://localhost/cap10/servidorsoapmate.php?wsdl');
$result = $cliente->potencia(['base' => 5, 'exponente' => 4]);
echo $result->potenciaResult . "\n";
echo "Response:\n" . $cliente->getLastResponse() . "\n";

