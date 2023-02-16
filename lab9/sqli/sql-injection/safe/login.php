<?php
	session_start();
	require_once "mysql.php";
	
	if(isset($_SESSION['User'])){
		echo "<script>window.location.href = 'query.php';</script>";
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
	<title>Login</title>
</head>


<div class="container">
Login!
	<div class="row">	
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<input id="Name" type="text" value="Name" placeholder="Inactive" class="form-control"><br>
				<input id="Password" type="text" value="Password" placeholder="Inactive" class="form-control"><br>
				<a onclick=javascript:jump() class="btn btn-block btn-lg btn-primary">Submit</a>
			  </div>
			</div>
		</div>
	</div> <!-- /row -->
</div>
<script>
	function jump(){
		Name = document.getElementById('Name').value;
		Password = document.getElementById('Password').value;
		if(Name && Password){
			url = "?Name=" + Name + "&Password=" + Password;
		//alert(url);
			window.location.href = url;
		}
	}
</script>

<?php

	if(isset($_GET['Name'])&& isset($_GET['Password'])){
		
		$Name = $_GET['Name'];
		$Password = sha1($_GET['Password']);
		$sql = "SELECT * FROM Password WHERE (Name= ?) AND (Password = ?)";
		$res = $conn -> prepare($sql);
		$res -> bind_param("ss",$Name,$Password);
		$res -> execute();
		$res -> bind_result($EID, $res1, $res2);
		$res -> fetch();
		//echo $row;
		if ($EID){
			$_SESSION['User'] = $Name;
			echo "<script>alert(\"Login successfully, ".$Name."\");</script>";
			echo "<script>window.location.href = 'query.php';</script>";

			//echo $_SESSION['User'];
			
		}
		else{
			unset($_SESSION['User']);
			echo "<script>alert('Wrong Name or Password!');</script>";
		}
			
	}
	
?>
</html>
