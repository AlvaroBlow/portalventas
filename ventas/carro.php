
                
        <?php include("header.php"); ?>
		
<?php

if(isset($_SESSION['CARRO'][$MATERIAL])){
	unset($_SESSION['CARRO'][$MATERIAL]);
}

?>
		
		
<?php  if(count($_SESSION['CARRO'])>0){ ?>		
		
      <form action="terminar.php" method="POST" id="carro">
	 
	 
		  
		  
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Productos</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
			  
<?php

$Total_Final=0;

$i=0;
foreach ($_SESSION['CARRO'] as $clave => $valor) {
$i++;

$sql="
 select * from  MATERIALES
where MATNR='".$clave."' LIMIT 1";
	
	$result = mysqli_query($conn, $sql);
  
	if(mysqli_num_rows($result)>0){
	$row = $result->fetch_array();
	extract($row);
	}

if(true){

?>	
			  
                <tr>
                  <td><a data-materal="<?php echo $clave; ?>"><?php echo $PRODH; ?></a></td>
                  <td><?php echo $MAKTX; ?></td>
                  <td>$ 
				  <?php
				  
				  	$precio = (int) precio($clave);	
					 
					echo number_format($precio,0); 
					
				  ?>
				  </td>
                  <td>
				   

<?php echo $valor; ?>	
</div>			  
				  
				   
                  </td>
                  <td> <?php
						
						$total = $precio * $valor;
						$Total_Final = $Total_Final+$total;
						echo number_format($total,0);
						
				  $precio=0; ?> </td>
                  <td>
                    <div class="ps-remove"><a href="?MATERIAL=<?php echo $clave; ?>&borrar=borrar">x</a></div>
                  </td>
                </tr>
<?php } ?>				
<?php } ?>
               
				<tr>
                  <th> </th>
                  <th><?php echo $i; ?></th>
                  <th>-</th>
                  <th>-</th>
                  <th><?php echo number_format($Total_Final,0); ?></th>
				  <th></th>
                </tr>
			   
              </tbody>
            </table>	 

</form>
<?php }else{ ?>

<h2 class="title30 color">El carro se encuentra vacio.</h2>
 

<p style="text-align: center;">
<img src="img/carrito.jpg" style="width: 50%;"  /></p>

<?php } ?>

<a href="productos.php" style="background-color: #ccc; color: #fff; margin: .4em;
    padding: 1em;
    cursor: pointer;
    background: #e1e1e1;
    text-decoration: none;
    color: #666666;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);    border: 2px solid #000;">Continuar Comprando</a>
	 

<?php if (count($_SESSION['CARRO'])>0){	  ?>
<button type="submit" class="button" name="TerminarCompra" value="Terminar Compra" onclick="$('#carro').submit();" style="background-color: #66cc33; color: #fff;">Terminar Compra</button>	 
<?php } ?>              
<br/>
<?php include("footer.php"); ?>    