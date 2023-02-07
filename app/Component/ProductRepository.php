<?php

namespace Component;

class ProductRepository
{
    private $connect;

    public function __construct()
    {
        $db = new \dbConnection();
        $this->connect = $db->dbConnect();
    }
    public function getProductList($productFeeder)
    {
        $sql = "select * from feedersystem.products order by id asc";
        $product = $this->connect->query($sql);

        $newProduct = array();
        $keys = array_keys($productFeeder);

        foreach ($product as $key => $val) {
            foreach ($keys as $vals) {
                $newProduct[$key][$productFeeder[$vals]] = $val[$vals];
            }
        }
        return $newProduct;
    }

}

?>