<?php

/* sample from parfait accounting */
/* config.php */
define('DB_SERVER_DATABASE','bbs');
define('DB_SERVER_USERNAME','ken');
define('DB_SERVER_PASSWORD','password');
/* define('DB_SERVER_HOST','localhost'); */


/* $connect = mysqli_connect('db', DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_SERVER_DATABASE, 3306) or die('Failed to connect to the database, died with error:'); */
$connect = mysqli_connect('db', DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_SERVER_DATABASE) or die('Failed to connect to the database, died with error:');
?>
