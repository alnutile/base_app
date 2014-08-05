'use strict'

var app = angular.module('sst', [
    'ngRoute',
    'demoCtrl',
    'ngSanitize'
]);

app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl:  'assets/js/templates/sst.html',
                controller:  'DemoCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
}]);