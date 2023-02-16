<?php
	session_start();
	require "config.php";
	header("Content-type: text/html; charset=utf-8");

	if($_GET['out']){
		setcookie('username',"");
		setcookie('cookie',"");
		echo "<script>location.href='login.php'</script>";
	}

	if($_POST['username']!=NULL || $_POST['password']!=NULL){
		$username = $password = $username_err = $password_err = "";
	 	if(empty(trim($_POST["username"]))){
        		$username_err = "Please enter username.";
    		} else{
        		$username = trim($_POST["username"]);
    		}
    		if(empty(trim($_POST["password"]))){
       	 		$password_err = "Please enter your password.";
    		} else{
        		$password = trim($_POST["password"]);
    		}	

		if(empty($username_err)&&empty($password_err)){
			$sql = "SELECT id, username, cookie FROM users WHERE username = '$username'";
			$result = mysqli_query($link, $sql);
			if (mysqli_num_rows($result) == 1) {
            			// fetch the row
				$row = mysqli_fetch_assoc($result);
				if (strcmp(sha1($password), $row["cookie"]) == 0) {
					setcookie('username', $username, time()+3600);
					setcookie('cookie', $row["cookie"], time()+3600);
					echo "<script>location.href='login.php'</script>";
				}
			}else{
				echo "<script>alert('username or password is wrong!');</script>";
				echo "<script>location.href='login.php'</script>";
			}
		}

		


	}

		if($_COOKIE['username']&&$_COOKIE['cookie']){
			echo "<script>location.href='./main.php'</script>";
		}
	
	




 
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Sign in</title></head>
<body>
<form action="<?php echo htmlspecialchars($SERVER["PHP_SELF"]);?>" method ="post">
<div>
<h1>Login</h1>
<p>Use your name and password to login the research forum.</p>
<hr>

<label for="user"><b>User</b><label>
<input type="text" name="username" value="<?php echo $user; ?>">
<label for="psw"><b>Password</b><label>
<input type="password" name="password" value="<?php echo $pwd; ?>">
<hr>
<button type="submit" class="registerbtn">Login</button>
</div>
<div><p> Do not have an account? <a href="register.php">Sign up</a></p>
</div></form>

</body>
</html>
