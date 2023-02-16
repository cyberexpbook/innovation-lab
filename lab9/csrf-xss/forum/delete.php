<?php
	include 'config.php';
	$user=$_GET['user'];
	$id=$_GET['id'];
	if($_COOKIE['username']==$user){
		$query="delete from message where id=".$id;
		$result = mysqli_query($link,$query);
		if ($result){
			echo "<script>alert('Delete successfully!');</script>";
		} else {
			echo "<script>alert(".mysqli_error($result).");</script>";
		}
		
	}else{
		echo "<script>alert('No permission');</script>";
	}
	$url = "board.php";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>"
?>
