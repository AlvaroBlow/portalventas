<?php

require_once('../../../lib/nusoap.php');
$servicio = new soap_server();

$ns = "urn:wsClienteswsdl";
$servicio->configureWSDL("Servicio Cliente Afoods",$ns);
$servicio->schemaTargetNamespace = $ns;


$servicio->wsdl->addComplexType('Clientes',
								'complexType',
								'struct',
								'all',
								'',
					array('kunnr' => array('name' => 'kunnr', 'type' => 'xsd:string'),
						  'land1' => array('name' => 'land1', 'type' => 'xsd:string'),
						  'name1' => array('name' => 'name1', 'type' => 'xsd:string'),
						  'ort01' => array('name' => 'ort01', 'type' => 'xsd:string'),
						  'stras' => array('name' => 'stras', 'type' => 'xsd:string'),
						  'telf1' => array('name' => 'telf1', 'type' => 'xsd:string'),
						  'stcd1' => array('name' => 'stcd1', 'type' => 'xsd:string'),
						  'kunnr2' => array('name' => 'kunnr2', 'type' => 'xsd:string'),
						  'vkorg' => array('name' => 'vkorg', 'type' => 'xsd:string'),
						  'vtweg' => array('name' => 'vtweg', 'type' => 'xsd:string'),
						  'spart' => array('name' => 'spart', 'type' => 'xsd:string'),
						  'kunnr3' => array('name' => 'kunnr3', 'type' => 'xsd:string'),
						  'vkorg2' => array('name' => 'vkorg2', 'type' => 'xsd:string'),
						  'vtweg2' => array('name' => 'vtweg2', 'type' => 'xsd:string'),
						  'spart2' => array('name' => 'spart2', 'type' => 'xsd:string'),
						  'parvw' => array('name' => 'parvw', 'type' => 'xsd:string'),
						  'kunnr4' => array('name' => 'kunnr4', 'type' => 'xsd:string'),
								));

$servicio->wsdl->addComplexType('retorno',
							   'complexType',
							   'struct',
							   'all',
							   '',
							   array('return' => array('name' => 'return', 'type'=> 'xsd:string'))
								);

$servicio->register('RegistrarCliente', 
					array('Clientes' => 'tns:Clientes'),
					array('return' => 'tns:retorno'),
					'urn:cliente',
					'urn:cliente#RegistrarCliente',
					'rpc',
					'encoded',
					'Registro de Clientes'
					);
 

function RegistrarCliente($clientes){

 
print_r($clientes);
/*	$resultado = $kunnr." - ".$land1." - ".$name1." - ".$ort01." - ".$stras." - ".$telf1." - ".$stcd1." - ".$kunnr2." - ".$vkorg." - ".$vtweg." - ".$spart." - ".$kunnr3." - ".$vkorg2." - ".$vtweg2." - ".$spart2." - ".$parvw." - ".$kunnr4;

 return $resultado;*/
 
}

 

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);

?>