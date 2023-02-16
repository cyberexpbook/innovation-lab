<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	require_once "config.php";
	$user = trim($_POST["username"]);
	$pwd = trim($_POST["password"]);
	$cookie = sha1($pwd);
	$sql = "INSERT INTO users (username, cookie) values ('$user', '$cookie')";
	$result = mysqli_query($link, $sql);
	if ($result){
		echo "<script>alert('Sign up successfully!')</script>";
		echo "<script>location.href='login.php'</script>";
			
	}else{
		echo "Error: ".mysqli_error($result)."<br/>";
	}
	mysqli_close($link);
}

	
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Sign Up</title></head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div>
<h1>Register</h1>
<p>Please fill in this form to create an account.</p>
<hr>

<lable for="user"><b>User</b></label>
<input type="text" name="username" value="<?php echo $user; ?>">
<lable for="psw"><b>Password</b></label>
<input type="password" name="password" value="<?php echo $pwd; ?>">
<hr>
<button type = "submit">Register</button>

</div>

<div>
<p>Already have an account? <a href="login.php">Sign in</a></p>
</div>
</form>

</body>
</html>

