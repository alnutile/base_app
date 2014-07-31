# Goal

This is a thin wrapper around Silex to help Teams of developers organize their code. This
way each project in Silex follow the same layout and in many ways the same design patterns.

  * Centralized Documentation of common work flows eg
    * Using Amazon Queue
    * Using S3
    * Using Client x for internal APIs
    * Running a queue daemon/watcher
    * Migrations
    * REST Requests and Responses.
    * Example use of Bower and Gulp for setting up Angular
    * Example Angular setup and Directives for sharable widgets
  * Shared RespondWith class so on success or error the REST api is that same format making
  front end work easier to share.
  * Consistent folder layout so we know where our models, controllers etc are
  * Centralized route file
  * Worker daemon for Queue jobs
  * Unified interface to queues using Amazon, Beanstalkd, or Iron including
    * Max Attempts
    * Try Later
    * Batch send and receive interface
    * Failed Table
    * Event System for triggering events upon fail
  * Unified format for saved events eg ['class' => 'Foo', 'message' => 'bar'] so we can share Queue related code
  easily.
  * Shared updates as the Core of this is updated
  * Shared setup so that we have a unified working setup for Vagrant and PHP local server.
  * Migration workflow that is quick and easy no matter what ORM we use.


# Docs and Getting Started

See Docs folder starting with index.md

Silex has a great documentation area http://silex.sensiolabs.org/documentation we will follow most of all these patterns.

  * Middlewares
  * Services
  * Providers
  * Validator
  * Events
