# Setup

Set your environment with a config file in the base folder

To start create

~~~
.env_boot.php
~~~

And in there

~~~~
<?php return 'local';
~~~~

To set the environment settings. This will help in other areas.

Also .gitignore has a mix of ignored files that are for environment specific settings and to prevent overwrites during install.
Remove the files from there that you do want to keep in your workflow.

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

# Logging

app/storage/logs

See app/start.php on the setup
add more to custom_start.php etc

# Folders

# Seeding Database

Add your seed commands here
app/database/seeds/AppSeeder.php

and run php setup/seed.php

# Links

# Queue/Worker

# ORM

# Migrations

See the migrations.md file for more info.


# Seed

# Writing / Extending

# Logging

# Testing

# Server

# Logs


