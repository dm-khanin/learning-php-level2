<?php

include '../config/main.php';
include '../services/Autoloader.php';
spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$db = app\services\Db::getInstance();
$db->getConnection();

var_dump($db);
echo '<br/>';
var_dump(app\models\Product::getMaxPrice());