<?php
// bootstrap.php
require_once __DIR__ ."./../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine',
	'enum'     => 'string',
);

return $entityManager = EntityManager::create(
		$dbParams, 
		Setup::createAnnotationMetadataConfiguration(
		[__DIR__. "./../src/Entity"], false, null, null, false)
		);
