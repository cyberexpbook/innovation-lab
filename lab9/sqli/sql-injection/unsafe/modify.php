<?php
	session_start();
	require_once "mysql.php";
		
	if(!isset($_SESSION['User'])){
		echo "<script>alert('Please Login First');</script>";
		echo "<script>window.location.href = 'login.php';</script>";
		die();
	}
?>
    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="dist/favicon.ico">

<html>
<head>
	<title>Password Modify</title>
</head>

<div class="container">
Hello, <?php echo $_SESSION['User']; ?>
<br>
Welocome to Password Modify Page!
	<div class="row">	
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<input id="oldPassword" type="text" placeholder="Inactive" value="Enter your old password here!" class="form-control">
				<br>
				<input id="newPassword" type="text" placeholder="Inactive" value="Enter your new password here!" class="form-control">
				<br>
				<a onclick=javascript:jump() class="btn btn-block btn-lg btn-primary">Submit</a>
			  </div>
			</div>
		</div>
	</div> <!-- /row -->
</div>
<script>
	function jump(){
		oldPassword = document.getElementById('oldPassword').value;
		newPassword = document.getElementById('newPassword').value;
		if(oldPassword&&newPassword){
			url = "?oldPassword=" + oldPassword + "&newPassword=" + newPassword;
		//alert(url);
			window.location.href = url;
		}
	}
</script>
</html>
<?php 
	if(isset($_GET["oldPassword"]) and isset($_GET["newPassword"])){
		$Name = $_SESSION["User"];
		$oldPassword = sha1($_GET["oldPassword"]);
		
		$newPassword = sha1($_GET["newPassword"]);
		
		$sql = "UPDATE Password SET Password = '".$newPassword."' WHERE Name = '".$Name."' AND Password = '".$oldPassword."' LIMIT 1";
		//echo $sql;
		$res = mysqli_query($conn, $sql);
		if($conn->affected_rows == 1)
			echo "<script>alert(\"Modified Successfully\");</script>";
		else if($conn->affected_rows == 0)
			echo "<script>alert(\"Unable to Modify\");</script>";
		else if($conn->affected_rows > 1){
			$sql1 = "DROP TABLE IF EXISTS Password";
			$sql2 = "CREATE TABLE Password(SELECT * FROM Password_backup)";
			mysqli_query($conn, $sql1);
			mysqli_query($conn, $sql2);
			echo "<script>alert(\"Dangerous Modification! Backup Mechanism activated!\");</script>";
		}
	}
?>
