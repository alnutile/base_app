<?php

$app->get('/', function() use ($app) {
    return $app->json('Hello Worlds');
});

return $app;