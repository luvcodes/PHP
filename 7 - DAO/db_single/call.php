<?php
require_once('database.php');

$query = "SELECT * FROM `products` ORDER BY `id` DESC";
$products = array(); // define products as an array()

$connect = new database($query);
$products = $connect->executeQuery();
if (count($products) > 0) : ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product->id; ?></td>
                    <td><?= $product->name; ?></td>
                    <td><?= $product->description; ?></td>
                    <td><?= $product->price; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else :
    "<h3>No records found</h3>"
?>
<?php endif; ?>

<?php
// $connect = new database("SELECT `id`, `description` FROM `products`");
// $secondresults = $connect->executeQuery();
?>
<!-- <br /><br /><br />
<table border="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($secondresults as $secondresult) : ?>
            <tr>
                <td>
                    <?= $secondresult->id; ?>
                </td>
                <td>
                    <?= $secondresult->description; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->