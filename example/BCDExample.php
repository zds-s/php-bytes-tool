<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
$val = 1946;
$encode = \DeathSatan\BytesTool\BCD::encode($val);
var_dump($encode);
$decode = \DeathSatan\BytesTool\BCD::decode($encode);
var_dump($decode);