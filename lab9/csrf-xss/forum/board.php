<!DOCTYPE html>
<?php
if($_GET['out']){
		setcookie('username',"");
		setcookie('cookie',"");
		echo "<script>location.href='login.php'</script>";
	}

echo "<div align='right'><p><h4>User:<font style='color:red'>". $_COOKIE[username] . "</font> <a href='main.php?out=out'>[Logout]</a><a href='main.php'>[Back]</a></h4></p></div>";
$sql = "SELECT cookie FROM users WHERE username = '$username'";
$result = mysqli_query($link,$sql);
if (mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	if ($_cookie['cookie']!=$row['cookie']){
		echo "<script>window.location.href='login.php'</script>";
		die();
	}
}
?>


<html>
	<div align="center">
	<div >
		<h1>Public Message Board</h1><hr>
	</div>
		<a href="add.php">Leave a message</a>
	</div>
	<table width=500 border='0' align='center' cellpadding='5' cellspacing='1' bgcolor='#add3ef'></table>
</html>


<?php
	include 'config.php';
	header('Content-type: text/html; charset=utf-8');
	if(!$_COOKIE['username']||!$_COOKIE['cookie']){
		echo "<script>window.location.href='login.php'</script>";
	}

	$sql = "select * from message order by id";	
	$query = mysqli_query($link, $sql);
	if($query!=null){
		while($row=mysqli_fetch_array($query)){
			echo "<table align='center' style='width:700px'><tr bgcolor='#eff3ff'><td>Title: <font color='red'>$row[title]</font><div align='right'><a href='delete.php?user=$row[user]&id=$row[id]'>Delete</a></div></td></tr><tr bgcolor='#ffffff'><td>Content: $row[content]</td></tr><tr bgcolor='#ffffff'><td><div align='right'>Published Date: $row[created_at]</div></td></tr><tr><td><div align='right'>Published By: $row[user]</div></td></tr></table>";
			
		}	
	}
	mysqli_close($link);
	
?>

