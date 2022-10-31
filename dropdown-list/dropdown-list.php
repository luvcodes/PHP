<html lang="en_AU">
<head>
    <title>Dropdown lists</title>
</head>
<body>
<?php
//var_dump($_GET);
include("connection.php");
$dsn = "mysql:host=$db_host;dbname=$db_name";
$dbh = new PDO($dsn,$db_username,$db_passwd);
$query = "SELECT * FROM `publishers` ORDER BY `company_name`";
$stmt = $dbh->prepare($query);
?>
<?php if ($stmt->execute() && $stmt->rowCount() > 0): ?>
    <form>
        <label for="publisher">Select a publisher</label><br />
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
<!--<div class="more-space">-->
<!--    The following query has been executed:-->
<!--    <pre>--><?//= $query; ?><!--</pre>-->
<!--</div>-->
</body>
</html>
