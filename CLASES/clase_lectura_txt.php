<?php 

/**
 * Clase para leer archivos txt y delimitarlos por 
 */


//define('pathTXT','\\\10.189.80.100\\output\\portal_ventas', true);

	include("dbconn.php");


class Procesatxt 
{

public 		$ListaMaterialesCompleta;
public 		$NombreArchivo;
private 	$rutaArchivo;
public 		$cn;

function __construct()
{
	$this->conexion();
}

function conexion()
{
	include("dbconn.php");
	$this->cn = $conn;
}


function setArchivo($nombre){
	$this->NombreArchivo = $nombre;
}

function LeerArchivoMateriales(){		//MATERIALES

echo "MaterialTXT:";

$ListaMateriales=array();
$Material=array();
$i=0;
//$handle = fopen("../TXT/Materiales20201217105438.txt", "r");
$handle = fopen("../TXT/".$this->NombreArchivo, "r");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		//echo "<b>".$line."</b>";
		echo "it<br/>";
		
		
		
		list($material,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9,$campo10,$campo11,$campo12,$campo13,$campo14,$campo15,$campo16) = explode ("|", $line);

		$Material['MATNR']=$material;  //MATERIAL
		$Material['MEINS']=$campo2;    //UMBASE
		$Material['EAN11']=$campo3;    //Código EAN/UPC	   
		$Material['NUMTP']=$campo4;    //Tipo EAN
		$Material['SPART']=$campo5;    //Sector
		$Material['VTEXT']=$campo6;    //Texto Sector
		$Material['MAKTX']=$campo7;    //Denominación
		$Material['VKORG']=$campo8;    //Organización ventas
		$Material['VTWEG']=$campo9;    //Canal distribución
		$Material['MVGR1']=$campo10;   //Marca
		$Material['BEZEI']=$campo11;   //Texto Marca
		$Material['PRDHA']=$campo12;   //Jquía.productos
		$Material['NIVE1']=$campo13;   //Texto Jquía.productos #1
		$Material['NIVE2']=$campo14;   //Texto Jquía.productos #2
		$Material['NIVE3']=$campo15;   //Texto Jquía.productos #3
		$Material['TXTCO']=$campo16;   //Texto Comercial

		$ListaMateriales[] = $Material;

			extract($Material);

		$sqlFila ="INSERT INTO `MATERIALES` (`MATNR`, `MEINS`, `EAN11`, `NUMTP`, `SPART`, `VTEXT`, `MAKTX`, `VKORG`, `VTWEG`, `MVKE`, `BEZEI`, `PRODH`, `VTEXT_1`, `VTEXT_2`, `VTEXT_3`, `LINES`) VALUES ('$MATNR', '$MEINS', '$EAN11', '$EAN11', '$SPART', '$VTEXT', '$MAKTX', '$VKORG', '$VTWEG', '$MVKE', '$BEZEI', '".$PRDHA."', '$VTEXT_1', '$VTEXT_2', '$VTEXT_3', '$LINES');";	
		mysqli_query($this->cn, $sqlFila);
		
		echo $sqlFila."<br/>";

		unset($Material);

    }//fin while

    fclose($handle);
}

		// echo "<pre>";
		// var_dump($ListaMateriales);
		// echo "</pre>";

	}//fin funcion



