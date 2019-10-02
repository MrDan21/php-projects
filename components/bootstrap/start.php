<?php

require(__DIR__.'/../vendor/autoload.php');

require('helpers.php');

class_alias('Component\AccessHandler', 'Access');

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();