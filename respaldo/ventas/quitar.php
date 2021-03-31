<?php

include("inc/conf.php");

extract($_REQUEST);

if(isset($_SESSION['CARRO'][$Material])){
	

	//$_SESSION['CARRO'][$Material]= 1;
	unset($_SESSION['CARRO'][$Material]);
	
 
/* Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit;
 
	
}else{
	
	 
	
}




?>