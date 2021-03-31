<?php 

require_once('../../../lib/nusoap.php');

// Configurando el web service
$server = new soap_server();
$server->configureWSDL("SaludoXML", "urn:SaludoXMLwsdl");
$server->wsdl->schemaTargetNamespace = "urn:SaludoXMLwsdl";
 
// Nuestra función que proporcionaremos
function Saludar($nombre) {
    return 'Hola ' . trim($nombre);
}
 
// Registrando nuestra función Saludar con su parámetro nombre
$server->register(
        'Saludar', // Nombre del método
        array('nombre' => 'xsd:string'), // Parámetros de entrada
        array('return' => 'xsd:string'), // Parámetros de salida
        'urn:SaludoXMLwsdl', // Nombre del workspace
        'urn:SaludoXMLwsdl#Saludar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Saluda a la persona' // Documentación
);
 
$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
 
$server->service($HTTP_RAW_POST_DATA);
 ?>