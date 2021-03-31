<?php
$conn = mysqli_connect("191.232.184.42", "portal_ventas", "Servidores.2015++", "portal_ventas");

//$GLOBALS["conn"] = $conn;

if (!$conn) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Éxito... ' . mysqli_get_host_info($conn) . "\n";

//mysqli_close($conn);



/*este archivo lo utilizaremos con include 'dbconn.php';*/

?>

