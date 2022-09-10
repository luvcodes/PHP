<html>
<head>
<title>Post errorchecking</title>
</head>
<body>
<?php if (empty($_POST["fname"]) || empty($_POST["lname"])): ?>
<form method="post">
    Please enter your first name <input type="text" name="fname">
    Please enter your last name <input type="text" name="lname">
    <input type="submit" value="submit">
    <input type="reset" value="Clear All Fields">
</form>
<?php else:
    $dsn = "mysql:host=$host;dbname=$db";
    $dbh = new PDO($dsn, $username, $password);
    $query = "INSERT INTO `name` (`fname`, `sname`) VALUES ('$_POST[fname]', null, '$_POST[sname]')";
    $stmt = $dbh->prepare($query);
    // Error checking
    if (!$stmt->execute()) {
        $err = $stmt->errorInfo();
        var_dump($err);
        echo "Error adding record to database – contact System Administrator<br />Error is:  <b>" . $err[2] . "</b>";
    } else {
        echo "The following query has been executed: <br />";
        echo "<pre>$query</pre>";
    }
    ?>
<?php endif; ?>
</body>
</html>