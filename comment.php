


<?php

include('dbconnect.php');
include('uchecklogin.php');

$fromid =  $_POST['fromid'];
$toid =  $_POST['lid'];
$cmnt =  $_POST['comment'];
$fname =  $_POST['fname'];

$smpt=$conn->prepare("insert into comment (fromid,toid,comnt,fname) value(?,?,?,?)");
$smpt->bind_param("iiss", $fromid,$toid,$cmnt,$fname );

$smpt->execute();
	
$smpt->close();
$conn->close();

echo '<script type="text/javascript">window.location="list.php?lid='.$toid.'"; </script>';
?>


<?php

?>