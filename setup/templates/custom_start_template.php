<?php
/**
 * set any custom settings or features
 */
date_default_timezone_set('America/New_York');

/**
 * Example make a custom basic auth area
 * password = foo
 */
$core->getApp()->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => [
        'custom' => array(
            'pattern' => '^/custom',
            'http' => true,
            'users' => array(
                'admin' => array('ROLE_ADMIN', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg=='),
            ),
        ),
    ]
));

/**
 * Set some path to test this out
 */
$core->getApp()->get('/custom', function() use ($core){

    return $core->getApp()->json('Hello Custom Area');
});

$core->getApp()->get('/example_query', function() use ($core) {
    $all_users = \User::all()->toArray();
    return $core->getApp()->json(['data' => $all_users]);
});

return $core;