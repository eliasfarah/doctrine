<?php

namespace App\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Db
{

    private $isDevMode;
    private $config;
    private $conn;
    
    public function __construct() {                
        $this->isDevMode = true;
        $this->config = Setup::createAnnotationMetadataConfiguration(array(dirname(__DIR__)."\Models\\"), $this->isDevMode);

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'doctrine',
        );

        // obtaining the entity manager
        $this->conn = EntityManager::create($dbParams, $this->config);
    }

    public function getConn() {
        return $this->conn;
    }

}