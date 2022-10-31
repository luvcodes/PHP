<?php
require_once ("database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertion_query = "INSERT INTO `products` (`names`, `description`, `price`) values (?, ?, ?)";
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
$list_query = "select * from `products` order by `id` asc";
$listDBO = new database();
$listDBO->set_query($list_query);
$listDBO->set_type('list');
$products = $listDBO->executeQuery();
?>

<form method="post">
    <input type="submit" value="add new record">
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
        <td><?= $product->id; ?></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->description; ?></td>
        <td><?= $product->price; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h4>No records found</h4>
<?php endif; ?>
