
<html ng-app="myApp">
<head>
    <meta charset="utf-8">
    
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .custab{
                    border: 1px solid #ccc;
                    padding: 5px;
                    margin: 10% 0;
                    box-shadow: 3px 3px 2px #ccc;
                    transition: 0.5s;
                }
        .custab:hover{
                    box-shadow: 3px 3px 0px transparent;
                    transition: 0.5s;
                     }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script  src="<?php echo base_url()?>application/js/angular-route.js">  </script>
    <script  src="<?php echo base_url()?>application/js/controller/listc.js?=<?=rand()?>"></script>
    <script  src="<?php echo base_url()?>application/js/service/lists.js">  </script>
</head>
<body>
    <div class="container" >
        <a href="<?php echo site_url('welcome/Logout');?>" class="btn btn-primary btn-xl pull-right">Logout</a>
        <ng-view></ng-view>
    </div>
</body>
</html>