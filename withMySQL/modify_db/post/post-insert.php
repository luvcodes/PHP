<html>
<head>
    <title>POST - Form to SQL INSERT</title>
</head>
<body bgcolor="wheat">
<?php
var_dump($_POST);
if (empty($_POST["fname"]) || empty($_POST["sname"])):
    ?>
    <form method="post">
        Please type your name in the space below <br/>
        First Name <input type="text" name="fname"> <br/>
        Surname <input type="text" name="sname"> <br/>
        <input type="Submit" Value="Submit">
        <input type="Reset" Value="Clear Form Fields">
    </form>
<?php else:
    include("connection.php");
    $dsn = "mysql:host=$host;dbname=$db";
    $dbh = new PDO($dsn, $username, $password);
    $query = "INSERT INTO `name` (`fname`, `sname`) VALUES ('$_POST[fname]', '$_POST[sname]')";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    ?>
    The following query has been executed: <br/>
    <pre><?php echo $query; ?></pre>
<?php endif; ?>
</body>
</html>
