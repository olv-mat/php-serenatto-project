<?php

class ProductRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    private function hydrateProducts(PDOStatement $stmt): array
    {
        $products = $stmt->fetchAll();
        $productsArray = array_map(function ($product){
            return new Product(
                $product["id"], 
                $product["type"], 
                $product["name"], 
                $product["description"], 
                $product["image"],
                $product["price"]
            );
        }, $products);
        return $productsArray;
    }

    public function getProducts(): array
    {
        $query = "SELECT * FROM products ORDER BY price ASC";
        $stmt = $this->conn->query($query);
        $products = $this->hydrateProducts($stmt);
        return $products;
    }
}
