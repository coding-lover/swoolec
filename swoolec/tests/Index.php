<?php

//composer dump-autoload
require __DIR__ . '/../../vendor/autoload.php';

$args = $argv;
array_shift($args);

$ret = \Swoolec\Swoolec\Command\CommandDispatch::instance()->run($args);
echo $ret . "\n";
