
                
        <?php include("header.php"); ?>
		
 
		<h2 class="title30 font-bold text-uppercase sub_title">Listado Usuarios Cliente</h2>
		
 		
		<br/>
		
      <form action="terminar.php" method="POST" id="carro">
	 
	<?php

$sql="select * from USUARIOS
WHERE cast(cliente as int)=cast('".$CLIENTE."' as int) and id_tipo_usuario='1'";
	
	$result = mysqli_query($conn, $sql);
  



if(mysqli_num_rows($result)>0){

?>	
		  
		  
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Acciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
			  
<?php




while($row = $result->fetch_array()){

extract($row);

?>	
			  
                <tr>
                  <td><?php echo $email; ?></td>
                  <td>	<a href="usuariosBorrar.php?emaildo=<?php echo $email; ?>&DO=borrar">Borrar </a> | <a href="UsuarioClave.php?emailU=<?php echo $email; ?>">Cambiar Clave </a> 	 </td>

                  <td>*</td>
                  
				  
                </tr>
<?php } ?>				

               
			
			   
              </tbody>
            </table>	 


<?php }else{
	
?>

<p>Sin usuarios para este cliente.</p>
<?php	
	
} ?>

</form>


 <button type="submit" class="button" name="TerminarCompra" value="Crear Usuario" onclick="CrearNuevoUsuario();" style="background-color: #66cc33; color: #fff;">Crear Usuario</button>	 


<script  type="text/javascript">

function CrearNuevoUsuario(){
	window.parent.location.href="usuario_crear.php?CLIENTE=<?php echo $CLIENTE; ?>";
}

</script>
 
<?php include("footer.php"); ?>    