<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{   

    public function listAll() {
        $productRepository = $this->entityManager->getRepository(Product::class);
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            echo sprintf("-%s\n", $product->getName());
        }
    }

    public function create() {
        $product = new Product();
        $product->setName("iPhone 7");

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        echo "Created Product with ID " . $product->getId() . "\n";        
    }

}