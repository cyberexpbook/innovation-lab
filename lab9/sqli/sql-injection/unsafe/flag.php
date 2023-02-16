<?php
	session_start();
	if(isset($_SESSION['User'])){
		if($_SESSION['User']=="Elden"){
			echo "flag{fe835aab19a198d00851eb7695eea4f2}";
		}
		else{
			echo "<script>alert(\"Please Login with the admin account!\");</script>";
			session_destroy();
			echo "<script>window.location.href = 'login.php';</script>";
		}
	}
	else{
		echo "<script>alert(\"Please Login with the admin account!\");</script>";
		session_destroy();
		echo "<script>window.location.href = 'login.php';</script>";
	}
?>
