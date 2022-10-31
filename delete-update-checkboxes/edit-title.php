<html lang="en_AU">
<head>
    <title>Edit a title</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
if (empty($_GET['isbn'])) { ?>
    <p>Please <a href="?isbn=5501958890">request with an ISBN</a>!</p>
<?php } else {
    include("connection.php");
    /** @var PDO $dbh */
    //Now we'll process the POST request
    if (!empty($_POST['publisher']) && !empty($_POST['title']) && !empty($_POST['price'])) {
        $stmt = $dbh->prepare("UPDATE `titles` SET `publisher_id`=:publisher,`title`=:title,`price`=:price WHERE `ISBN` = :isbn");
        if ($stmt->execute([
            'publisher' => $_POST['publisher'],
            'title' => $_POST['title'],
            'price' => $_POST['price'],
            'isbn' => $_GET['isbn']
        ])) {
            echo "<h1>Successful!</h1>";
        } else {
            echo "<h1>Error!</h1>";
        }
    } else {
        $title_stmt = $dbh->prepare("SELECT * FROM `titles` WHERE `ISBN` = ?");
        if ($title_stmt->execute([$_GET['isbn']]) && $title_stmt->rowCount() > 0) {
            $title = $title_stmt->fetchObject(); ?>
            <h3>Edit a title</h3>
            <form method="post">
                <div>
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" disabled value="<?= $title->ISBN ?>"/>
                </div>
                <div>
                    <?php $publishers_stmt = $dbh->prepare("SELECT * FROM `publishers` ORDER BY `company_name`");
                    if ($publishers_stmt->execute() && $publishers_stmt->rowCount() > 0) { ?>
                        <label for="publisher">Publisher</label>
                        <select name="publisher" id="publisher">
                            <?php while ($row = $publishers_stmt->fetchObject()): ?>
                                <option value="<?= $row->ID ?>" <?= ($title->publisher_id == $row->ID) ? "selected" : "" ?>><?= $row->company_name ?></option>
                            <?php endwhile; ?>
                        </select>
                    <?php } ?>
                </div>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?= $title->title ?>"/>
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" min="0" step="any" id="price" name="price" value="<?= $title->price ?>"/>
                </div>
                <div>
                    <input type="submit" value="Update"/>
                </div>
            </form>
        <?php }
    }
} ?>
</body>
</html>
