angular.module('app', [])
  .controller('Main', function($scope) {
    var self = this;

    steemconnect.init({
      baseURL: 'https://steemconnect.com',
      app: 'fervi',
      callbackURL: 'http://www.steemdash.tk/'
    });

    $scope.comments = {};
    $scope.isAuth = false;
    $scope.loginURL = steemconnect.getLoginURL();


    steemconnect.isAuthenticated(function(err, result) {
      if (!err && result.isAuthenticated) {
        $scope.isAuth = true;
        $scope.username = result.username;
        $scope.$apply();
      }
    });

    this.isAuth = function() {
      return $scope.isAuth;
    };

    this.getLoginURL = function() {
      return steemconnect.getLoginURL();
    };

    $scope.unixtime = Math.round(+new Date()/1000);
    this.submit = function() {
      steemconnect.comment('', 'en-steemdash', $scope.username, $scope.unixtime, 'SteemDash Post', $scope.comment, '{"tags":["en-steemdash"],"app":"fervi/0.1","format":"markdown"}', function(err, result) {
        console.log(err, result);
        $scope.comment = '';
        $scope.$apply();
        steemconnect.vote($scope.username, $scope.username, $scope.unixtime, '10000');
      });
    };

  });