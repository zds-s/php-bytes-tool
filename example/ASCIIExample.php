<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

$str = "123123123";
// 貌似没用，暂时隔放
$encode = \DeathSatan\BytesTool\ASCII::encode($str);
var_dump($encode);