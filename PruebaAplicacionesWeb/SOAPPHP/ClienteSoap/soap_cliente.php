<?php
$client = new SoapClient('http://localhost/proyectos/DEWES/Desarrollo_web_github/PruebaAplicacionesWeb/SOAPPHP/ServicioSoap/saludo.wsdl',array(
      'location' => "http://localhost/proyectos/DEWES/Desarrollo_web_github/PruebaAplicacionesWeb/SOAPPHP/ServicioSoap/soap_server.php",
      'uri'      => "http://localhost/proyectos/DEWES/Desarrollo_web_github/PruebaAplicacionesWeb/SOAPPHP/ServicioSoap/",
      'trace'    => 1
       ));
try {
      $return = $client->__soapCall("sacaUsuariosBD",[]);
      echo json_encode($return);
} catch ( SOAPFault $e ) {
	echo $e->getMessage().PHP_EOL;
}