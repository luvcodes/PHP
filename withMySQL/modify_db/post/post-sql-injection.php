<html>
<head>
    <title>POST - SQL Injection</title>
</head>
<body bgcolor="wheat">
<?php
//Connect to DB
include("connection.php");
$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);

if (empty($_GET["sname"])): ?>
    <form method="get">
        Please enter the Surname to be deleted <br/>
        Surname <input type="text" name="sname" value="Mclean' OR `id` > '190"> <br/>
        <input type="Submit" Value="Submit">
        <input type="Reset" Value="Clear Form Fields">
    </form>
<?php else:
    $query = "DELETE FROM `name` WHERE `sname` = '$_GET[sname]'";
    $stmt = $dbh->prepare($query);
    //Error checking
    if (!$stmt->execute()) {
        $err = $stmt->errorInfo();
        echo "Error deleting record from database – contact System Administrator
		Error is:  <b>" . $err[2] . "</b>";
    } else {
        echo "The following query has been executed: <br />";
        echo "<pre>$query</pre>";
        echo "<a href='?'>Go Back!</a>";
    }
endif; ?>
</body>
</html>