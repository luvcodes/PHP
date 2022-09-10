<html>
<head>
    <title>POST - Form to SQL DELETE</title>
</head>
<body bgcolor="wheat">
<?php
//Connect to DB
include("connection.php");
$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);

if (empty($_GET["id"])):
    //When listing records in DB
    $query = "SELECT * FROM `name`;";
    $stmt = $dbh->prepare($query);
    $stmt->execute(); ?>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Surname</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $stmt->fetchObject()): ?>
            <tr>
                <td><?php echo $row->fname; ?></td>
                <td><?php echo $row->sname; ?></td>
                <td><a href="?id=<?php echo $row->id; ?>">Delete</a></td> <!--Constructing a get query, because retrieving the id-->
            </tr>
        <?php endwhile; ?>
    </table>
<?php else:
    $query = "DELETE FROM `name` WHERE `id` = '$_GET[id]'";
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
endif;

$stmt->closeCursor(); ?>
</body>
</html>