
                
        <?php include("header.php"); ?>
		
     
	 <article id="post-2021" class="post-2021 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="vc_row wpb_row vc_custom_1494294372288"><div class="wpb_column column_container col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
        <div class="shop-pagibar clearfix">
            <div class="desc silver pull-left">
        <p class="woocommerce-result-count">
            <!--Mostrando 1–12 de 25 resultados-->        </p>
        </div>
            <ul class="wrap-sort-view list-inline-block pull-right">
                
                <!--<li class="mb-view-grid-list">
                    <div class="view-bar">
                        <a data-type="grid" class="load-shop-ajax grid-view  active" href="https://fruitshop.7uptheme.net/shop-full-width/?type=grid"></a>
                        <a data-type="list" class="load-shop-ajax list-view " href="https://fruitshop.7uptheme.net/shop-full-width/?type=list"></a>
                    </div>-->
                </li>
            </ul>
        </div>
                <div class=" mb-product-element-grid product-grid-view mb-element-product-style9 woocommerce  ">
            <div class="row">



<?php

if(!isset($s)){
$sql = "SELECT *, (select MEINS from MATERIALES where MATNR=MATERIAL limit 1) as UNIDAD FROM VIEW_MATERIALES";
}else{
	
$sql = "SELECT *, (select MEINS from MATERIALES where MATNR=MATERIAL limit 1) as UNIDAD  FROM VIEW_MATERIALES
WHERE
NOMBRE_MATERIAL LIKE '%".$s."%'
	";
	
	
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);
	
	$MAKTX = "".$NOMBRE_MATERIAL;
	$VTEXT = $MAKTX;
	if($PRODH!=""){
		
		
		if(!file_Exists("../images/productos/".$PRODH.".jpg")){	
			$imagen="https://ventas.aconcaguafoods.cl/images/productos/SIN.jpg?v=14";
		}else{
			$imagen="https://ventas.aconcaguafoods.cl/images/productos/".$PRODH.".jpg?v=14";			
		}
	
	$precio = (int) precio($MATERIAL);


if($precio>0){
	
	$precio = number_format($precio,0);
?>
<!--Inicia Producto --> 
<div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="item-product item-product-grid text-center product ">
                            <div class="product-thumb">
		<a href="#" class="product-thumb-link rotate-thumb ">
<img data-id="<?php echo $PRODH; ?>" data-material="<?php echo $MATERIAL; ?>" width="600" height="600" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_600,h_600/<?php echo $imagen; ?>" class="attachment-600x600 size-600x600 wp-post-image" alt=""><img width="600" height="600" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_600,h_600/<?php echo $imagen; ?>" class="attachment-600x600 size-600x600" alt="">        </a>
        <a data-product-id="2812" href="#" class="quickview-link product-ajax-popup"><i class="fa fa-search" style="padding-top: 10px;" aria-hidden="true"></i></a>

                                    </div>
                            <div class="product-info">
                                <h3 class="product-title"><a href="#"><?php echo $MAKTX; ?></a></h3>
                                <div class="product-price">
                                    
	<span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><!--<?php echo $PRODH; ?>--> $</span><?php echo $precio;  ?></span> </span>
                                <span>U.Medida: <?php echo $UNIDAD; ?></span>
								</div>
							
							



<div class="qib-container">

<div class="col-md-4 col-sm-4 col-xs-4"><button type="button" class="minus qib-button"  onclick="Disminuir('<?php echo $PRODH; ?>');">-</button></div>

<div class="col-md-4 col-sm-4 col-xs-4"><div class="quantity buttons_added"><label class="screen-reader-text" for="quantity_5fc7a1cd98dff"></label>			<input type="number" id="<?php echo $PRODH; ?>" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Cantidad" size="4" placeholder="" inputmode="numeric"></div></div>

<div class="col-md-4 col-sm-4 col-xs-4"><button type="button" class="plus qib-button" onclick="Aumentar('<?php echo $PRODH; ?>');" >+</button></div>
		
</div>	

<input value="COMPRAR" type="button" onclick="Comprar('<?php echo $PRODH; ?>');"  style="width: 100%;margin-top: 10px; background-color: #66cc33; color: #fff;">
							
							
                            </div>
                        </div>
</div>
<!--fin producto-->
			
		<?php
}

		} ?>
	
<?php	
  }
} else {
  echo "0 results";
}

?>
			
                            </div>
        </div>
        
<!--<nav class="woocommerce-pagination pagibar text-center">
	<span aria-current="page" class="page-numbers current">1</span>
	<a class="page-numbers" href="https://fruitshop.7uptheme.net/shop-full-width/page/2/">2</a>
	<a class="page-numbers" href="https://fruitshop.7uptheme.net/shop-full-width/page/3/">3</a>
	<a class="next page-numbers" href="https://fruitshop.7uptheme.net/shop-full-width/page/2/"><i class="icon ion-ios-arrow-thin-right"></i></a>
	</nav> -->

</div></div></div></div>
                                            </div><!-- .entry-content -->
                </article>
	 
	 
	 
                        
        <?php include("footer.php"); ?>    