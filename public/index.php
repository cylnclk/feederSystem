<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod !== 'GET') {
    http_response_code(404);
} else {
    include_once __DIR__ . "/../app/dbConnection.php";

    $productFeeder = [
        "google" => ["id" => "productID", "name" => "productName", "price" => "productPrice", "category" => "productCategory"],
        "cimri" => ["name" => "productName", "id" => "productID", "price" => "productPrice", "category" => "productCategory"],
        "facebook" =>["id" => "productID", "name" => "productName", "price" => "productPrice", "category" => "productCategory"],
        "trendyol" =>["id" => "productID", "name" => "productName", "price" => "productPrice", "category" => "productCategory"],
        "migros" =>["id" => "productID", "name" => "productName", "price" => "productPrice", "category" => "productCategory"]
        ];
    include_once __DIR__ . "/../app/routes.php";
}
