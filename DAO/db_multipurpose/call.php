<?php
//let's initiate a database object and make it return values
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //let's test by inserting a record
    $insertion_query = "INSERT INTO `products` (`name`, `description`, `price`) VALUES (?, ?, ?)";

    //instantiate database object, and retrieve query
    $insertionDBO = new database();
    $insertionDBO->set_query($insertion_query);
    $insertionDBO->set_type('insert');
    $insertionDBO->set_values([
        'test product',
        'a bunch of descriptions',
        '12.34'
    ]);
    $insertionDBO->executeQuery();
}


$list_query = "SELECT * FROM `products` ORDER BY `id` DESC";

//instantiate database object, and retrieve query
$listDBO = new database();
$listDBO->set_query($list_query);
$listDBO->set_type('list');
$products = $listDBO->executeQuery();
?>
    <form method="post">
        <input type="submit" value="Add new record">
    </form>
<?php if (count($products) > 0): ?>
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
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product->id ?></td>
                <td><?= $product->name ?></td>
                <td><?= $product->description ?></td>
                <td><?= $product->price ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h3>No records found</h3>
<?php endif; ?>