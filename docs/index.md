# Setup

Set your environment with a config file in the base folder

To start the composer install will setup most of your starter scripts

~~~
composer install
~~~

look in setup/templates to see what is made to begin with.

Also .gitignore has a mix of ignored files that are for environment specific settings and to prevent overwrites during install.
Remove the files from there that you do want to keep in your workflow. [better setup coming soon]

Lastly setup migration examples and bower

~~~
bin/phpmig migrate
php setup/seed.php
bower install
~~~

# Server/Vagrant
‰
See server.md

# Config

See config.md

# Models

See models.md

# UUid

See uuid.md

# Logging

app/storage/logs

See app/start.php on the setup
add more to custom_start.php etc

# Bower and Angular

See frontend.md

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


