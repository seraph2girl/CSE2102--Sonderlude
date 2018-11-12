<?php
// To connect you need to enter your host info
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mdk');
define('DB_PASSWORD', 'KLA19bk50.');
define('DB_NAME','IMIS_users');

/* Script to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
