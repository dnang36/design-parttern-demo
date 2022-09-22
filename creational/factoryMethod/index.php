<?php

require 'vendor/autoload.php';
use ngdang\cretional\factoryMethod\socialNetwork;
use ngdang\cretional\factoryMethod\facebook;
use ngdang\cretional\factoryMethod\google;

$type = 'facebook';
$social = socialNetwork::driver($type);
$social->login();
