<?php
require_once ("connection.php");

$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);
$stmt = $dbh->prepare("select * from `customer`");
$stmt->execute();
?>

<table border="1">
    <?php while ($row = $stmt->fetchObject()): ?>
    <tr>
        <td><?= $row->cust_no; ?></td>
        <td><?= $row->firstname; ?></td>
        <td><?= $row->surname; ?></td>
        <td><?= $row->address; ?></td>
        <td><?= $row->contact; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
