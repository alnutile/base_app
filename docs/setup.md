# Setting up your local or dev


git clone of course

once that is done run composer install

come back from lunch and setup the environment. Here is an example of local

These may automatically be setup for you but it will help you see the workflow.
The word local if for my brain it could be development, macbook, linux what ever.

This file sets that environment

~~~
#.env_boot.php
<?php return 'local';
~~~

Then get your folder ready for that environment. Files in here set/extend your settings
~~~
mkdir app/config/local
cp app/config/database.php app/config/local
cp app/config/queue.php app/config/local
~~~

Then in the root of your app you will/should have a .env to define your

~~~
 BEAN_HOST=localhost
 BEAN_QUEUE=default
 DB_NAME=somename
 DB_PASSWORD=secret
 DB_USER=homestead
 DB_URL=localhost
 DB_DRIVER=mysql
~~~

Run the migrations after you make the db

~~~
bin/phpmig migrate
php setup/seed.php
~~~


then run bower install to get your assets in place and you are ready to go


