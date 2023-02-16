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
if (isset($_POST["Submit"])){
	if ($_POST["Submit"]=="email"){
		if ($_POST["Email"]!=NULL){
			include 'config.php';
			$username = $_COOKIE[username];
			$email = $_POST["Email"];
			$sql = "UPDATE users SET email='$email' WHERE username='$username'";
			$result = mysqli_query($link, $sql);
			if ($result) {
				echo "<script>alert(\"Update email successfully!\")</script>";
			} else {
				echo "<script>alert(\"Update email failed!\")</script>";
			}
		}
	}
	if ($_POST["Submit"]=="brief"){
		if ($_POST["Brief"]!=NULL){
			include 'config.php';
			$username = $_COOKIE[username];
			$brief = str_replace("'", "\'", $_POST["Brief"]);
			$sql = "UPDATE users SET brief='$brief' WHERE username='$username'";
			$result = mysqli_query($link, $sql);
			if ($result) {
				echo "<script>alert(\"Update brief description successfully!\")</script>";
			} else {
				echo "<script>alert(\"Update email failed!\")</script>";
			}
		}
	}	
	
}
?>

<html>
<head></head>
<body>

	<div align='center'>
		<div>
			<h1>Edit Public Info</h1>
		</div>
		<?php
		include 'config.php';
		$username = $_COOKIE[username];
		$sql = "SELECT email, brief FROM users WHERE username='$username'";
		$query = mysqli_query($link, $sql);
		if($query!=null){
			while($row=mysqli_fetch_array($query)){
					echo "<div align='center'><table width='330px'><tr><td><strong>Email: </strong></td><td>$row[email]</td></tr><tr><td><strong>Brief Decription: </strong></td><td>$row[brief]</td></tr></table></div>";
			}
		}
		mysqli_close($link);
		?>
		<br/>
		<br/>
			<form action="public.php" name="emailform" method="POST">
			<label for="name">Email: </label>		
			<input style="margin-left:20px" value="" name="Email"/>
			<button value="email" name="Submit" class="button">Submit</button>
		<div align='left' style='width:340px;height:230px'>
			<form style="align:left" action="public.php" name="desform" method="POST">
				<label for="brief">Brief Description:</label>
				<textarea  style="width:340px; height: 180px" value="" name="Brief"></textarea>
				<div align='right'><button  style="align:center" value="brief" name="Submit" class="button">Submit</button></div>
		</div>

<br/>	<br/>	<br/>	<br/>	

</body>

</html>
