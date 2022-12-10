<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
$str = "example hex data";
$decode = \DeathSatan\BytesTool\BIN::decode($str);
var_dump($decode);

var_dump(\DeathSatan\BytesTool\BIN::encode($decode));