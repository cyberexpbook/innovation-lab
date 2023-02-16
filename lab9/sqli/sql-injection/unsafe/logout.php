<?php
	session_start();
	echo "<script>alert(\"Logout Successfully!\");</script>";
	session_destroy();
	echo "<script>window.location.href = 'login.php';</script>";
?>
