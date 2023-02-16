<?php
	include 'config.php';
	$user=$_GET['user'];
	if($_COOKIE['username']==$user){
		$query="delete from messages where user=".$user;
		mysqli_query($link,$query);
		$url = "board.php";
	}else{
		echo "<script>alert('no permission');</text/javascript>";
	}
?>
