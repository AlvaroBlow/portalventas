
                
        <?php include("header.php"); ?>
		
 
		<h2 class="title30 font-bold text-uppercase sub_title">Listado Clientes Aconcagua</h2>
		
 		
		<br/>
		
      <form action="terminar.php" method="POST" id="carro">
	 
	 
		  
		  
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Nombre Cliente</th>
                  <th>Destinatarios</th>
                  <th>Usuarios</th>
                  <th>Pedidos Generados</th>
                  <th>Pedidos Pendientes</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
			  
<?php


$sql="
select KUNNR AS CLIENTE,
(NAME1) as NOMBRE_CLIENTE,
COUNT(KUNN2) AS DESTINATARIOS,
(SELECT COUNT(*) FROM USUARIOS WHERE CAST(cliente as int)= cast(KUNNR as int) and id_tipo_usuario=1) as USUARIOS,


(select count(*) from PEDIDOS WHERE  CAST(CLIENTE as int)=cast(KUNNR as int)) as CAN_PEDIDOS,

(
select 
count(*)

 from PEDIDOS WHERE  
CAST(CLIENTE as int)=cast(KUNNR as int)
and not exists(
(
SELECT * from PEDIDOS_CONFIRMADOS
where GUID=CONCAT('PW_',ID_INTERNO)
)
)


) as CAN_PEDIDOS_PENDIENTES



 from CLIENTES
group by KUNNR ORDER BY KUNNR ASC";
	
	$result = mysqli_query($conn, $sql);
  



if(mysqli_num_rows($result)>0){

while($row = $result->fetch_array()){

extract($row);

?>	
			  
                <tr>
                  <td><?php echo $CLIENTE; ?></td>
                  <td><?php echo $NOMBRE_CLIENTE; ?></td>
                  <td><?php echo $DESTINATARIOS; ?></td>
                  <td><a href="usuarios.php?CLIENTE=<?php echo $CLIENTE; ?>"><?php echo $USUARIOS; ?></a></td>
                  <td><?php echo $CAN_PEDIDOS; ?></td>
                  <td><?php echo $CAN_PEDIDOS_PENDIENTES; ?></td>
                  <td>*</td>
                  
				  
                </tr>
<?php } ?>				
<?php } ?>
               
			
			   
              </tbody>
            </table>	 

</form>
 
 
<?php include("footer.php"); ?>    