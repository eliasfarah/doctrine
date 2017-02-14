<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

class OrdersController extends Controller
{   

    public function listAll() {
        $orders = $this->entityManager->getRepository(Order::class);
        $orders = $orders->findAll();

        foreach ($orders as $order) {
            echo $order->getDate()->format("d/m/Y H:i:s");
            var_dump($order->getCustomer()->getName());
        }
    }

    public function create() {
        $order = new Order();
        $order->setDate(new \DateTime());
        $customer = $this->entityManager->getRepository(Customer::class)->findOneBy(['name' => 'Elias Farah']);
        $order->addCustomer($customer);

        $productRepository = $this->entityManager->getRepository(Product::class);
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            $order->addProduct($product);
        }        

        $this->entityManager->persist($order);
        $this->entityManager->flush();
        
        echo "Created Product with ID " . $order->getId() . "\n";
    }

}