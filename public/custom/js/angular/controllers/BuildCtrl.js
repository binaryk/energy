app.controller('buildCtrl', function($scope, $http, $timeout, $compile, Count){
      console.log('buildCtrl');
$scope.xxx = "TESTT";
$timeout(function(){
      $compile($('body').contents())($scope);
    },
    1000);

      $scope.counters = function(url){
        $('#box-cladiri').width('50%').addClass('pull-left');
        $('#box-contoare').closest('div.row').remove();
        Count.get(url)
            .success(function(data) {
             console.log(data);
              $('#box-cladiri').append(data);
            });
      }
});
