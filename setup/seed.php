<?php

$core = include __DIR__ . '/../bootstrap/start.php';

$seeder = new \AppSeeder($core);

$seeder->run();