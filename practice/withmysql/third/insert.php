<html>
<head>
    <title>INSERT</title>
</head>
<body>
<?php // first use if statement to check empty() firstname and lastname, accept user input
// second use else condition to execute sql statement
?>
<?php
include ("connection.php");
$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);
?>
<?php
if (empty($_POST["fname"]) || empty($_POST["sname"])): ?>
<form method="post">
    Firstname : <input type="text" name="fname"> <br/>
    Surname : <input type="text" name="sname"> <br/>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>
<?php else:
    $query = "insert into `name` (`fname`, `sname`) values ('$_POST[fname]', '$_POST[sname]')";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    ?>
The following query has been executed: <br />
<pre><?= $query; ?></pre>
<?php endif; ?>
</body>
</html>
