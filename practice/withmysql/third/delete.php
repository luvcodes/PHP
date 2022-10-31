<html>
<head>
    <title>DELETE</title>
</head>
<body>
<!---If statement to check if empty() get method for id, display the whole table
else condition to execute the sql statement for deletion functionality.
--->
<?php
include ("connection.php");
$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);
?>
<?php
if (empty($_GET["id"])):
    $query = "select * from `name`";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    ?>
<table border="1">
    <thead>
    <tr>
        <th>Firstname</th>
        <th>Surname</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $stmt->fetchObject()): ?>
    <tr>
        <td><?= $row->fname; ?></td>
        <td><?= $row->sname; ?></td>
        <td><a href="?id=<?= $row->id; ?>">Delete</a></td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php else:
    $query = "delete from `name` where `id` = '$_GET[id]'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    ?>
The following query has been executed: <br />
<pre><?= $query; ?></pre>
<a href="?">Go Back</a>
<?php endif; ?>
</body>
</html>
