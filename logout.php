


<?php

ob_start();
session_start();
unset($_SESSION['fname']);

unset($_SESSION['adminid']);
unset($_SESSION['email']);
?>
<script>alert('Logout Succesfull..');</script>

<?php
echo '<script type="text/javascript">window.location="exercise.php"; </script>';


?>