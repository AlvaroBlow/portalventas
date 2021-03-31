<?php include("header.php"); ?>

    <main class="ps-main">
      <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
		  
 
 
 
		  
<?php

$DatosPedido['PEDIDO'] = serialize($_POST);
$DatosPedido['POSICIONES'] =  serialize($_SESSION['CARRO']);
		  
	$sql="INSERT INTO `PEDIDOS` VALUES (null, '".serialize($DatosPedido)."', '".$_SESSION['CLIENTE']."', '".$_SESSION['DESTINATARIO']."');";
		    	
	$conn->query($sql);

	//printf ("Nuevo registro con el id %d.\n", $conn->insert_id);

//$DatosPedido

//DATOS DE EJEMPLO
// $fecha = '2021-01-05';
// $guid = '998D8FKD998FJD73ZPP987';
// $PurchNoC = '20210105-111111';
// $docLegado = '1';

// $pedido = new Pedidos_Sap();
// $pedido->set_fecha($fecha);					//Fecha Creacion Pedido
// $pedido->set_guid($guid);					//Id 
// $pedido->set_purchNoC($PurchNoC);			//Numero Compra
// $pedido->set_DocLegado($docLegado);			//Documento Legado	

//Datos Destinatario y cliente
// $partners[] = array('partnrole' => 'AG','partnnumber'=>'0000010967');
// $partners[] = array('partnrole' => 'WE','partnnumber'=>'0000101521');
// $pedido->generaPartners($partners);


// $itemDetalle[] = array('material'=> 'TCO10187', 'cantidad' => '10');
// $itemDetalle[] = array('material'=> 'TCO10011', 'cantidad' => '20');
// $itemDetalle[] = array('material'=> 'TCO10042', 'cantidad' => '30');
//$itemDetalle[] = array('material'=> 'TCO10044', 'cantidad' => '20');
// $pedido->generaItems($itemDetalle);						//Genera Array de Items

// $pedido->preparaEnvio();								//Genera Estructura para enviar a Web-Service




$url = "http://servicios.aconcaguafoods.cl/SERVICIOS/PORTAL-VENTAS/generaPedido.php";



$cliente = str_pad($_SESSION['CLIENTE'], 10, "0", STR_PAD_LEFT);
$destinatario = str_pad($_SESSION['DESTINATARIO'], 10, "0", STR_PAD_LEFT);


// POST data in array
$post = [
    'canal' => $_SESSION['CANAL'],
    'cliente' => $cliente,
    'destinatario' => $destinatario,
	'carro' => serialize($_SESSION['CARRO']),
	'numero_pedido' => $conn->insert_id,
];

// Create a new cURL resource with URL to POST
$ch = curl_init($url);

// We set parameter CURLOPT_RETURNTRANSFER to read output
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Let's pass POST data
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// We execute our request, and get output in a $response variable
$response = curl_exec($ch);

// Close the connection
curl_close($ch);

unset($_SESSION['CARRO']);

echo $response;

?>
<p style="text-align: center;">
 
 <img style="width: 20%;" src="img/check.png" />
 
 </p>
            
            
          </div>
        </div>
      </div>
     


  <?php include("footer.php"); ?>
