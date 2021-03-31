<?php

include("inc/conf.php");

extract($_REQUEST);

if(true){
	
$sql="select * from CLIENTES WHERE KUNN2 = CAST('".$DESTINATARIO."' AS INT) limit 1";
		
$result = mysqli_query($conn, $sql);
  
if(mysqli_num_rows($result)>0){

	$row = $result->fetch_object();
	extract($row);
 
	//$precio = $row->{'MONTO'};
	$_SESSION['ORG_VENTAS'] = $row->{'VKORG'};
	$_SESSION['CANAL'] = $row->{'VTWEG'};
	$_SESSION['SECTOR'] = $row->{'SPART'};
	$_SESSION['DESTINATARIO'] = $DESTINATARIO;	
	

}	
	
	
$mensaje="Selección destinatario correcta";
	
	
}else{
	
$mensaje="Ya seleccionado destinatario";

}


 
 


?>{"mensaje":"<?php echo $mensaje; ?>"}