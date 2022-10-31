<?php
require_once ("database.php");
$query = "select * from `products` order by `id` desc";
$products = array();
$connect = new database($query);
$products = $connect->executeQuery();
?>
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
