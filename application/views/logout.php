

<?php
	$this->session->session_destroy();
	$this->session->unset_userdata();
?>
<script>alert('Logout Succesfull..');</script>

<?php
	echo '<script type="text/javascript">window.location="exercise.php"; </script>';
?>