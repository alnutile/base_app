<?php
/**
 * set any custom settings or features
 */
use App\Queue\Events\FilteredQueueEvent;
use App\Queue\Events\FilteredQueueEventError;
use App\Queue\Events\QueueEvents;
use App\Services\ResponseServices;

date_default_timezone_set('America/New_York');
$core->getApp()->register(
    new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $core->getAppPath() .'/views',
));

$core->getApp()['debug'] = true;
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
 * Example routes though you can put yours in app/routes
 */
$core->getApp()->get('/custom', function() use ($core){
    return $core->getApp()->json(ResponseServices::respond('Hello Custom Area', "We have a message"));
});


/**
 * Example model query
 */
$core->getApp()->get('/example_query', function() use ($core) {
    $all_users = \User::all()->toArray();
    return $core->getApp()->json(ResponseServices::respond($all_users, "We have all users"));
});

/**
 * Example turning on the queue system
 * Pulls in your settings from app/config/local/queue.php or what ever your local/environment is set to
 */




/**
 * In this example we push our Class
 * \Foo\ExampleQueueIlluminateHandler and a message
 * info the queue. Note that Class has the fire method
 */

require_once $core->getAppPath() . '/config/local/queue.php';

$core->setQueueLogging();

$core->getApp()->get('/add_job_illuminate', function() use ($core) {
    $uuid = date('U');
    try {
        $results = $core->getApp()['queue.illuminate']->push('\Foo\ExampleQueueIlluminateHandler', array('message' => "Some random info $uuid"));
        $results = "Added job $results";
        $status = 200;
        $core->getApp()['dispatcher']->dispatch(QueueEvents::QUEUE_JOB_ADDED_SUCCESS, new FilteredQueueEvent($core->getApp()['queue.illuminate'], $results, $core->getApp()));
    } catch(\Exception $e) {
        $status = 400;
        $results = $e->getMessage();
        $core->getApp()['dispatcher']->dispatch(QueueEvents::QUEUE_JOB_ADDED_ERROR, new FilteredQueueEventError($core->getApp()['queue.illuminate'], $results, $core->getApp()));
        $results = "Error adding job $results";
    }
    return $core->getApp()->json($results, $status);
});

/**
 * In this example we get the next job in the Queue
 * Considering it is the job and class
 * \Foo\ExampleQueueIlluminateHandler@fire
 * you can see things there and in the logs
 */
$core->getApp()->get('/get_job_illuminate', function() use ($core){
    try {
        $results = $core->getApp()['queue.illuminate.worker']->pop('default', $core->getApp()['queue.illuminate.queue_name'], 3, 64, 30, 0);
        return $core->getApp()->json("Job Cleared " . $results['job']->getJobId());
    } catch (\Exception $e) {
        $core->getApp()['dispatcher']->dispatch('illuminate.queue.failed', new FilteredQueueEventError($core->getApp()['queue.illuminate'], $e->getMessage(), $core->getApp()));
        return $core->getApp()->json("Error getting job ". $e->getMessage());
    }
});

/**
 * Example of Angular
 */
$core->getApp()->get('/admin', function() use ($core) {
    //Twig uses {{}} so we need to set angular to not use that if you are going
    //to use Twig
    return $core->getApp()['twig']->render('angular.twig', [], []);
});




return $core;