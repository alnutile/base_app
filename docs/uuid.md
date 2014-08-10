## Uuid

This will allow use to set the id of a resource by an external id or a generate uuid.

Starting from the seed file

~~~
#app/database/migrations/UrsTable.php
<?php


use Illuminate\Database\Capsule\Manager as Capsule;
use Phpmig\Migration\Migration;

class UrlsTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('urls', function($table)
        {
            $table->string('id', 36)->primary();
            $table->string('name');
            $table->string('path');
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->dropIfExists('urls');
    }
}
~~~

From there the model would use the UuidHelper.php file for traits

~~~
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

This will then set the ID on new entries unless one is give.