<?php

$core->getApp()->get('/', function() use ($core) {
    return $core->getApp()->json('Hello Worlds');
});

return $core;