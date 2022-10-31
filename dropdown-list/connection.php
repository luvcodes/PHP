<?php
$db_host = "localhost";
$db_username = "fit2104";
$db_passwd = "fit2104";
$db_name = "fit2104_22s2_lecture06";
$dsn = "mysql:host=$db_host;dbname=$db_name";
$dbh = new PDO($dsn,$db_username,$db_passwd);
