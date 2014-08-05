'use strict';

/* Controllers */
var demo_ctrl = angular.module('demoCtrl', []);

demo_ctrl.controller('DemoCtrl', [
    '$scope', '$http', '$location', '$route',
    '$routeParams',
    function($scope, $http, $location, $route, $routeParams) {

        //Helpers/Services
        $scope.here = 'Yup'

    }]);