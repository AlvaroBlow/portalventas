<?php

include_once('../../../lib/nusoap.php');


$server = new soap_server;
$server->configureWSDL('Mi Web Service', 'urn:mi_ws1');
 
// Parametros de entrada
$server->wsdl->addComplexType(  'datos_persona_entrada', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array(
                                	'codigo_repuesto'       => array('name' => 'codigo_repuesto','type' => 'xsd:string'),
                                	'nombre_repuesto'       => array('name' => 'nombre_repuesto','type' => 'xsd:string'))
);
// Parametros de Salida
$server->wsdl->addComplexType(  'datos_persona_salida', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array(
								'codigo_externo_bie'=> array('name' => 'codigo_externo_bie','type'=>'xsd:string'),
								'nombre_repuesto'=> array('name' => 'nombre_repuesto','type'=>'xsd:string'),
								'cantidad'=> array('name' => 'cantidad','type'=>'xsd:boolean'),
								)
);
 
 
$server->register('codigos_existentes', // method name
		array('repuestos' => 'tns:datos_persona_entrada'), // input parameters
		array('return' => 'tns:datos_persona_salida'), // output parameters
		'urn:cotizacion', // namespace
		'urn:cotizacion#codigos_existentes', // soapaction
		'rpc', // style
		'encoded', // use
		'Recibe un arreglo multidimensional ' // documentation
);


function codigos_existentes($arreglo_codigo) {
print_r($arreglo_codigo);
}

$server->service(isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '');

?>