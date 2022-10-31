<html lang="en_AU">
<head>
    <title>Dropdown lists</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
var_dump($_GET);
include("connection.php");
/** @var PDO $dbh */
$query = "SELECT * FROM `publishers` ORDER BY `company_name`";
$stmt = $dbh->prepare($query);
?>
<div class="more-space">The following query has been executed: <code><?php echo $query; ?></code></div>
<?php if ($stmt->execute() && $stmt->rowCount() > 0): ?>
    <form>
        <label for="publisher">Select a publisher</label>
        <select name="publisher" id="publisher">
            <?php while ($row = $stmt->fetchObject()): ?>
                <?php
                if ($row->ID == $_GET['assign']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                ?>
                <option value="<?= $row->ID ?>" <?=$selected?>><?= $row->company_name ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit"/>
    </form>
<?php endif; ?>
</body>
</html>