function LeerArchivoClientes(){				//CLIENTES
	$ListaClientes=array();
	$Clientes=array();
	$i=0;
	$handle = fopen("TXT/".$this->NombreArchivo, "r");
	$sqlCompleto="";
	$sqlFila="";
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
			$i++;
	        // process the line read.
			//echo "<b>".$line."</b>";
			
			$line= str_replace("\"","",$line);
			
			list($material,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9,$campo10,$campo11,$campo12) = explode ("|", $line);

			$Clientes['KUNNR']=$material; //Cliente
			$Clientes['LAND1']=$campo2;   //País
			$Clientes['NAME1']=$campo3;   //Nombre
			$Clientes['ORT01']=$campo4;   //Población
			$Clientes['STRAS']=$campo5;   //Calle
			$Clientes['TELF1']=$campo6;   //Teléfono 1
			$Clientes['STCD1']=$campo7;   //Nº ident.fis.1
			$Clientes['VKORG']=$campo9;   //Organización ventas
			$Clientes['VTWEG']=$campo10;  //Canal distribución
			$Clientes['SPART']=$campo11;  //Sector
			$Clientes['PARVW']=$campo12;  //Cliente
			$Clientes['KUNN2']=$campo8;   //Organización ventas

			$ListaClientes[] = $Clientes;
			
			extract($Clientes);

//			$sqlFila ="INSERT INTO `CLIENTES` (`KUNNR`, `LAND1`, `NAME1`, `ORT01`, `STRAS`, `TELF1`, `STCD1`, `VKORG`, `VTWEG`, `SPART`, `PARVW`, `KUNN2`) VALUES ('".$mysqli->strtolower($KUNNR)."', '".$mysqli->strtolower($LAND1)."', '".$mysqli->strtolower($NAME1)."', '".$mysqli->strtolower($ORT01)."', '".$mysqli->strtolower($STRAS)."', '".$mysqli->strtolower($TELF1)."', '".$mysqli->strtolower($STCD1)."', '".$mysqli->strtolower($VKORG)."', '".$mysqli->strtolower($VTWEG)."', '".$mysqli->strtolower($SPART)."', '".$mysqli->strtolower($PARVW)."', '".$mysqli->strtolower($KUNN2)."');";	
		//	$sqlFila ="INSERT INTO `CLIENTES` (`KUNNR`, `LAND1`, `NAME1`, `ORT01`, `STRAS`, `TELF1`, `STCD1`, `VKORG`, `VTWEG`, `SPART`, `PARVW`, `KUNN2`) VALUES ('".$this->cn->strtolower($KUNNR)."', '".$this->cn->strtolower($LAND1)."', '".$this->cn->strtolower($NAME1)."', '".$this->cn->strtolower($ORT01)."', '".$this->cn->strtolower($STRAS)."', '".$this->cn->strtolower($TELF1)."', '".$this->cn->strtolower($STCD1)."', '".$this->cn->strtolower($VKORG)."', '".$this->cn->strtolower($VTWEG)."', '".$this->cn->strtolower($SPART)."', '".$this->cn->strtolower($PARVW)."', '".$this->cn->strtolower($KUNN2)."');";	
		//	$sqlFila ="INSERT INTO `CLIENTES` (`KUNNR`, `LAND1`, `NAME1`, `ORT01`, `STRAS`, `TELF1`, `STCD1`, `VKORG`, `VTWEG`, `SPART`, `PARVW`, `KUNN2`) VALUES ('".mysqli_strtolower($this->cn,$KUNNR)."', '".mysqli_strtolower($this->cn,$LAND1)."', '".mysqli_strtolower($this->cn,$NAME1)."', '".mysqli_strtolower($this->cn,$ORT01)."', '".mysqli_strtolower($this->cn,$STRAS)."', '".mysqli_strtolower($this->cn,$TELF1)."', '".mysqli_strtolower($this->cn,$STCD1)."', '".mysqli_strtolower($this->cn,$VKORG)."', '".mysqli_strtolower($this->cn,$VTWEG)."', '".mysqli_strtolower($this->cn,$SPART)."', '".mysqli_strtolower($this->cn,$PARVW)."', '".mysqli_strtolower($this->cn,$KUNN2)."');";	


	//$cn=new mysqli('191.232.184.42', 'portal_ventas', 'Servidores.2015++', 'portal_ventas');


		$sqlFila ="INSERT INTO `CLIENTES` (`KUNNR`, `LAND1`, `NAME1`, `ORT01`, `STRAS`, `TELF1`, `STCD1`, `VKORG`, `VTWEG`, `SPART`, `PARVW`, `KUNN2`) VALUES ('".strtolower($KUNNR)."', '".strtolower($LAND1)."', '".strtolower($NAME1)."', '".strtolower($ORT01)."', '".strtolower($STRAS)."', '".strtolower($TELF1)."', '".strtolower($STCD1)."', '".strtolower($VKORG)."', '".strtolower($VTWEG)."', '".strtolower($SPART)."', '".strtolower($PARVW)."', '".strtolower($KUNN2)."');";	

			$this->cn->query($sqlFila);
			//$insert = new $this->cn($sqlFila);


			unset($Clientes,$sqlFila);

	    }//fin while

 

	    fclose($handle);
	}

			echo "<pre>";
			//var_dump($ListaClientes);
			echo "</pre>";


}

function LeerlistaPrecios(){				//CLIENTES
$ListaPrecios=array();
$Precios=array();
$i=0;
$handle = fopen("TXT/".$this->NombreArchivo, "r");
var_dump($handle);
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
//echo "<b>".$line."</b>";
		list($ClCond,$OrgV,$Material,$CliDest,$Valor,$Moneda,$MonCond) = explode ("|", $line);

		$Precios['KSCHL']=$ClCond; //Clase de condición
		$Precios['VKORG']=$OrgV;   //Organización ventas
		$Precios['MATNR']=$Material;   //Material
		$Precios['KUNNR']=$CliDest;   //Cliente/Destinatario
		$Precios['KBETR']=$Moneda;   //moneda
		$Precios['KONWA']=$MonCond;   //Moneda condición



		$ListaPrecios[] = $Precios;


		extract($Precios);
		
		$sqlFila ="INSERT INTO `LISTA_PRECIOS` (`KSCHL`, `VKORG`, `MATNR`, `KUNNR`, `KBETR`, `KONWA`) VALUES ('".$KSCHL."', '".$VKORG."', '".$MATNR."', '".strtolower($KUNNR)."', '".$Valor."', '".$KONWA."');";	
			mysqli_query($this->cn, $sqlFila);
			
		//echo $sqlFila;	
			
		unset($Precios);

    }//fin while

    fclose($handle);
}

		// echo "<pre>";
		// var_dump($ListaPrecios);
		// echo "</pre>";


}

function borrarArchivo(){
	unlink("TXT/".$this->NombreArchivo);
}



}//fin clase


 ?>