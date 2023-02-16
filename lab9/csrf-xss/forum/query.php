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

	<body>
		<div align='center'>
		<h1>Query Public Info</h1>
		<form name='queryform' method="GET" action='query.php'>
			Input username:
			<input type="text" name="username"/>			
			<input type="submit" name="Submit" value="Query"/>		
		</form>
		</div>
	</body>

</html>

<?php
	require 'config.php';
	if(isset($_GET['Submit'])){
		//retrieve data
		$username = $_GET['username'];
		$sql = "SELECT email,brief FROM users WHERE username='$username'";	

	

	$query = mysqli_query($link, $sql);

	
	if($query!=null){
		while($row=mysqli_fetch_array($query)){
	
			echo "<br/><br/><div align='center'><table width='330px'><tr><td><strong>User: </strong></td><td>$username</td></tr><tr><td><strong>Email: </strong></td><td>$row[email]</td></tr><tr><td><strong>Brief Decription: </strong></td><td>$row[brief]</td></tr></table></div>";
			
			
		}	
	}
	if(mysqli_num_rows($query)==0){
		echo "<br/><div align='center'><h2>There is no user named $username</h2></div>";
	}		
	mysqli_close($link);
	}
?>
