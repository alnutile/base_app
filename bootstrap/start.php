<?php
require __DIR__.'/../bootstrap/autoload.php';

$core = new \App\Core();
$core->getApp();

if (file_exists(__DIR__ . '/../.env')) {
    \Dotenv::load(__DIR__.'/../');
}

$paths = include(__DIR__.'/paths.php');

$core->setUpPaths($paths);

$core->setEnv();

$core->setDatabaseConnection();

$core->getApp()->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' =>  $core->getStoragePath() . '/logs/core.log',
));

require_once(__DIR__.'/../custom_start.php');

return $core;