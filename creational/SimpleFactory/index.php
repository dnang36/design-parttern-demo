<?php

require 'vendor/autoload.php';
use ngdang\cretional\simpleFactory\doorFactory;

$door = doorFactory::makeDoor(100,200);

echo 'Width: '.$door->getWidth();
echo 'Heigth: '.$door->getHeight();

