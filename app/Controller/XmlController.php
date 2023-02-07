<?php

namespace Controller;
class XmlController
{
    public function getProductList($productFeeder)
    {
        require __DIR__ . '/../Component/ProductRepository.php';
        require __DIR__ . '/../Component/XmlResponse.php';

        $productRepository = new \Component\ProductRepository();
        $product = $productRepository->getProductList($productFeeder);
        $jsonResponse = new \Component\XmlResponse($product);
        $response = $jsonResponse->serialize();
        return $response;
    }
}
