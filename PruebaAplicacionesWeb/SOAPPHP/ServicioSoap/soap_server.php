<?php
require 'HolaServicio.php';
$server= new SoapServer('saludo.wsdl');
$server->setClass('HolaServicio');
$server->handle();