/*jslint white:true */
/*global angular */

var app = angular.module('myApp', []);

app.controller("myCtrl", function($scope){
    'use strict';
    
    

    //Edit Button
    $scope.editFunc = function(){
        alert("HELLO WORLD");
    };
});