<?php
$servername = "localhost";
$username = "portal_ventas";
$password = "Servidores.2015++";
$dbname = "portal_ventas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//$conn->close();

session_name("portal_ventas");
session_start();

extract($_REQUEST);

//echo var_dump($_SESSION);



if(isset($_SESSION['USUARIO'],$accion)){
	unset($_SESSION['USUARIO']);
}


if(!isset($_SESSION['USUARIO']) and basename($_SERVER['PHP_SELF'])!="login.php"){
	
header("location: login.php");

	
}else if(isset($email,$clave)){
	

	$sql="SELECT * FROM  USUARIOS WHERE email='".$email."' and clave='".$clave."'";
	
	echo $sql;
	
	$result = mysqli_query($conn, $sql);
  
	if(mysqli_num_rows($result)>0){
  
	$row = $result->fetch_object();
	
	$_SESSION['USUARIO'] = $row->{'email'};
	$_SESSION['CLIENTE'] = $row->{'cliente'};
	$_SESSION['ORG_VENTAS'] = $row->{'org_ventas'};
	$_SESSION['CANAL'] = $row->{'can_distri'};
	$_SESSION['SECTOR'] = $row->{'sector'};



	
	header("location: index.php");
  

	}
	
	
}


function precio($PRODH){
global $conn;
$sql="select MATNR, PRODH, (SELECT MONTO FROM LISTA_PRECIOS WHERE CLASE_COND='ZP01' AND MATERIAL=MATNR LIMIT 1) AS PB from MATERIALES where      
EXISTS(SELECT * FROM LISTA_PRECIOS WHERE CLASE_COND='ZP01' AND MATERIAL=MATNR)
AND PRODH='P00010100100010001' 

GROUP BY PRODH

";
	
$result = mysqli_query($conn, $sql);
  
	if(mysqli_num_rows($result)>0){

	$row = $result->fetch_object();
	extract($row);
	
	 $PB = $row->{'PB'};
	 $precio=$PB;

	}else{
		$precio=0;
	}
	
return $PRODH."|MAT:".$row->{'MATNR'}."|".$precio."__|".$_SESSION['CLIENTE'];	
}


?>
