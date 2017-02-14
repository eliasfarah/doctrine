<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Customer;

class CustomersController extends Controller
{
    
    public function listAll() {
        $customerRepository = $this->entityManager->getRepository(Customer::class);
        $customers = $customerRepository->findAll();

        foreach ($customers as $customer) {
            echo sprintf("-%s\n", $customer->getName());
        }
    }

    public function create() {
        $customer = new Customer();
        $customer->setName("Elias Farah");

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        echo "Created Product with ID " . $customer->getId() . "\n";        
    }

}