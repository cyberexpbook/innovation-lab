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
<head></head>
<body>

	<div align='center'>
		<div>
			<h1>Edit Personal Info</h1>
		</div>
		<?php
		if (isset($_GET["submit"])){
			if ($_GET["name"]!=NULL) {
				$input = $_GET["name"];
				echo "<div>"."Your nickname has been updated as: ".$input."</div>";
			}
			if ($_GET["address"]!=NULL) {
				$input = str_replace('<script>','',$_GET["address"]);
				echo "<div>"."Your address has been updated as: ".$input."</div>";
			}
			if ($_GET["phone"]!=NULL) {
				$input = preg_replace('/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i','',$_GET["phone"]);
				echo "<div>"."Your phone has been updated as: ".$input."</div>";
			}
			if ($_GET["job"]!=NULL) {
				$input = htmlspecialchars($_GET["job"]);
				echo "<div>"."Your job has been updated as: ".$input."</div>";
			}
		}
		?>
		<br/>
		<form action="info.php" name="myform" method="GET">
			<label for="name">Nickname</label>		
			<input style="margin-left:20px" value="" name="name"/>
			<button value="submit" name="submit" class="button">Submit</button>
		</form>
		<form action="info.php" name="addform" method="GET">
			<label for="address">Address</label>		
			<input style="margin-left:37px" value="" name="address"/>
			<button value="submit" name="submit" class="button">Submit</button>
		</form>
		<form action="info.php" name="phoneform" method="GET">
			<label for="phone">Phone</label>		
			<input style="margin-left:47px" value="" name="phone"/>
			<button value="submit" name="submit" class="button">Submit</button>
		</form>
		<form action="info.php" name="jobform" method="GET">
			<label for="job">Job</label>		
			<input style="margin-left:67px" value="" name="job"/>
			<button value="submit" name="submit" class="button">Submit</button>
		</form>

	</div>


<br/>	<br/>	<br/>	<br/>	

</body>

</html>
