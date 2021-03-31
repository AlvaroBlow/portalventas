<?php
//============= Variables Globales =============

GLOBAL $con;
GLOBAL $NordPrev;
GLOBAL $fecha;
GLOBAL $material_orden;
GLOBAL $pedido;
GLOBAL $lote_vac;
GLOBAL $umaVaciada;
GLOBAL $VersionF;
GLOBAL $Cantidad;
GLOBAL $Mensajes;
GLOBAL $fecha_consumo;
GLOBAL $hora_consumo;
GLOBAL $INFO_USER;
GLOBAL $LineaVaciado;
GLOBAL $Para;



//***********************************
//Variables Servicio SOAP;
GLOBAL $SOAP_AUTH;
GLOBAL $WSDL;

//============= Variables Constante =============
define("AlmEtqPrd","BM05");
define("AlmEtqVac","BU05");
define("Centro","PDBU");

/*******************************************************************************/
define("Mov_BM05","M"); 		//Movimiento a BM05 almacen de Etiquetado
define("Des_Ped","D");			//Desasigna Pedido asignado a uma SCO
define("Camb_lote","C");		//Cambio Lote
define("Mov_BU05","MB");		//Mueve a BU05
define("Des_uma","HU");			//Desembala unidad manipulación
/*******************************************************************************/
define("IPimp","10.30.5.38");	//Ip Impresora Pruebas
define("PortImp","9100");		//Puerto Impresora
define("CantImp","4");			//Cantidad de Tarjas a Imprimir


//===========================================



//	Asignación de Variables de sesion SAP

// $SOAP_AUTH = array( 'login'    => 'mromero',
                    // 'password' => 'mromero8');
	$SOAP_AUTH = array( 'login'    => 'intranet',
						'password' => 'int33102010');


//===========================================
//	Usuarios Correo
//===========================================

$Para = array('mromero@aconcaguafoods.cl','c.contreras@aconcaguafoods.cl');

//================================================
//	Variables Conexion Base de Datos
//================================================

/*define("UserName","intra");
define("UserPswd","net");
define("Server","139.10.10.101\SQLEXPRESS");
define("DataBase","PRDETIQV2");*/
//=============================================
define("UNP","portal_ventas");
define("UPP","Servidores.2015++");
define("S","ventas.aconcagaufoods.cl");
define("DB","portal_ventas");

//Información de Usuario
$INFO_USER = array("HTTP_CLIENT_IP" 	 => getenv('HTTP_CLIENT_IP'),
				   "HTTP_X_FORWARDED_FOR"=> getenv('HTTP_X_FORWARDED_FOR'),
				   "REMOTE_ADDR" 		 => getenv('REMOTE_ADDR'),
				   "HTTP_HOST" 			 => getenv('HTTP_HOST'),
				   "REQUEST_URI" 		 => getenv('REQUEST_URI'),
				   "SCRIPT_FILENAME" 	 => getenv('SCRIPT_FILENAME'));


date_default_timezone_set("Chile/Continental");

?>