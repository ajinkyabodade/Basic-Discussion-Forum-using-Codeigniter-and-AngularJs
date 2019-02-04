var app = angular.module('myApp');

app.factory('loginService',['$http',function($http)
	{
		var factory = {};
		factory.logins = function(email,pass,callback)
		{

			$http({
			method:'post',
			url:'http://localhost/acexercise/index.php/welcome/signin',
			data: {'email':email,'pass':pass}
			})
			.then(function(response)
			{
				//console.log(response);

				if(response)
					callback(response);
				else
					callback([]);
			});
		}

			return factory;
		
	}]);




	app.factory('registerService',['$http',function($http)
	{
		var factory = {};
		factory.registers = function(remail,rpass,fname,callback)
		{

			$http({
			method:'post',
			url:'http://localhost/acexercise/index.php/welcome/register',
			data: {'email':remail,'pass':rpass, 'fname':fname}
			})

			.then(function(response)
				{
					console.log(response);

					if(response)
						callback(response);
					else
						callback([]);
				});
		}
		return factory;
		
	}]);
	