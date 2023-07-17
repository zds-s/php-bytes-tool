<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

$binstr = "    ";
$int = 123411;
$binstr = \DeathSatan\BytesTool\ByteBufUtil::buildIntLE($int);

for ($i=0;$i<strlen($binstr);$i++)
{
    echo bin2hex($binstr[$i]);
}
echo "\n";
var_dump(\DeathSatan\BytesTool\ByteBufUtil::getIntLE($binstr,0));