<?php

include("inc/conf.php");


?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Listado de Productos</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
    <div class="header--sidebar"></div>
 
 <?php include("menu.php"); ?>

 

	
	
    <main class="ps-main">
      <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">Ordenar Por</option>
                <option value="2">Nombre</option>
                <option value="3">Precio (Menor a Mayor)</option>
                <option value="3">Precio (Mayor a menor)</option>
              </select>
            </div>
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="ps-product__columns">
		  
<?php

$sql = "SELECT *, (SELECT MAKTX FROM MATERIALES WHERE MATERIALES.PRODH=MATERIALES_JERARQUIA_VIEW.PRODH LIMIT 1) AS NOMBRE_MATERIAL,
('0') AS PRECIO
 FROM  MATERIALES_JERARQUIA_VIEW
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);
	
	$MAKTX = "**".$NOMBRE_MATERIAL;
	$VTEXT = $MAKTX;
	if($PRODH!=""){
		
		
		if(!file_Exists("images/productos/".$PRODH.".jpg")){	
			$imagen="images/productos/SIN.jpg";
		}else{
			$imagen="images/productos/".$PRODH.".jpg";			
		}
	
?>
		  
		  
		  
            <div class="ps-product__column">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail">
                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
				  
<img src="<?php echo $imagen; ?>" alt="">





			  <a style="
    font-family: &quot;Montserrat&quot;, sans-serif;
    /* font-weight: 400; */
    width: 100%;
    height: 42px !important;
    /* z-index: 10; */
    background-color: #2AC37D;
    color: white;
    border-radius: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
	cursor:pinter;
">Ver Detalle</a>













<a class="ps-shoe__overlay" href="product-detail.php?Material=<?php echo $PRODH; ?>"></a>

                </div>
                <div class="ps-shoe__content">
                  <!--<div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                    <select class="ps-rating ps-shoe__rating">
                      <option value="1">1</option>
                      <option value="1">2</option>
                      <option value="1">3</option>
                      <option value="1">4</option>
                      <option value="2">5</option>
                    </select>
                  </div>-->
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#"><?php echo $MAKTX; ?></a>
				  
			

<div class="qib-container">
		<button type="button" class="minus qib-button"  onclick="Disminuir('<?php echo $PRODH; ?>');">-</button>
		<div class="quantity buttons_added">
			<label class="screen-reader-text" for="quantity_5fc7a1cd98dff"></label>			<input type="number" id="<?php echo $PRODH; ?>" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Cantidad" size="4" placeholder="" inputmode="numeric">
		</div>
		<button type="button" class="plus qib-button" onclick="Aumentar('<?php echo $PRODH; ?>');" >+</button>
</div>


<input value="COMPRAR" type="button" onclick="Comprar('<?php echo $PRODH; ?>');"  style="
    width: 100%;
">
	

                    <p class="ps-shoe__categories"><a href="#"><?php echo $VTEXT; ?></a></p><span class="ps-shoe__price">
                        $ <?php echo $PRECIO; ?>__
						<?php echo precio($PRODH); ?>
						
						</span>
					  



					  
                  </div>
                </div>
              </div>
            </div>
	<?php } ?>
	
<?php	
  }
} else {
  echo "0 results";
}

?>
	
   
			
			
          </div>
          <div class="ps-product-action">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">Shortby</option>
                <option value="2">Name</option>
                <option value="3">Price (Low to High)</option>
                <option value="3">Price (High to Low)</option>
              </select>
            </div>
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Categoria</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
			  
		              <!--  <li class="current"><a href="product-listing.html">Conservas Frutas</a></li>-->
	  
			  
<?php

$sql = "SELECT (
`MATERIALES`.`VTEXT`
) AS Categoria, COUNT( * ) AS Cantidad
FROM `MATERIALES`
GROUP BY VTEXT";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);
?>
                <li><a href="product-listing.php?Categoria=<?php echo $Categoria; ?>"><?php echo $Categoria; ?>(<?php echo $Cantidad; ?>)</a></li>
<?php	
  }
} else {
  echo "0 results";
}

?>	
			  
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
              <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
              <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
              <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>MARCAS</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
			  
<?php

$sql = "SELECT (
`MATERIALES`.`BEZEI`
) AS Marcas, COUNT( * ) AS Cantidad
FROM `MATERIALES`
GROUP BY BEZEI";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);
?>
                <li><a href="product-listing.php?Marca=<?php echo $Marcas; ?>"><?php echo $Marcas; ?>(<?php echo $Cantidad; ?>)</a></li>
<?php	
  }
} else {
  echo "0 results";
}

?>			  
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Formato</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
			  
			  
<?php

$sql = "SELECT (
`materiales`.`VTEXT_2`
) AS Formato, COUNT( * ) AS Cantidad
FROM `materiales`
GROUP BY VTEXT_2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	extract($row);
?>
                <li><a href="product-listing.php?Formato=<?php echo $Formato; ?>"><?php echo $Formato; ?>(<?php echo $Cantidad; ?>)</a></li>
<?php	
  }
} else {
  echo "0 results";
}

?>				  
              </ul>
            </div>
          </aside>
 
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Ads Banner-->
          <!--    .ps-widget__content-->
          <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
          <!---->
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Best Seller-->
          <!--    .ps-widget__content-->
          <!--        - for (var i = 0; i < 3; i ++)-->
          <!--            .ps-shoe--sidebar-->
          <!--                .ps-shoe__thumbnail-->
          <!--                    a(href='#')-->
          <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
          <!--                .ps-shoe__content-->
          <!--                    if i == 1-->
          <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
          <!--                    else if i == 2-->
          <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
          <!--                    else-->
          <!--                        a(href='#').ps-shoe__title Men's Sky-->
          <!--                    p <del> £253.00</del> £152.00-->
          <!--                    a(href='#').ps-btn PURCHASE-->
        </div>
      </div>
    
		<?php include("footer.php"); ?>

	
	</main>
    <!-- JS Library-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
	
	<style>

.qib-container:not(#qib_id):not(#qib_id) {
    display: inline-flex;
}


.qib-container {
    margin: auto;
    width: 100%;
    margin-bottom: 5px;
    text-align: center;
}


.qib-container > *:not(:last-child):not(#qib_id):not(#qib_id) {
    margin-right: 5px!important;
}
.qib-button:not(#qib_id):not(#qib_id) {
    line-height: 1;
    display: inline-block;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    height: 35px;
    width: 42px;
    color: black;
    background: #e2e2e2;
    border-color: #cac9c9;
    min-height: initial;
    min-width: initial;
    max-height: initial;
    max-width: initial;
    vertical-align: middle;
    font-size: 16px;
    letter-spacing: 0;
    border-style: solid;
    border-width: 1px;
    transition: none;
    border-radius: 4px;
}



.qib-button:not(#qib_id):not(#qib_id) {
    line-height: 1;
    display: inline-block;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    height: 35px;
    width: 42px;
    color: black;
    background: #e2e2e2;
    border-color: #cac9c9;
    min-height: initial;
    min-width: initial;
    max-height: initial;
    max-width: initial;
    vertical-align: middle;
    font-size: 16px;
    letter-spacing: 0;
    border-style: solid;
    border-width: 1px;
    transition: none;
    border-radius: 4px;
}	
	
	</style>
	
	
  </body>
</html>