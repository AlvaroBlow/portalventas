
                
        <?php include("header.php"); ?>
		
	 
 
		  
		  
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Pedido Web</th>
                  <th>Pedido Sap</th>
                  <th>Destinatario</th>
                  <th>Fecha Creacion</th>
                  <th>Mensaje</th>

                </tr>
              </thead>
              <tbody> 
			  
<?php

$sql="

select *
,
(
select GROUP_CONCAT(MENSAJE SEPARATOR ' <li/><li>')  from PEDIDOS_CONFIRMADOS
WHERE GUID = CONCAT('PW_',ID_INTERNO)
) AS MENSAJE_SAP
,
(
select GROUP_CONCAT(DISTINCT(NUMERO_PEDIDO_SAP) SEPARATOR ' ')  from PEDIDOS_CONFIRMADOS
WHERE GUID = CONCAT('PW_',ID_INTERNO) AND NUMERO_PEDIDO_SAP!=''

) AS NUMERO_PEDIDO_SAP,

(select GROUP_CONCAT(DISTINCT(FECHA_PEDIDO) SEPARATOR ' ')  from PEDIDOS_CONFIRMADOS
WHERE GUID = CONCAT('PW_',ID_INTERNO) AND NUMERO_PEDIDO_SAP!=''

) AS FECHA_PEDIDO

from PEDIDOS

WHERE CLIENTE='".$_SESSION['CLIENTE']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);


?>	
       <tr>
                  <td><a href='' >PW_<?php echo $ID_INTERNO; ?></a></td>
                  <td><?php echo $NUMERO_PEDIDO_SAP; ?></td>
                  <td><?php echo $DESTINATARIO; ?></td>
                  <td><?php echo $FECHA_PEDIDO; ?></td>
                  <td><ul><li><?php echo str_replace('<li></li>','',utf8_encode($MENSAJE_SAP)); ?></li></ul></td>

                </tr>
			  
           
				
<?php } } ?>
               
              </tbody>
            </table>	 

<script  type='text/javascript'>

jQuery(document).ready(function() {
  // Handler for .ready() called.
	$('li:empty').remove();
	
	
	
	
});

setTimeout(function(){ $('li:empty').remove(); }, 1000);

</script>

 
                        
        <?php include("footer.php"); ?>    