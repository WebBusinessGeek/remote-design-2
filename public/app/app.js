var app = angular.module('app', []);

app.controller('someController', function($scope){
    $scope.kevname = 'kevin';

});

app.controller('RemoteController', RemoteClass);

app.directive('someDirection', SomeDirection);

