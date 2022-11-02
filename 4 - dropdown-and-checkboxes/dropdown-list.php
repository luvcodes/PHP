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
$stmt->execute();
?>
<?php if ($stmt->rowCount() > 0): ?>
    <form>
        <label for="publisher">Select a publisher</label><br />
        <select name="publisher" id="publisher">
            <?php while ($row = $stmt->fetchObject()): ?>
                <option value="<?= $row->ID ?>"><?= $row->company_name ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit"/>
    </form>
<?php endif; ?>
</body>
</html>
