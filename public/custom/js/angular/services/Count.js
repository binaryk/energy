app.factory('Count', function($http, $rootScope) {
      return {
        get : function(url) {
          return $http.get(url);
        },
      }

    });