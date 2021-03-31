<?php

 

require_once('../../../lib/nusoap.php');      
 
 
date_default_timezone_set("America/Santiago");
 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

 

 

  ob_start();

 

 

 

$servicio = new soap_server();
$ns =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$servicio->configureWSDL("ServicioMaterialesAfoods",$ns);
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
                                    'ean11'          => array('name' => 'ean11','type' => 'xsd:string'),
                                    'numtp'          => array('name' => 'numtp','type' => 'xsd:string'),
                                    'spart'          => array('name' => 'spart','type' => 'xsd:string'),
                                    'vtext'          => array('name' => 'vtext','type' => 'xsd:string'),
                                    'maktx'          => array('name' => 'maktx','type' => 'xsd:string'),
                                    'vkorg'          => array('name' => 'vkorg','type' => 'xsd:string'),
                                    'vtweg'          => array('name' => 'vtweg','type' => 'xsd:string'),
                                    'mvke'          => array('name' => 'mvke','type' => 'xsd:string'),
                                    'bezei'          => array('name' => 'bezei','type' => 'xsd:string'),
                                    'prodh'          => array('name' => 'prodh','type' => 'xsd:string'),
                                    'vtext1'      => array('name' => 'vtext1','type' => 'xsd:string'),
                                    'vtext2'      => array('name' => 'vtext2','type' => 'xsd:string'),
                                    'vtext3'      => array('name' => 'vtext3','type' => 'xsd:string'),
                                    'lines'          => array('name' => 'lines','type' => 'xsd:string'),
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
                $ns.'#RegistrarMaterial', // soapaction
                'rpc', // style
                'encoded', // use
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

 


$out2 = ob_get_contents();

 


$out2 = str_replace("use=\"encoded\"","",$out2);
$out2 = str_replace("<xsd:import namespace=\"http://schemas.xmlsoap.org/soap/encoding/\" />","",$out2);
$out2 = str_replace("<xsd:import namespace=\"http://schemas.xmlsoap.org/wsdl/\" />","",$out2);

 

$out2 = str_replace("<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>","",$out2);

 

 

 

 

$tam = strlen($tam);
 

 

 //echo substr($out2,0,($tam/2));

 


 

 

?>