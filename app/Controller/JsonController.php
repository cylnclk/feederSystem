<?php


namespace Controller;
class JsonController
{
    public function getProductList($productFeeder)
    {
        require __DIR__ . '/../Component/ProductRepository.php';
        require __DIR__ . '/../Component/JsonResponse.php';

        $productRepository = new \Component\ProductRepository();
        $product = $productRepository->getProductList($productFeeder);
        $jsonResponse = new \Component\JsonResponse($product);
        $response = $jsonResponse->serialize();
        return $response;
    }
}
