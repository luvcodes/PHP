<html lang="en_AU">
<head>
    <title>Update prices of multiple titles</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include("connection.php");
/** @var PDO $dbh */
//Now we'll process the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['isbn'])) {
    foreach ($_POST['isbn'] as $isbn) {
        if (isset($_POST['prices'][$isbn])) {
            $query = "UPDATE `titles` SET `price`=:price WHERE `ISBN` = :isbn";
            $stmt = $dbh->prepare($query);
            if (!$stmt->execute([
                'price' => $_POST['prices'][$isbn],
                'isbn' => $isbn
            ])) {
                echo "<h3>Error occurred while updating price of ISBN# $isbn!</h3>";
                break;
            }
        } else {
            echo "<h3>The price of ISBN# $isbn does not exist!</h3>";
            break;
        }
    }
}
echo "<h3>Please select at least one title to modify its price: </h3>";
$title_stmt = $dbh->prepare("SELECT * FROM `titles`");
if ($title_stmt->execute() && $title_stmt->rowCount() > 0) { ?>
    <form method="post">
        <input type="submit" value="Update the prices of selected titles"/>
        <table>
            <tr>
                <th>Update?</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Price</th>
            </tr>
            <?php while ($row = $title_stmt->fetchObject()) { ?>
                <tr>
                    <td class="col-checkbox">
                        <input type="checkbox" name="isbn[]" value="<?php echo $row->ISBN; ?>"/>
                    </td>
                    <td><?= $row->ISBN ?></td>
                    <td><?= $row->title ?></td>
                    <td><input type="text" name="prices[<?= $row->ISBN ?>]" value="<?= $row->price ?>"/></td>
                </tr>
            <?php } ?>
        </table>
    </form>
<?php } ?>
</body>
</html>
