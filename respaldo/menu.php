    <header class="header">
	
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>J Alberto Bravo Ote 0278, San Bernardo, Buin, Región Metropolitana -  Telefono: (2) 2821 8000</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions"><a href="login.php?accion=desconectarse">Desconectarse</a>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><img src="images/flag/usa.svg" alt=""> CLP</a></li>
                      </ul>
                    </div>
             
                  </div>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="index.php"><img src="images/logo.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="index.php">Inicio</a>
                   
                  </li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="product-listing.php">Productos</a></li>
                  <li class="menu-item"><a href="product-listing.php">Historial Pedidos</a></li>
 
                  <li class="menu-item menu-item-has-children dropdown"><a href="#">Contacto</a>
                        <ul class="sub-menu">
                          <li class="menu-item"><a href="contact-us.php">Contact Us #1</a></li>
                          <li class="menu-item"><a href="contact-us.php">Contact Us #2</a></li>
                        </ul>
                  </li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="do_action" method="post">
              <input class="form-control" type="text" placeholder="Buscar Producto…">
              <button><i class="ps-icon-search"></i></button>
            </form>
            <div class="ps-cart"><a class="ps-cart__toggle" href="cart.php"><span><i>20</i></span><i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content">
				
				
<?php

//echo var_dump($_SESSION['CARRO']);


$i=0;
foreach ($_SESSION['CARRO'] as $clave => $valor) {
$i++;
?>				
				
				
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="quitar.php?Material=<?php echo $clave; ?>"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.php"></a><img src="images/cart-preview/1.jpg" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.php"><?php echo $clave; ?></a>
                      <p><span>Cantidad:<i><?php echo $valor; ?></i></span><span>Total:<i>$176</i></span></p>
                    </div>
                  </div>
				  
<?php }

?>				  
               
                </div>
                <div class="ps-cart__total">
                  <p>Number of items:<span><?php echo $i; ?></span></p>
                  <p>Item Total:<span>$528.00</span></p>
                </div>
                <div class="ps-cart__footer"><a class="ps-btn" href="cart.php">Enviar Pedido<i class="ps-icon-arrow-left"></i></a></div>
              </div>
            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
   
   
   <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Despacho Gratuito</strong>: Region metropolitana, compras superiores a 20.000</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Despacho Gratuito</strong>: Region metropolitana, compras superiores a 20.000</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Despacho Gratuito</strong>: Region metropolitana, compras superiores a 20.000</p>
      </div>
    </div>