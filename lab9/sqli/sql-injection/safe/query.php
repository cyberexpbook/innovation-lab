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
	<title>Department Query</title>
</head>

<div class="container">
Hello, <?php echo $_SESSION['User']; ?>
<br>
Welcome to the Department Query!
	<div class="row">	
		<div class="row">
			<div class="col">
			  <div class="form-group">
			  	<input id="search_con" type="text" value="<?php 
					if(!isset($_GET['EID']))
						echo "Please enter the EID here!";
					else
						echo $_GET['EID'];
					?>"" placeholder="Inactive" class="form-control" />
				<br>
				<a onclick=javascript:jump() class="btn btn-block btn-lg btn-primary">Query</a>
			  </div>
			</div>
		</div>
	</div> <!-- /row -->
	<?php
	if(isset($_GET['EID'])){
		
		$EID = $_GET['EID'];
		$sql = "SELECT * FROM Communications WHERE EID=?";
		//echo $sql;
		$res = $conn -> prepare($sql);
		$res -> bind_param("i", $EID);
		$res -> execute();
		$res -> bind_result($EIDs, $Name, $Department, $Office, $Phone);
		
		$table = "<table border='3' cellpadding='20'>";
		$table .= "<tr align='center'>";
		$table .= "<td><font size = 4>EID</font></td>";
		$table .= "<td><font size = 4>Name</font></td>";
		$table .= "<td><font size = 4>Department</font></td>";
		$table .= "<td><font size = 4>Office</font></td>";
		while($res->fetch()){
			$table .= "<tr align='center'>";
			$table .= "<td><font size = 4>".$EIDs."</font></td>";
			$table .= "<td><font size = 4>".$Name."</font></td>";
			$table .= "<td><font size = 4>".$Department."</font></td>";
			$table .= "<td><font size = 4>".$Office."</font></td>";
		}
		echo $table;
	}
?>
</div>
<script>
	function jump(){
		parameter = document.getElementById('search_con').value;
		if(parameter){
			url = "?EID=" + parameter;
		//alert(url);
			window.location.href = url;
		}
	}
</script>


</html>
