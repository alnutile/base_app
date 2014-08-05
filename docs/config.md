# Config

Create a .env file like above in the root of the app and and in there load your settings like

~~~
S3_USER=me
S3_TOKEN=foo
~~~~

Also add /custom_start.php to setup some custom calls

Here is an example

~~~
<?php
/**
 * set any custom settings or features
 */

/**
 * Example make a custom basic auth area
 * password = foo
 */
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
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
$app->get('/custom', function() use ($app){

    return $app->json('Hello Custom Area');
});
~~~