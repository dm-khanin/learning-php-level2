<?php

include '../config/main.php';
include '../services/Autoloader.php';
spl_autoload_register([new \app\services\Autoloader(),'loadClass']);
use \app\models as m;
$item = new m\Product('mycoolname', 25, 'aabbcc', 'litre');
$item->showInfo();
echo m\Product::getCount();

$user = new m\User('username', 'mail@example.com', 'qwerty', []);
$user1 = new m\User('username', 'mail@example.com', 'qwerty', []);
$user2 = new m\User('username', 'mail@example.com', 'qwerty', []);
echo m\User::getCount();

$item1 = new m\Product('mycoolname', 25, 'aabbcc', 'litre');
echo m\Product::getCount();

$user3 = new m\User('username', 'mail@example.com', 'qwerty', []);
echo m\User::getCount();