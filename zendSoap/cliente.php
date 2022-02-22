<?php
require_once './vendor/autoload.php';
$cliente = new Zend\Soap\Client('http://localhost/proyectos/DEWES/Desarrollo_web_github/zendSoap/servidor.php?wsdl');
$result = $cliente->dameNumeroRandom([]);
echo $result->dameNumeroRandomResult . "\n";
echo "Response:\n" . $cliente->getLastResponse() . "\n";
