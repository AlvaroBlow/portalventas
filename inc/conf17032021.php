<?php




session_name("portal_ventas");
session_start();

//$servername = "localhost";
$servername = "ventas.aconcaguafoods.cl";
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



extract($_REQUEST);
extract($_POST);


if(isset($password)){
	$clave=$password;
}



if(isset($_SESSION['USUARIO'],$accion)){
	unset($_SESSION['USUARIO']);
}


if(!isset($_SESSION['USUARIO']) and basename($_SERVER['PHP_SELF'])!="login.php"){
	
header("location: login.php");

	
}else if(isset($email,$clave)){
	


	$sql="SELECT * FROM  USUARIOS WHERE email='".$email."' and clave='".$clave."'";
	
	
	$result = mysqli_query($conn, $sql);
  
	if(mysqli_num_rows($result)>0){
		
	
  
	$row = $result->fetch_object();
	
	$_SESSION['USUARIO'] = $row->{'email'};
    
	if($row->{'id_tipo_usuario'}==1){
	$_SESSION['CLIENTE'] = $row->{'cliente'};
	}
	// $_SESSION['ORG_VENTAS'] = $row->{'org_ventas'};
	// $_SESSION['CANAL'] = $row->{'can_distri'};
	// $_SESSION['SECTOR'] = $row->{'sector'};
	$_SESSION['DESTINATARIO'] = '0';
	$_SESSION['ID_TIPO_USUARIO'] = $row->{'id_tipo_usuario'};
	$_SESSION['EMAIL'] = $row->{'email'};

	
	header("location: index.php");
	
  

	}else{
		
		$mensaje = "Datos de login incorrectos.";
		
	}
	
	
}


if(($_SESSION['DESTINATARIO']=='0' and $_SESSION['ID_TIPO_USUARIO']=='1') and basename($_SERVER['PHP_SELF'])!="index.php" and   basename($_SERVER['PHP_SELF'])!="destinatario.php"){
		header("location: index.php");
}




function precio($MATERIAL){
global $conn;

$CLIENTE = $_SESSION['CLIENTE'];
$CLIENTE = str_pad($CLIENTE,10,"0",STR_PAD_LEFT);


//Pregunta Cliente


$sql="select MONTO from LISTA_PRECIOS WHERE MATERIAL='".$MATERIAL."' and CLIENTE='".$CLIENTE."'";

// echo $sql."<br/>";
		
$result = mysqli_query($conn, $sql);
  
if(mysqli_num_rows($result)>0){

	$row = $result->fetch_object();
	extract($row);
 
	$precio = $row->{'MONTO'};
	return $precio;

}else{


//Pregunta por Canal

$sql="select MONTO from LISTA_PRECIOS WHERE MATERIAL='".$MATERIAL."' and CANAL='".$_SESSION['CANAL']."'";

// echo $sql."<br/>";

	
$result = mysqli_query($conn, $sql);
  
if(mysqli_num_rows($result)>0){

	$row = $result->fetch_object();
	extract($row);
	$precio = $row->{'MONTO'};
	
	
}else{
	//No Tiene Canal
	
	
	
	
//precio sin canal
$sql="select MONTO from LISTA_PRECIOS WHERE MATERIAL='".$MATERIAL."'  and  CLIENTE=''";

	
$result = mysqli_query($conn, $sql);
  
if(mysqli_num_rows($result)>0){

	$row = $result->fetch_object();
	extract($row);
	$precio = $row->{'MONTO'};
	

}else{
	
	
	$precio="00";
	
}	
	
	
	
	
	
	
	

}



	}



	
return $precio;

}





?>
