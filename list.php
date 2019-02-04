<?php
include('dbconnect.php');
include('uchecklogin.php');
if(isset($_GET['lid']))
{
$_SESSION['lid'] = $_GET['lid'];
}
$fromid= $_SESSION['userid']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Post</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
.panel-white {
  border: 1px solid #dddddd;
}
.panel-white  .panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #ddd;
}
.panel-white  .panel-footer {
  background-color: #fff;
  border-color: #ddd;
}

.post .post-heading {
  height: 95px;
  padding: 20px 15px;
}
.post .post-heading .avatar {
  width: 60px;
  height: 60px;
  display: block;
  margin-right: 15px;
}
.post .post-heading .meta .title {
  margin-bottom: 0;
}
.post .post-heading .meta .title a {
  color: black;
}
.post .post-heading .meta .title a:hover {
  color: #aaaaaa;
}
.post .post-heading .meta .time {
  margin-top: 8px;
  color: #999;
}
.post .post-image .image {
  width: 100%;
  height: auto;
}
.post .post-description {
  padding: 15px;
}
.post .post-description p {
  font-size: 14px;
}
.post .post-description .stats {
  margin-top: 20px;
}
.post .post-description .stats .stat-item {
  display: inline-block;
  margin-right: 15px;
}
.post .post-description .stats .stat-item .icon {
  margin-right: 8px;
}
.post .post-footer {
  border-top: 1px solid #ddd;
  padding: 15px;
}
.post .post-footer .input-group-addon a {
  color: #454545;
}
.post .post-footer .comments-list {
  padding: 0;
  margin-top: 20px;
  list-style-type: none;
}
.post .post-footer .comments-list .comment {
  display: block;
  width: 100%;
  margin: 20px 0;
}
.post .post-footer .comments-list .comment .avatar {
  width: 35px;
  height: 35px;
}
.post .post-footer .comments-list .comment .comment-heading {
  display: block;
  width: 100%;
}
.post .post-footer .comments-list .comment .comment-heading .user {
  font-size: 14px;
  font-weight: bold;
  display: inline;
  margin-top: 0;
  margin-right: 10px;
}
.post .post-footer .comments-list .comment .comment-heading .time {
  font-size: 12px;
  color: #aaa;
  margin-top: 0;
  display: inline;
}
.post .post-footer .comments-list .comment .comment-body {
  margin-left: 50px;
}
.post .post-footer .comments-list .comment > .comments-list {
  margin-left: 50px;
}
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container" style="padding-top:50px;">
    <div class="col-sm-12">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                </div>
					<?php 
  $fromid=$_SESSION['userid'];
  $toid=$_SESSION['lid'];
	$result = $conn->query("SELECT * FROM list where lid='$toid'");
	$row = $result->fetch_assoc()
?>
                <div class="pull-left meta">
                    <div class="title h2">
                        <a href="#"><b><?php echo "".$row['fname']; ?></b></a>
                        
                   <h6 class="text-muted time">made a post on <?php echo "".$row['date']; ?></h6>
					<?php 

	$result = $conn->query("SELECT * FROM list where lid='$toid'");
	$row = $result->fetch_assoc()
?>
					
                    <h6 class="title h4"><b>Subject: </b><?php echo "".$row['subject']; ?></h6>
                    <h6 class="title h4"><b>Description: </b><?php echo "".$row['descn']; ?></h6>
					
					
                    
                </div>
                </div>
            </div> 
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="post-footer">
                <div class="input-group"> <span class="input-group-addon">
				
				<div class="controls">
				<form class="form-horizontal" method="POST" action="comment.php">
                    <input class="form-control" placeholder="Add a comment" name="comment" type="text">
					</div>
				   <input type="hidden" name="lid" value="<?php echo "".$_SESSION['lid'];?>">
				  <?php $fnamee=$_SESSION['ufname'];?>
				   <input type="hidden" name="fname" value="<?php echo "".$fnamee;?>">
					    <input type="hidden" name="fromid" value="<?php echo "".$fromid;?>">
<input  class="btn btn-success" type="submit" value="Add Comment"></form> 
                    </span>
                </div>
				
				
				
				
                <ul class="comments-list">
                    <li class="comment">
                        
                        <ul class="comments-list">

								<?php
 $sql = "select * from comment where toid='$toid' " ;

$q = $conn->query($sql);

for ($i=0; $i < $q->num_rows ; $i++) { 
    
$res = $q->fetch_assoc();

?>
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                                </a>                               
							   <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user"><?php echo $res['fname']; ?></h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p><?php echo $res['comnt']; ?></p>
                                </div>
								
<?php } ?>
                            </li> 
							
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
