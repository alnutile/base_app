<?php

use App\Queue\QueueWorker;


/**
 * Get settings from the .env files
 */

$host = $_ENV['BEAN_HOST'];
$queueName = $_ENV['BEAN_QUEUE'];


/**
 * Register Events just to show how this works and to see it in the get request results
 */

$core->getApp()['dispatcher']->addListener('queue.job.removed.success', function($event, $event_name, $eventDispatcher) use ($core) {
    //Get Event?
    $event->getApp()['monolog']->addInfo(sprintf("Event: Queue Job Removed Success %s", $event_name));
});

$core->getApp()['dispatcher']->addListener('queue.job.added.error', function($event) use ($core) {
    $event->getApp()['monolog']->addInfo("Logging from queue.job.added.error message" . $event->getMessage());
});


$core->getApp()['dispatcher']->addListener('queue.job.added.success', function($event) use ($core) {
    $event->getApp()['monolog']->addInfo("Logging from queue.job.added.success vai passed Dispatcher " . $event->getJob());
});

$core->getApp()['dispatcher']->addListener('illuminate.queue.failed', function($event, $event_name, $eventDispatcher) use ($core) {
    //Get Event?
    $message = $event->getMessage();
    $core->getApp()['monolog']->addInfo(sprintf("Queue Job Failed $message"));
});

/**
 * Setup the Illuminate Queue others can be used of course
 * once we setup a standard interface for the agreed methods
 */
$core->getApp()['container.illuminate'] = new \Illuminate\Container\Container();
//@TODO is this one needed now that I pass it to the worker?
$core->getApp()['container.illuminate']->singleton('dispatcher', $core->getApp()['dispatcher'], true);
$core->getApp()['queue.illuminate'] = function() use ($core, $host, $queueName) {
    $queue = new \Illuminate\Queue\Capsule\Manager($core->getApp()['container.illuminate']);
    $queue->addConnection([
        'driver' => 'beanstalkd',
        'host'   => $host,
        'queue'  => $queueName
    ], 'default');
    $queue->getContainer()->bind('encrypter', function(){
       return new Illuminate\Encryption\Encrypter('foobar');
    });
    $queue->setAsGlobal();
    return $queue;
};
$core->getApp()['queue.illuminate.queue_name'] = $_ENV['BEAN_QUEUE'];
$core->getApp()['queue.illuminate.worker'] = new QueueWorker($core->getApp()['queue.illuminate']->getQueueManager(), null, $core->getApp()['dispatcher']);

return $core;