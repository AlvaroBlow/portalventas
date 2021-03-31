
<?php

$fileRemote= "materiales_produccion.txt";
$server = "191.232.184.42";
$port = "21";
$username = "portal";
$password = "Adm.@foods2020"; 

//username and password removed for security reasons

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');

//echo get_include_path() . PATH_SEPARATOR;

include '../Net/SFTP.php';

define('NET_SFTP_LOGGING', NET_SFTP_LOG_COMPLEX); // or   NET_SFTP_LOG_SIMPLE, NET_SFTP_LOG_COMPLEX

$sftp = new Net_SFTP($server,$port);

// Check SFTP Connection
if (!$sftp->login($username, $password)) {  
    $sftp->getSFTPLog();
    echo 'Login Failed.';
}else{

echo 'Connected to SFTP.';

echo $sftp->pwd();


exit();
// Upload CSVs to SFTP incoming folder
     //echo $upload = $sftp->put("incoming/".$file, "./bayport/".$file, NET_SFTP_LOCAL_FILE);
     $sftp->put("/TXT/ALVARO.txt", $fileRemote, NET_SFTP_LOCAL_FILE);
     //$sftp->put('filename.remote', 'filename.local', NET_SFTP_LOCAL_FILE);


     var_dump($fileRemote);
     echo "<pre>";
     var_dump($sftp->getSFTPLog());
     echo "</pre>";
}

?>