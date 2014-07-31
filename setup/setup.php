<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Filesystem\Filesystem;

$filesystem = new Filesystem();

$base = __DIR__ .'/../';

if(!$filesystem->exists($base . '/app/models/BaseModel.php')) {
    $filesystem->copy(__DIR__ . '/templates/BaseModel.php', $base . '/app/models/BaseModel.php');
}

if(!$filesystem->exists($base . '.env')) {
    $filesystem->copy(__DIR__ . '/templates/env_example', $base . '.env');
}

if(!$filesystem->exists($base . '/app/config/local/queue.php')) {
    $filesystem->copy(__DIR__ . '/templates/queue_template.php', $base . '/app/config/local/queue.php');
}

if(!$filesystem->exists($base . '/custom_start.php')) {
    $filesystem->copy(__DIR__ . '/templates/custom_start_template.php', $base . '/custom_start.php');
}

if(!$filesystem->exists($base . '/env_boot.php')) {
    $filesystem->copy(__DIR__ . '/templates/env_boot.php', $base . '/env_boot.php');
}

if(!$filesystem->exists($base . '/app/routes.php')) {
    $filesystem->copy(__DIR__ . '/templates/routes.php', $base . '/app/routes.php');
}

if(!$filesystem->exists($base . '/app/storage/logs/core.log')) {
    $filesystem->dumpFile($base . '/app/storage/logs/core.log', '');
}

if(!$filesystem->exists($base . '/phpmig.php')) {
    $filesystem->copy(__DIR__ . '/templates/phpmig_using_elloquent.php', $base . '/phpmig.php');
}

/** for default migrations */
if(!$filesystem->exists($base . '/app/storage/local.sqlite')) {
    $filesystem->dumpFile($base . '/app/storage/local.sqlite', '');
}

/** user table starter */
if(!$filesystem->exists($base . '/app/database/migrations/2014010114914_UsersTable.php')) {
    $filesystem->copy(__DIR__ . '/templates/2014010114914_UsersTable.php', $base . '/app/database/migrations/2014010114914_UsersTable.php');
}

/** seed table starter */
if(!$filesystem->exists($base . '/app/database/seeds/AppSeeder.php')) {
    $filesystem->copy(__DIR__ . '/templates/AppSeeder.php', $base . '/app/database/seeds/AppSeeder.php');
}

if(!$filesystem->exists($base . '/app/models/User.php')) {
    $filesystem->copy(__DIR__ . '/templates/User.php', $base . '/app/models/User.php');
}
