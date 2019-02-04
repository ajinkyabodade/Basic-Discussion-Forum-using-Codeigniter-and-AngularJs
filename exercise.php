<!DOCTYPE html>
<?php

$error = '';
include('dbconnect.php');



if(isset($_POST['login']))
{

$email =  mysqli_real_escape_string($conn,trim($_POST['email']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);



if($email=='' || $password=='')
{
$error='All fields are required';
}



date_default_timezone_set('Asia/Calcutta');          


$sql = "select * from user where email='".$email."' and password = '".$password."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();
$_SESSION['uemail']=$res['email'];
$_SESSION['userid']=$res['id'];
$_SESSION['ufname']=$res['fname'];



echo '<script type="text/javascript">window.location="dashboard.php"; </script>';


}else
{
?>
<script>alert('Wrong Username/Password');</script>
<?php
}




}




if(isset($_POST['register']))
{

$email =  mysqli_real_escape_string($conn,trim($_POST['email']));
$fname =  mysqli_real_escape_string($conn,$_POST['fname']);
$password =  mysqli_real_escape_string($conn,$_POST['password']);

$sql = "select * from user where email='".$email."'";

$qq = $conn->query($sql);
if($qq->num_rows==0)
{
$smpt=$conn->prepare("insert into user (email,fname,password) value(?,?,?)");
$smpt->bind_param("sss", $email,$fname,$password );
$smpt->execute();



$sql = "select * from user where email='".$email."' and password = '".$password."'";
$qqq = $conn->query($sql);
if($qqq->num_rows==1)
{
$res = $qqq->fetch_assoc();
$_SESSION['uemail']=$res['email'];
$_SESSION['userid']=$res['id'];
$_SESSION['ufname']=$res['fname'];
?><script>alert('Registration Succesfull');</script><?php
echo '<script type="text/javascript">window.location="dashboard.php"; </script>';
}
}
else{
	        ?><script>alert('Email already Exists');</script><?php
			echo '<script type="text/javascript">window.location="exercise.php"; </script>';
	}

}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <title>Basic Forum</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .prettyline {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Button trigger modal -->

<div class="container"> 
    <hr class="prettyline">
    <br>
    <center>
    <h1><b>Basic Forum/Exercise 1</b></h1>
    <h3>Hi!! Welcome to baisc Forum/Exercise 1</h3>
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
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
              
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" method="POST" action="exercise.php">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Username/Email:</label>
              <div class="controls">
                <input required="" id="userid" name="email" type="text" class="form-control" placeholder="Enter Your Full Name" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="login" class="btn btn-success">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup" >
            <form class="form-horizontal" method="POST" action="exercise.php">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="email" class="form-control" type="text" placeholder="example@gmail.com" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Name:</label>
              <div class="controls">
                <input id="fname" name="fname" class="form-control" type="text" placeholder="Enter Your Full Name" class="input-large" required="">
              </div>
            </div>
            
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
                 
   
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="register" name="register"  class="btn btn-success">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
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
<script type="text/javascript">

</script>
</body>
</html>
