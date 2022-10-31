<html lang="en_AU">
<head>
    <title>Delete titles</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include("connection.php");
/** @var PDO $dbh */
//Now we'll process the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['isbn'])) {
    //Noticed that we're adding questions marks (parameters) to the query
    //To match number of selected items in POST request
    $query_placeholders = trim(str_repeat("?,", count($_POST['isbn'])), ",");
    $query = "DELETE FROM `titles` WHERE `ISBN` in (" . $query_placeholders . ")";
    $stmt = $dbh->prepare($query);
    if ($stmt->execute($_POST['isbn'])) {
        echo "<h3>Selected titles have been deleted</h3>";
    } else {
        echo "<h3>Error occurred while deleting titles</h3>";
    }
} else {
    echo "<h3>Please select at least one title to delete: </h3>";
}
$title_stmt = $dbh->prepare("SELECT * FROM `titles`");
if ($title_stmt->execute() && $title_stmt->rowCount() > 0) { ?>
    <form method="post">
        <input type="submit" value="Delete selected titles"/>
        <table>
            <tr>
                <th>Delete</th>
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
                    <td><?= $row->price ?></td>
                </tr>
            <?php } ?>
        </table>
    </form>
<?php } ?>
</body>
</html>
