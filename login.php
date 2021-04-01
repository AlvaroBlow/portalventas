<?php include("header.php");?>
<?php

/*if($accion=="desconectarse"){
	
$_SESSION['DESTINATARIO']='0';
session_destroy();

}*/

?>
     



<article id="post-3105" class="post-3105 page type-page status-publish hentry">
                                <h2 class="title-page">Acceso a Mi Cuenta</h2>
								<div class="entry-content">
									<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

<p>
<?php echo @$mensaje; ?>
</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="email">Email&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" autocomplete="username" value="">			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password">Clave&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password">
			</p>

			
			<p class="form-row">
				<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="c47241cffc"><input type="hidden" name="_wp_http_referer" value="/my-account-2/">				<button type="submit" class="woocommerce-Button button" name="login" value="Log in">Ingresar</button>
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Recuerdame</span>
				</label>
			</p>
		<!--	<p class="woocommerce-LostPassword lost_password">
				<a href="https://fruitshop.7uptheme.net/my-account-2/lost-password/">Lost your password?</a>
			</p>-->

			
		</form>


</div>
																	</div><!-- .entry-content -->
							</article>	 
	 
	 
	 
	 
	 
                        
<?php include("footer.php"); ?>    