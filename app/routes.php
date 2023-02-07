<?php

use Controller\JsonController;
use Controller\XmlController;

$product_list = [];
$parseUrl = parseUrl();
$company = $parseUrl['company'];
$output_type = $parseUrl['outputType'];


if ($output_type == 'json'){
    require __DIR__ . '/Controller/JsonController.php';
    $json_controller = new JsonController();
    $product_list = $json_controller->getProductList($productFeeder[$company]);
}
elseif ($output_type == 'xml'){
    require __DIR__ . '/Controller/XmlController.php';
    $xml_controller = new XmlController();
    $product_list = $xml_controller->getProductList($productFeeder[$company]);
}
else
    echo "Undefined output type! Please request json or xml.";
function parseUrl(){
    $request = $_SERVER['REQUEST_URI'];
    $uri = str_replace('/FeederSystem','',$request);
    $uri_parse = explode('/',$uri);
    $company = $uri_parse[1];
    $output_type = $uri_parse[2];
    $response = array('company'=>$company,'outputType'=>$output_type);
    return $response;
}
print_r($product_list); exit;

?>