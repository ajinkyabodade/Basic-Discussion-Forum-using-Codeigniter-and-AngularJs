var app = angular.module('myApp', ["ngRoute"]);

app.config(function($routeProvider) {
	    $routeProvider
    
	    .when("/viewlistdetail/:lid", {
	        controller: 'cid',
	        templateUrl : "http://localhost/acexercise/application/views/list.php"
            })

	  
	    .otherwise({
	    	controller: 'listviewCtrl',
	        templateUrl : "http://localhost/acexercise/application/views/listview.php"
		    });
});


app.controller('listviewCtrl',['$scope','listviewService',function($scope,listviewService)
{
		
	   
    var callback2 = function(response)
        {
	            console.log('listview .....',response);
	            $scope.listview = response.list;
	            $scope.uuid = response.uuid;

        };
      listviewService.getlist(callback2);      


	$scope.addtopic = function()
		{
			var callback = function(response)
			{
				
 				if(response.data.status == 100)

				{
					var landingUrl = "http://localhost/acexercise/index.php/welcome/logout";
					$window.location.href = landingUrl;
				}


				if(response.data.status == 1)

				{
					$scope.message = "Topic added Succesfully.";
					listviewService.getlist(callback2);
				}
				else
				{
					//console.log(response.status);
					$scope.message = "Error..Contact Site Admin.";
					listviewService.getlist(callback2);
				}

			};

			listviewService.addtopics($scope.subject,$scope.desc,callback);

			
		}





	$scope.editlistc = function(ulid,usubject,udescn)
		{

			var callback4 = function(response)
			{
				if(response.data.status == 100)

				{
					var landingUrl = "http://localhost/acexercise/index.php/welcome/logout";
					window.location.href = landingUrl;
				}

				if(response.data.status == 1)
				{
					$scope.umessage = "Update Succesfully.";
					listviewService.getlist(callback2);
				}
				else
				{
					//console.log(response.status);
					$scope.umessage = "Error..Contact Site Admin.";
					listviewService.getlist(callback2);
				}

			};
			console.log('controller',ulid,usubject,udescn);
			listviewService.editlists(ulid,usubject,udescn,callback4);
				
		}



}]);




app.controller('cid',['$scope','$routeParams', 'listviewdetailService',function($scope,$routeParams,listviewdetailService) {
		$scope.lid = $routeParams.lid;
		
		
	var callback = function(response)
        {
            //console.log('callback .....',response);
            $scope.list = response.data.list;
            $scope.comments = response.data.comment;
            //console.log($scope.comment,$scope.list);
           
                   };

      listviewdetailService.listviewdetails($scope.lid,callback);  


      $scope.addcommentc = function()
		{
			var callback2 = function(response)
			{
				if(response.data.status == 100)

				{
					var landingUrl = "http://localhost/acexercise/index.php/welcome/logout";
					window.location.href = landingUrl;
				}

				if(response.data.status == 1)
				{
					$scope.cmessage = "Comment added Succesfully.";
					listviewdetailService.listviewdetails($scope.lid,callback); 
				}
				else
				{
					//console.log(response.status);
					$scope.message = "Error..Contact Site Admin.";
					//listviewService.getlist(callback2);
				}

			};
			console.log('controller',$scope.lid,$scope.addcomnt);
			listviewdetailService.addcomments($scope.lid,$scope.addcomnt,callback2);

		}

}]);







