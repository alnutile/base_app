<?php

$core = require_once __DIR__.'/../bootstrap/start.php';

$core = require_once __DIR__.'/../app/routes.php';

$core->getApp()->run();