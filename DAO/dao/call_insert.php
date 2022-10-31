<?php
require_once('product_dao.php');

$productDAO = new product_dao();

if (!$productDAO->get_error()) {
    $productDAO->name = "Test product dao";
    $productDAO->description = "Test desc dao";
    $productDAO->price = 23.45;
    $result = $productDAO->insert_product();
}

var_dump($result);
var_dump($productDAO->get_error());
