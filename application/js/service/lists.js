
var app = angular.module('myApp');

app.factory('listviewService',['$http',function($http)
{
	var factory = {};

	factory.getlist = function(callback)
	{
		$http({
			method:'post',
			url:'http://localhost/acexercise/index.php/welcome/lfetch'
		})
		.then(function(response)
		{
			//console.log('service.....',response);
			if(response.data)
			{
				callback(response.data);
			}
			else
			{
				callback([]);
			}

		});	
	}


factory.addtopics = function(subject,desc,callback)
	{
		$http({
			method:'post',
		    url:'http://localhost/acexercise/index.php/welcome/addlist',
			data: {'subject':subject,
				   'desc':desc}
		})
		.then(function(response)
		{
			if(response)
			{
				//console.log(response);
				callback(response);
			}
			else
			{
				callback([]);
			}
		});
	}



	factory.editlists = function(ulid,usubject,udescn,callback)
	{
			console.log('editlist service',ulid,usubject,udescn);
		$http({
			method:'post',
		    url:'http://localhost/acexercise/index.php/welcome/listupdate',
			data: {'lid':ulid,
				    'subject':usubject,
				   'descn':udescn}
		})
		.then(function(response)
		{
			if(response)
			{
				//console.log(response);
				callback(response);
			}
			else
			{
				callback([]);
			}
		});
	}











	return factory;
	}]);




app.factory('listviewdetailService',['$http',function($http)
{
	var factory = {};
	factory.listviewdetails = function(lid,callback)
	{
		$http({
			method:'post',
			url:'http://localhost/acexercise/index.php/welcome/listview',
			data: {'lid':lid}
		})
		.then(function(response)
		{
			//console.log('service.....',response);
			if(response)
			{
				callback(response);
			}
			else
			{
				callback([]);
			}

		});	
	}


	factory.addcomments = function(listid,comment,callback)
	{
			console.log('service',listid,comment);
		$http({
			method:'post',
		    url:'http://localhost/acexercise/index.php/welcome/commentadd',
			data: {'lid':listid,
				   'comment':comment}
		})
		.then(function(response)
		{
			if(response)
			{
				//console.log(response);
				callback(response);
			}
			else
			{
				callback([]);
			}
		});
	}
		return factory;
	}]);
