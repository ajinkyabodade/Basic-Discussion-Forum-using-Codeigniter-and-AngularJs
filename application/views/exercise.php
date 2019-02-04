 <?php  if (!isset($msg)){$msg = NULL;}
if($msg!=NULL){  echo "<script>alert('$msg');</script>"; }?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Basic Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .prettyline 
        {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

        }

        input.ng-touched
        {
            background-color:pink;
        }

        input.ng-valid
        {
        background-color:lightgreen;
        }

    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script  src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"> </script>
    <script  src="<?php echo base_url()?>application/js/controller/loginc.js?=<?=rand() ?>">  </script>
    <script  src="<?php echo base_url()?>application/js/service/logins.js">  </script>
    </head>

<body ng-app="myApp">
    <div class="container">
        <hr class="prettyline">
        <br>
        <center>
            <h1><b>Basic Discussion Forum In Codeigniter</b></h1>
            <h3>Hi!! Welcome to Basic Discussion Forum</h3>
            <br>
            <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</button>
        </center>
            <br>
            <hr class="prettyline">
    </div>

        <!-- Modal -->
        <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                        <h3>SignIn</h3>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" ng-controller="loginCtrl">
                               <form class="form-horizontal" name="myForm1">
                                  <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="userid">Username/Email:</label>
                                            <div class="controls">
                                                <input type="email" name="email" ng-model="email" class="form-control" required >
                                                <span ng-show="myForm1.email.$touched"><br>
                                                <span ng-show="myForm1.email.$error.required" style="color:red;">Please fill this field</span>
                                                <span ng-show="myForm1.email.$error.email" style="color:red;">Email is not valid</span>
                                                </span>

                                            </div>
                                     </div>
                                            <div class="control-group">
                                                <label class="control-label" for="passwordinput" >Password:</label>
                                                <div class="controls">
                                                  <input type="password" name="pass" ng-model="pass" class="form-control" required ><br>
                                                  <span ng-show="myForm1.pass.$touched">
                                                   <span ng-show="myForm1.pass.$error.required" style="color:red;">Please fill thid field</span>
                                                 </span>
                                                </div>
                                            </div>

                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="signin"></label>
                                            <div class="controls">
                                                <input class="btn btn-success" type="button" ng-click="login()" value="Login">
                                            </div>
                                        </div>
                                        <br> {{message}}<hr><hr>
                               </form>
                                    <h3>Not Registerd? Register Below</h3>
                                    <form class="form-horizontal" name="myForm2" ng-controller="registerCtrl" >
                                        <!-- Sign Up Form -->
                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="control-label" for="Email">Email:</label>
                                            <div class="controls">
                                                <input type="email" name="remail" ng-model="remail" class="form-control" required >
                                                <span ng-show="myForm2.remail.$touched"><br>
                                                <span ng-show="myForm2.remail.$error.required" style="color:red;">Please fill this field</span>
                                                <span ng-show="myForm2.remail.$error.email" style="color:red;">Email is not valid</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="control-group">
                                            <label class="contrsol-label" for="userid">Name:</label>
                                            <div class="controls">
                                                <input type="text" name="fname" ng-model="fname" class="form-control" required ><br>
                                                <span ng-show="myForm2.fname.$touched">
                                                <span ng-show="myForm2.fname.$error.required" style="color:red;">Please fill thid field</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Password input-->
                                        <div class="control-group">
                                            <label class="control-label" for="password">Password:</label>
                                            <div class="controls">
                                                <input type="password" name="rpass" ng-model="rpass" class="form-control" required ><br>
                                                <span ng-show="myForm2.rpass.$touched">
                                                <span ng-show="myForm2.rpass.$error.required" style="color:red;">Please fill this field</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="control-group">
                                            <label class="control-label" for="confirmsignup"></label>
                                            <div class="controls">
                                                <input class="btn btn-success" type="button" ng-click="register()" value="Signup">
                                            </div>
                                            <br>{{message}}
                                        </div>
                                    </fieldset>
                                        </form>
                                    </div>
                            
                              </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
     </fieldset>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>