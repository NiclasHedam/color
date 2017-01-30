<?php

require_once __DIR__.'/../vendor/autoload.php';

use NiclasHedam\Color;

$white = Color::fromCMYK(0, 0, 0, 0);
$orange = Color::fromRGB(255, 165, 0);

var_dump($white->toHEX()); //#FFFFFF
var_dump($orange->differenceBetween($white)); //61.2255
var_dump($orange->name()); //Orange (Web)
var_dump($orange->toCMYK()); // array('c' => 0, 'm' => 35.2941, 'y' => 100, 'k' => 0)
