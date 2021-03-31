
                
        <?php include("header.php"); ?>
		
	 
 
		  
		  
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Pedido Web</th>
                  <th>Pedido Sap</th>
                  <th>Destinatario</th>
                  <th>Fecha Creacion</th>
                </tr>
              </thead>
              <tbody>
			  
<?php

$sql="select *
,
(select CONCAT(NUMERO_PEDIDO_SAP,'|',FECHA_PEDIDO)  from PEDIDOS_CONFIRMADOS
WHERE GUID = CONCAT('PW_',ID_INTERNO)

limit 1) AS DATOS_SAP

from PEDIDOS
WHERE CLIENTE='".$_SESSION['CLIENTE']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);

	list($NUMERO_PEDIDO_SAP,$FECHA_PEDIDO) = explode("|",$DATOS_SAP);

?>	
       <tr>
                  <td>PW_<?php echo $ID_INTERNO; ?></td>
                  <td><?php echo $NUMERO_PEDIDO_SAP; ?></td>
                  <td><?php echo $DESTINATARIO; ?></td>
                  <td><?php echo $FECHA_PEDIDO; ?></td>
                </tr>
			  
           
				
<?php } } ?>
               
              </tbody>
            </table>	 

 
                        
        <?php include("footer.php"); ?>    