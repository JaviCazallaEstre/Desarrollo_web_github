<?php
require_once './vendor/autoload.php';
require "Numeros.php";
$serverUrl = "http://localhost/proyectos/DEWES/Desarrollo_web_github/zendSoap/servidor.php";
if (isset($_GET['wsdl'])) {
    $soapAutoDiscover = new \Zend\Soap\AutoDiscover
		(new \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence());
    $soapAutoDiscover->setBindingStyle(array('style' => 'document'));
    $soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
    $soapAutoDiscover->setClass('Numeros');
    $soapAutoDiscover->setUri($serverUrl);
    header("Content-Type: text/xml");
    echo $soapAutoDiscover->generate()->toXml();
} else {
    $soap = new \Zend\Soap\Server('http://localhost/proyectos/DEWES/Desarrollo_web_github/zendSoap/servidor.php?wsdl');
    $soap->setObject(new \Zend\Soap\Server\DocumentLiteralWrapper(new Numeros()));
    $soap->handle();	
}