<!DOCTYPE html>
<?php

include('dbconnect.php');
include('uchecklogin.php');
if(isset($_POST['description']))
{

$subject =  mysqli_real_escape_string($conn,($_POST['subject']));
$desc =  mysqli_real_escape_string($conn,$_POST['desc']);
$fname =  mysqli_real_escape_string($conn,$_POST['fname']);
$idd =  mysqli_real_escape_string($conn,$_POST['id']);
$date =  mysqli_real_escape_string($conn,$_POST['date']);

$smpt=$conn->prepare("insert into list (subject,descn,fname,uid,date) value(?,?,?,?,?)");
$smpt->bind_param("sssis", $subject,$desc,$fname,$idd,$date);

$smpt->execute();
	
$smpt->close();
$conn->close();

echo '<script type="text/javascript">window.location="dashboard.php"; </script>';
?>
<script>alert('Contact site Admin');</script>

<?php
}

?>


<html lang="en">
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
</head>
<body>
<div class="container">
    <div class="row col-md-12  custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="logout.php" class="btn btn-primary btn-xl pull-right">Logout</a>
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Subject</th>
            <th>Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
	<?php
 $sql = "select * from list" ;

$q = $conn->query($sql);

for ($i=0; $i < $q->num_rows ; $i++) { 
    
$res = $q->fetch_assoc();

?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $res['fname']; ?></td>
                <td><?php echo $res['subject']; ?></td>
                <td><?php echo $res['date']; ?></td>
                <td class="text-center"><form class="form-horizontal" method="GET" action="list.php"><input type="hidden" name="lid" value="<?php echo "".$res['lid'];?>">
<input  class="btn btn-default btn-xs btn-filter" type="submit" value="View Details"></form>
</td>
            </tr>
           <?php
}
?>
    </table>
    </div>
	
	<h1>Submit an Entry</h1><br>	
	<form method="POST" action="dashboard.php">
                                <label for="email_address">Subject</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <label for="password">Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="desc" class="form-control" placeholder="Enter Description">
                                    </div>
                                </div>
								<?php 
  $uid=$_SESSION['userid'];
  $date=date("d/m/Y");
	$result = $conn->query("SELECT * FROM user where id='$uid'");
	$row = $result->fetch_assoc()
?>


                                <input type="hidden" name="id" class="form-control" value="<?php echo "".$_SESSION['userid'];?>" placeholder="Enter State">
                                <input type="hidden" name="fname" class="form-control" value="<?php echo "".$row['fname']; ?>" placeholder="Enter State">
                                <input type="hidden" name="date" class="form-control" value="<?php echo "".$date; ?>" placeholder="Enter State">
                                 <button  name="description" class="btn btn-primary btn-lg pull-right" type="submit">Submit Entry</button>
                            </form>
</div>

<script type="text/javascript">

</script>
</body>
</html>
