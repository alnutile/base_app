<?php


use Illuminate\Database\Capsule\Manager as Capsule;
use \User;


class AppSeeder {

    /**
     * @var \App\Core
     */
    protected $core;
    protected $capsule;

    public function __construct($core)
    {
        $this->core = $core;
    }

    public function run()
    {

        /** example user table */
        //1. Clean it out do not remove it though migrations do that
        $this->core->getDatabaseConnection()->getConnection()->table('users')->truncate();
        $user = [
            'email' => 'admin@foo.com',
            'password' => 'foo'
        ];

        //2. Populate it
        \User::create($user);

        $user = [
            'email' => 'non_admin@foo.com',
            'password' => 'foo'
        ];

        \User::create($user);

    }
}