<?php
<?php 
# HelloServer.php
# Copyright (c) HerongYang.com. All Rights Reserved.
#
function hello($someone) { 
   return "Hello " . $someone . "!";
} 
   $server = new SoapServer(null, 
      array('uri' => "urn://andy.cl/PORTAL-VENTAS/WS/IN/DEMO/"));
   $server->addFunction("hello"); 
   $server->handle(); 
?>