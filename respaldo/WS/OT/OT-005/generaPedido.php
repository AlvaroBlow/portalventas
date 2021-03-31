<?php


extract($_POST);


require_once('Ws_CreacionPedidosSap.php');


/**
 * Datos necesarios para la creacion del pedido en SAP
 * Formato Fecha (Año-Mes-Día) Ej: 2020-12-29
 * Formato Guid (92EF39447DEA4AC785999DFF0AFA7A9D)
 * Formato PurchNoC (0810-25029666)
 * Formato DocLegado (1) ??
 */
$pedido = new Pedidos_Sap();
$pedido->set_fecha($fecha);					//Fecha Creacion Pedido
$pedido->set_guid($guid);					//Id del cual no se puede repetir, en sap se valida este ID
$pedido->set_purchNoC($PurchNoC);			//Numero Compra
$pedido->set_DocLegado($docLegado);			//?		

//Datos Destinatario y cliente
$partners[] = array('partnrole' => 'AG','partnnumber'=>'0000010967');
$partners[] = array('partnrole' => 'WE','partnnumber'=>'0000101521');
$pedido->generaPartners($partners);

//Datos del detalle del pedido
$itemDetalle[] = array('material'=> 'TCO10187', 'cantidad' => '10');
$itemDetalle[] = array('material'=> 'TCO10187', 'cantidad' => '20');
$pedido->generaItems($itemDetalle);

$pedido->preparaEnvio();					//Genera Estructura para enviar a Web-Service




?>