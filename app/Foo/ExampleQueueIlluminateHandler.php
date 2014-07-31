<?php
/**
 * Created by PhpStorm.
 * User: alfrednutile
 * Date: 7/28/14
 * Time: 3:20 PM
 */

namespace Foo;


class ExampleQueueIlluminateHandler {


    public function fire($job, $message)
    {
        //1. all goes well remove jobs
        //2. all goes bad put it back in the queue for another try
        //3. it max tries is met add it to failed queue
        //throw new \Exception("Failed");

        $job->delete();
    }

} 