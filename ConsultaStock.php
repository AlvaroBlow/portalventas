<?php

extract($_REQUEST);
//_REQUEST
// Crear un flujo


session_name("portal_ventas");
session_start();


$opciones = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: es\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$contexto = stream_context_create($opciones);

// Abre el fichero usando las cabeceras HTTP establecidas arriba
$fichero = file_get_contents('http://servicios.aconcaguafoods.cl/SERVICIOS/PORTAL-VENTAS/ConsultaStock.php?jerarquia='.$jerarquia.'&canal='.$_SESSION['CANAL'].'', false, $contexto);
 

$obj = json_decode($fichero);

//echo var_dump($json);


	if($obj->{'cantidad'} > $num){
		
		// /*agregar al carro*/
		
		if(!isset($_SESSION['CARRO'])){
		
		$_SESSION['CARRO'] = array();
			
	//	$_SESSION['CARRO'][$obj->{'material'}]= $obj->{'cantidad'};
		$_SESSION['CARRO'][$obj->{'material'}]= $num;
		
		
		$mensaje="Primer material carro";

		
		
	}else{

		if(isset($_SESSION['CARRO'][$obj->{'material'}])){
			$total = $_SESSION['CARRO'][$obj->{'material'}] + $num;
			$_SESSION['CARRO'][$obj->{'material'}] = $total;
		}else{
		$_SESSION['CARRO'][$obj->{'material'}] = $num;		
		}	
		
	}
		
	}else{
		
		$mensaje="sin stock";
		
	}

echo $fichero;


?>