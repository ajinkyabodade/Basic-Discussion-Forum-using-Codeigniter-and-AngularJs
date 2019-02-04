var app = angular.module('myApp', []);


app.controller('loginCtrl',['$scope','loginService',function($scope,loginService)
{
            
    $scope.login = function()
    {
        var callback = function(response)
        {
            if(response.data.status == 0)
            {
                $scope.message = "Please Check Your Email/Password!";
            }
            else
            {
                $scope.message = "You loggedIn Successful!";
                var landingUrl = "http://localhost/acexercise/index.php/welcome/view2";
                window.location.href = landingUrl;
            }

        };
        loginService.logins($scope.email,$scope.pass,callback);

        
    }
}]);





app.controller('registerCtrl',['$scope','registerService',function($scope,registerService)
{
            
    $scope.register = function()
    {
        var callback = function(response)
        {
            if(response.data.status == 0)
                $scope.message = "Error..Contact Site Admin";
            else
                $scope.message = "Registration Succesfull";
               var landingUrl = "http://localhost/acexercise/index.php/welcome/view2";
               window.location.href = landingUrl;

        };
        registerService.registers($scope.remail,$scope.fname,$scope.rpass,callback);

        
    }
}]);

/*
app.config(function($routeProvider) {
    $routeProvider
    .when("/login", {
       
        controller:'myCtrl',
        templateUrl : "<h1>Hello this is login template  </h1>"
    })
    .when("/test", {
       
        controller:'myCtrl',
        template : "<h1>Hello this is login template  </h1>"
    })
    .otherwise({
        template : "<h1>Hello this is default template  </h1>"
    });
});
*/