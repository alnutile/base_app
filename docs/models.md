# Creating a Model

Once you generate the migration you can make a model using a singular noun for the class / file name.

Example the urls table is Url.php stored in app/BehatEditor/Models/Url.php

A few things to set

## Fillable array

This allows the fields to be guarded from Mass Assignment

~~
<?php


namespace BehatEditor\Models;

use BehatEditor\Helpers\UuidHelper;
use Rhumsaa\Uuid\Uuid;
use BehatEditor\Models\BaseModel;

class Url extends BaseModel {
    use UuidHelper;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'path',
        'active'
    ];



}
~~~

There is also a chance to turn off timestamps as seed above default is true.

See migrations.md for how to include timestamp created_at and updated_at fields

You will see

~~~
$table->timestamps();
~~~

As a field that will turn on those two timestamps

# Links

Since this ORM is a standalone ORM there are docs here

  * http://laravel.com/docs/eloquent
  * http://laravel.com/docs/queries
  * http://laravel.com/docs/schema
  * http://laravel.com/docs/migrations


# Many to Many Relationships

There are great docs linked above, you can see one example an the Migration project_url file

