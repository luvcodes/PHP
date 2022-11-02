<?php
require_once ('connection.php');
$dsn = "mysql:host=$host; dbname=$db;";
$dbh = new PDO($dsn, $username, $password);
$stmt = $dbh->prepare("select * from customer");
$stmt->execute();
?>
<?php while ($row = $stmt->fetchObject()): ?>
<tr>
    <td><?php echo $row->cust_no;?></td>
    <td><?php echo $row->firstname;?></td>
    <td><?php echo $row->surname;?></td>
    <td><?php echo $row->address;?></td>
    <td><?php echo $row->contact;?></td>
    <br>
</tr>
<?php endwhile;
$stmt->closeCursor(); ?>

