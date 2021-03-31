
                
        <?php include("header.php"); ?>
		
 
		<h2 class="title30 font-bold text-uppercase sub_title">Usuario Borrado Correctamente</h2>
		
 		
		<br/>
		
       
			  
<?php


$sql="delete from USUARIOS WHERE email='".$emaildo."'";
	
mysqli_query($conn, $sql);
  
?>
 

<script  type="text/javascript">

alert('Usuario Borrado Correctamente, ahora volvera a la pantalla anterior.');

  window.history.back();


function CrearNuevoUsuario(){
	window.parent.location.href="usuario_crear.php?CLIENTE=<?php echo $CLIENTE; ?>";
}

</script>
 
<?php include("footer.php"); ?>    