<?php

require_once('../../../lib/nusoap.php');      

$servicio = new soap_server();
$ns = "urn:wsListaPreciowsdl";
$servicio->configureWSDL("Servicio Lista Precio Afoods",$ns);
$servicio->schemaTargetNamespace = $ns;


$servicio->wsdl->addComplexType('Lista',
								 'complexType',
								 'struct',
								 'all',
								 '',
								 array('KSCHL' => array('name' => 'KSCHL', 'type' =>'xsd:string'),
									  'VKORG' => array('name' => 'VKORG', 'type' =>'xsd:string'),
									  'MATNR' => array('name' => 'MATNR', 'type' =>'xsd:string'),
									  'KUNNR' => array('name' => 'KUNNR', 'type' =>'xsd:string'),
									  'KBETR' => array('name' => 'KBETR', 'type' =>'xsd:integer'),
									  'KONWA' => array('name' => 'KONWA', 'type' =>'xsd:string'),)
								 );

$servicio->wsdl->addComplexType('retorno',
								'complexType',
								'struct',
								'all',
								'',
								 array('return' => array('name' => 'return', 'type' => 'xsd:string')));
$servicio->register('registraListaPrecio',
					array('lista' => 'tns:Lista'),
					array('return' => 'tns:retorno'),
					'urn:listaPrecio',
					'urn:listaPrecio#registraListaPrecio',
					'rpc',
					'encoded',
					'Lista de Precio'
					);


function registraListaPrecio($listaPrecio){

	/*$retorno = $KSCHL." - ".$VKORG." - ".$MATNR." - ".$KUNNR." - ".$KBETR." - ".$KONWA;

	return $retorno;*/
	
	print_r($listaPrecio);
	
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);



?>