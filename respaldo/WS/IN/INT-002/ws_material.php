<?php
//date_default_timezone_set("America/Santiago");
require_once('../../../nusoap/src/nusoap.php');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


$servicio = new soap_server();
//$ns = "urn:" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
/*$ns= "urn:" . ($_SERVER['HTTPS'] ? 's' : '') . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";*/


$ns = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//$ns = "http://muramuebles.cl/portal/PORTAL-VENTAS/WS/IN/INT-002/";
$servicio->configureWSDL("ServicioMaterialesAfoods", $ns);
$servicio->schemaTargetNamespace = $ns;


// Parametros de entrada
$servicio->wsdl->addComplexType('MaterialesIn', 
								'complexType', 
								'struct', 
								'sequence', 
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
    'Materiales',
    'complexType',
    'struct',
    'sequence',
    '',
    array( 'Materiales' => array(  
            'name' => 'Materiales',  'type' => 'tns:MaterialesIn' ,'minOccurs' => '0', 'maxOccurs' => 'unbounded' )
)
);


$servicio->wsdl->addComplexType('retorno',
                              'complexType', 
                              'struct', 
                               'all', 
                               '',
                               array('return' => array('name' => 'return', 'type' => 'xsd:string'))
);

 

 
$servicio->register('RegistrarMaterial',
                array('material' => 'tns:Materiales'),
                array('return' => 'tns:retorno'),
                'urn:'.$ns, // namespace
                'urn:materiales#RegistrarMaterial', // soapaction
                'document', // style
                'encoded', // use
                'Registro de Materiales' // documentation
            );


function RegistrarMaterial($materiales){

	//print_r($materiales);
	
	    date_default_timezone_set('Chile/Continental');

		$rutaActual = getcwd();
		$Path = $rutaActual . DIRECTORY_SEPARATOR . 'logs';

        if (!file_exists($Path)) {
        	mkdir($Path,0777,true);
        }


       	$logPath = $Path . DIRECTORY_SEPARATOR . date("Ymd") . "_log.txt";
        $mode = (!file_exists($logPath)) ? 'w':'a';
        $logfile = fopen($logPath, $mode);
        fwrite($logfile, "<//===========================================================================//>". PHP_EOL);
        fwrite($logfile, "[".date("d-m-Y H:i:s")."] ". $materiales . "\n"). PHP_EOL ;
        fwrite($logfile, "<//===========================================================================//>". PHP_EOL);
        fclose($logfile);
 

}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);


?>