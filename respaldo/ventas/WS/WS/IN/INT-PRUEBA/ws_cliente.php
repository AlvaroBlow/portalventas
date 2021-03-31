<?php

require_once('../../../lib/nusoap.php');
$servicio = new soap_server();

$ns = "urn:wsClienteswsdl";
$servicio->configureWSDL("ServicioClienteAfoods",$ns);
$servicio->schemaTargetNamespace = $ns;


$servicio->register("RegistrarCliente", 
			array('kunnr' => 'xsd:string',
				  'land1' => 'xsd:string',
				  'name1' => 'xsd:string',
				  'ort01' => 'xsd:string',
				  'stras' => 'xsd:string',
				  'telf1' => 'xsd:string',
				  'stcd1' => 'xsd:string',
				  'kunnr2' => 'xsd:string',
				  'vkorg' => 'xsd:string',
				  'vtweg' => 'xsd:string',
				  'spart' => 'xsd:string',
				  'kunnr3' => 'xsd:string',
				  'vkorg2' => 'xsd:string',
				  'vtweg2' => 'xsd:string',
				  'spart2' => 'xsd:string',
				  'parvw' => 'xsd:string',
				  'kunnr4' => 'xsd:string'),
			array('return' => 'xsd:string'), $ns );

 

function RegistrarCliente($kunnr, $land1, $name1,$ort01, $stras, $telf1,$stcd1, $kunnr2, $vkorg,$vtweg, $spart, $kunnr3,$vkorg2, $vtweg2,$spart2, $parvw, $kunnr4){

 

	$resultado = $kunnr." - ".$land1." - ".$name1." - ".$ort01." - ".$stras." - ".$telf1." - ".$stcd1." - ".$kunnr2." - ".$vkorg." - ".$vtweg." - ".$spart." - ".$kunnr3." - ".$vkorg2." - ".$vtweg2." - ".$spart2." - ".$parvw." - ".$kunnr4;

 return $resultado;
 
}

 

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);

?>