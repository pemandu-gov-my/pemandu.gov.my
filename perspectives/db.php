<?php 
$dbserver = "127.0.0.1";
$dbname = "pemandu1_gtp";
$dbusername = "pemandu1_gtp";
$dbpassword = "pemandu1_gtp";

mysql_connect("$dbserver","$dbusername","$dbpassword") or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error()); 
?> 
