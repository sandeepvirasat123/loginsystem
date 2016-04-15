<?php
ob_start();
$mysql_hostname ="localhost";$mysql_user ="login-system";$mysql_password ="login-system";$mysql_database ="login-system";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
ob_end_clean();
?>