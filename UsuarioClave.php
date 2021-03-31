
                
        <?php include("header.php"); ?>
		
		<article id="post-3105" class="post-3105 page type-page status-publish hentry">
                                <h2 class="title-page">Editar Cuenta</h2>
								<div class="entry-content">
									<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>

<?php

extract($_REQUEST);

	if(isset($emailU)){
		
	$sql="select * from USUARIOS WHERE email='".$emailU."'";
	$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result)>0){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		extract($row);
		}
		
	}


$mensaje="";
$errores=0;
$creado=false;

if(isset($email_s)){
	

if(!(strlen($password_s)>=5)){

$mensaje.="La Contraseña debe poseer una longitud minima de 5 caracteres.<br>";
$errores++;	
	
}
	
 
		
	
	
	
if($errores==0){
	
	//a crear usuario
	$sql="UPDATE USUARIOS SET clave='".$password_s."' WHERE email='".$email_s."';";	 
   	
	$conn->query($sql);	
	$creado=true;
	
	echo "Usuario actualizado";
		
?>
<h2 class="title-page">Usuario Actualizado Correctamente</h1>


 <button type="submit" class="button" name="TerminarCompra1" value="Continuar" onclick="Continuar(1);" style="background-color: #66cc33; color: #fff;">Volver</button>	 


<?php	
	
}else{
	
	echo $mensaje;
	
?>	


<?php

}



	
	
}

?>

<?php if(true){ ?>
		<form class="woocommerce-form woocommerce-form-login login" method="post">

			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="email">Email&nbsp;<span class="required">*</span></label>
				<input type="text" readonly class="woocommerce-Input woocommerce-Input--text input-text" name="email_s" id="email_s" autocomplete="username" value="<?php
				
				if(isset($email_s)){
					echo $email_s;
				}else{
					echo $email;
				}
	


				?>">			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password">Clave&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="password_s" id="password_s" autocomplete="current-password" value="<?php 
				
			if(isset($email_s)){
					echo $password_s;
				}else{
					echo $clave;
				}
	

				?>">
			</p>

			
			<p class="form-row">
				<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="c47241cffc"><input type="hidden" name="_wp_http_referer" value="/my-account-2/">				<button type="submit" class="woocommerce-Button button" name="login" value="Log in">Actualizar Usuario</button>
				
			</p>
		<!--	<p class="woocommerce-LostPassword lost_password">
				<a href="https://fruitshop.7uptheme.net/my-account-2/lost-password/">Lost your password?</a>
			</p>-->

			
		</form>
<?php } ?>

</div>
																	</div><!-- .entry-content -->
							</article>

<script>

function Continuar(tipo){
	
	if(tipo==1){
	window.parent.location.href="usuarios.php?CLIENTE=<?php echo $CLIENTE; ?>";
	}else{
	window.parent.location.href="usuario_crear.php?CLIENTE=<?php echo $CLIENTE; ?>";		
	}

}


</script>
		
<?php include("footer.php"); ?>    