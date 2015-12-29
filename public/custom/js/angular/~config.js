var app = angular.module('app', [])
.run(function($rootScope){
  $rootScope.config = _config;
})
