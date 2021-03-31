<?php

require_once('../../../lib/nusoap.php');      

$servicio = new soap_server();
//$ns = "unr:http://" .$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$ns = "urn:" . $_SERVER['PHP_SELF'];
$servicio->configureWSDL("ServicioMaterialesAfoods",$ns);
$servicio->schemaTargetNamespace = $ns;

// Parametros de entrada
$servicio->wsdl->addComplexType('Materiales', 
								'complexType', 
								'struct', 
								'all', 
								'',
                                array(
                                	'matnr'       => array('name' => 'matnr','type' => 'xsd:string'),
                                	'meins'       => array('name' => 'meins','type' => 'xsd:string'),
                                	'ean11'		  => array('name' => 'ean11','type' => 'xsd:string'),
                                	'numtp'		  => array('name' => 'numtp','type' => 'xsd:string'),
                                	'spart'		  => array('name' => 'spart','type' => 'xsd:string'),
                                	'vtext'		  => array('name' => 'vtext','type' => 'xsd:string'),
                                	'maktx'		  => array('name' => 'maktx','type' => 'xsd:string'),
                                	'vkorg'		  => array('name' => 'vkorg','type' => 'xsd:string'),
                                	'vtweg'		  => array('name' => 'vtweg','type' => 'xsd:string'),
                                	'mvke'		  => array('name' => 'mvke','type' => 'xsd:string'),
                                	'bezei'		  => array('name' => 'bezei','type' => 'xsd:string'),
                                	'prodh'		  => array('name' => 'prodh','type' => 'xsd:string'),
                                	'vtext1'	  => array('name' => 'vtext1','type' => 'xsd:string'),
                                	'vtext2'	  => array('name' => 'vtext2','type' => 'xsd:string'),
                                	'vtext3'	  => array('name' => 'vtext3','type' => 'xsd:string'),
                                	'lines'		  => array('name' => 'lines','type' => 'xsd:string'),
                                	)
);

$servicio->wsdl->addComplexType(
    'ProductoArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Materiales[]')
    ),
    'tns:Materiales'
);

/*$servicio->wsdl->addComplexType('retorno',
                              'complexType', 
                              'struct', 
                               'all', 
                               '',
                               array('return' => array('name' => 'return', 'type' => 'xsd:string'))

);*/


$servicio->register('RegistrarMaterial',
				array('material' => 'tns:Materiales'),
				array(''),
				'urn:materiales', // namespace
				'urn:materiales#RegistrarMaterial', // soapaction
				'rpc', // style
				'', // use
				'Registro de Materiales' // documentation
			);


function RegistrarMaterial($materiales){

	print_r($materiales);

/*
$retorno = $matnr." - ".$meins." - ".$ean11." - ".$numtp." - ".$spart." - ".$vtext." - ".$maktx." - ".$vkorg." - ".$vtweg." - ".$mvke." - ".$bezei." - ".$prodh." - ".$vtext1." - ".$vtext2." - ".$vtext3." - ".$lines;


return $retorno;
*/
 

}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);


?>