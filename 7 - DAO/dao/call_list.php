<?php
require_once('product_dao.php');

$productDAO = new product_dao();

if (!$productDAO->get_error()) {
    $productDAO->list_all_products();
} else {
    die($productDAO->get_error());
}

if (count($productDAO->products) > 0): ?>
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
        <?php foreach ($productDAO->products as $product): ?>
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