<!DOCTYPE html>
<?php
if($_GET['out']){
		setcookie('username',"");
		setcookie('cookie',"");
		echo "<script>location.href='login.php'</script>";
	}

echo "<div align='right'><p><h4>User:<font style='color:red'>". $_COOKIE[username] . "</font> <a href='main.php?out=out'>[Logout]</a><a href='main.php'>[Back]</a></h4></p></div>";
?>

<?php 
	include 'config.php';
	header("Content-type: text/html; charset=utf-8");
	$sql = "SELECT cookie FROM users WHERE username = '$username'";
	$result = mysqli_query($link,$sql);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		if ($_cookie['cookie']!=$row['cookie']){
			echo "<script>window.location.href='login.php'</script>";
			die();
		}
	}
	if($_GET['submit']){
		$content = str_replace("'", "\'", $_GET[content]);
		
		$sql = "insert into message (user,title,content,created_at) values ('$_COOKIE[username]','$_GET[title]', '$content', now())";
		#echo $sql;		
		$flag= mysqli_query($link,$sql);
		$url = "board.php";
		echo "<script>window.location.href='$url'</script>";
	}

?>


<html>
<body>
	<div align='left'><h1>Input what you want to say...</h1></div></br></br>
	<form name="addForm" method="GET" action="add.php">
		Title: <input style='margin-left:30px;width:510px;height:30px' type="text" name="title"/><br/>
		</br>Content:</br>
		<textarea style='width:600px' name="content" rows="8" cols="30"></textarea><br/>
		<input style="margin-left:530px;width:80px" type="submit" name="submit" value="Add"/>
	</form>
</body>
</html>
