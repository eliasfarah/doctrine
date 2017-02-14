<?php

namespace App\Controllers;
class Controller {
    
    /** @Inject EntityManager **/
    protected $entityManager;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
}