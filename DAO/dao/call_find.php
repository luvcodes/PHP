<?php
require_once('product_dao.php');

$productDAO = new product_dao();

if (!$productDAO->get_error()) {
    $productDAO->id = 50;
    $productDAO->find_product_by_id();
} else {
    die($productDAO->get_error());
}

var_dump($productDAO->name);
var_dump($productDAO->description);
var_dump($productDAO->price);
