
                
        <?php include("header.php"); ?>
		
 
		
 		
		
		
		
		
		
		
		
		
		<article id="post-3105" class="post-3105 page type-page status-publish hentry">
                                <h2 class="title-page">Crear Cuenta</h2>
								<div class="entry-content">
									<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>

<?php

$mensaje="";
$errores=0;
$creado=false;

if(isset($cliente,$email_s,$password_s)){
	
echo "Crear usuario";

$sql="select * from USUARIOS WHERE email='".$email_s."'";
	
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){

$mensaje.="El Usuario ya existe, si desea reasignar debe borrarlo antes.<br>";
$errores++;

}

if(!(strlen($password_s)>=5)){

$mensaje.="La Contraseña debe poseer una longitud minima de 5 caracteres.<br>";
$errores++;	
	
}
	
	
if (!filter_var($email_s, FILTER_VALIDATE_EMAIL)) {
    $mensaje.="Ingrese un email válido.<br>";
	$errores++;	
}
		
	
	
	
if($errores==0){
	//a crear usuario
	$sql="INSERT INTO `USUARIOS` VALUES ('".$email_s."', '".$password_s."', '".$CLIENTE."', '-', '-', '-', '1');";	    	
	$conn->query($sql);	
	$creado=true;
	
	//Enviar Notificación Por coreo
	
?>
<h2 class="title-page">Usuario Creado Correctamente</h1>


 <button type="submit" class="button" name="TerminarCompra1" value="Continuar" onclick="Continuar(1);" style="background-color: #66cc33; color: #fff;">Volver</button>	 

 <button type="submit" class="button" name="TerminarCompra2" value="Continuar" onclick="Continuar(2);" style="background-color: #66cc33; color: #fff;">Crear Otro</button>	 

<?php	
	
}else{
?>	
<h2 class="title-page">Errores al crear Usuario</h1>
	<?php
echo $mensaje;

}



	
	
}

?>

<?php if($creado!=true){ ?>
		<form class="woocommerce-form woocommerce-form-login login" method="post">

<p>
</p>


<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="email">Cliente&nbsp;<span class="required">*</span></label>
				<input type="text" readonly="" class="woocommerce-Input woocommerce-Input--text input-text" name="cliente" id="cliente"  value="<?php echo ((INT)$CLIENTE); ?>">			</p>
			
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="email">Email&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email_s" id="email_s" autocomplete="username" value="">			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password">Clave&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="password_s" id="password_s" autocomplete="current-password">
			</p>

			
			<p class="form-row">
				<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="c47241cffc"><input type="hidden" name="_wp_http_referer" value="/my-account-2/">				<button type="submit" class="woocommerce-Button button" name="login" value="Log in">Crear Usuario</button>
				
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