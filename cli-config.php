<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration([__DIR__."\src\Models\\"], true);

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'doctrine',
);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);