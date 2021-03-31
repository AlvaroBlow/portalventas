<?php

date_default_timezone_set("Chile/Continental");

define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);

defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));

define("LIB_PATH_INC", SITE_ROOT.DS);

define("PATH_FILE", LIB_PATH_INC."configuracionMectra.xml");


$lectura = simplexml_load_file(PATH_FILE) or die ('Falla al Cargar Archivo de Configuracion');

$ruta_archivo = $lectura->url;

echo $ruta_archivo;

 
if(file_exists($ruta_archivo)){
	procesa_archivo($ruta_archivo);
}else{
	echo "Archivo no creado o ruta no se puede acceder.<br>";
}



function procesa_archivo($excel){
	global $uma;
	
	if (($fichero = fopen($excel, "r")) !== FALSE) {
		while (($datos = fgetcsv($fichero, 1000)) !== FALSE) {
				if($datos[0] != ""){
					//procesa_movimiento($datos[0]);
					echo $datos[0];
					break;
				}
			}
	}
	
	fclose($fichero);
	$fechaHora = date('Ymd_Hi');
	
	copy($excel, $excel."_".$fechaHora.".bak");
	sleep(2);
	unlink($excel);
	
}


/*function procesa_movimiento($ax_uma){
	
	
	$SOAP_AUTH = array( 'login'    => 'intranet',
						'password' => 'int33102010');
							
	$WSDL = "http://aplaco2.aconcaguafoods.cl:8000/sap/bc/srt/wsdl/bndg_EA064121A3C744F190A20050560120A0/wsdl11/allinone/standard/document?sap-client=500";

	$client = new SoapClient($WSDL,$SOAP_AUTH);
		
	$params = array( 'WUma' => $ax_uma);
	
	$client->ZwsPpEtiquetado0004($params);
	
}*/

?>