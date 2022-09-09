<?php
$dbh = new PDO('mysql:host:localhost;dbname=fit2104_22s2_lecture05','fit2104','fit2104');
$stmt = $dbh->prepare("SELECT * FROM Customer");
$stmt->execute();

while($row = $stmt->fetch()): ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
    </tr>
<?php endwhile;
$stmt->closeCursor(); ?>
