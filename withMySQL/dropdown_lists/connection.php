<?php
$host = "localhost";
$db = "fit2104_22s2_lecture06";
$username = "fit2104";
$password = "fit2104";
$dsn = "mysql:host=$host; dbname=$db";
$dbh = new PDO($dsn, $username, $password);
