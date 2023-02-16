<?php
	require_once "mysql.php";
?>
    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="dist/favicon.ico">
    
<html>
<head>
	<title>All Departments</title>
</head>

<div class="container">
All Departments Here!
	<?php
		$sql = "SELECT DISTINCT Department, Office FROM Communications";
		//echo $sql;
		$res = mysqli_query($conn, $sql);
		
		//print_r(mysqli_fetch_row($res));
		
		$table = "<table border='3' cellpadding='20'>";
		$table .= "<tr align='center'>";
		$table .= "<td><font size = 4>Department</font></td>";
		$table .= "<td><font size = 4>Office</font></td>";
		while($row = mysqli_fetch_row($res)){
			$table .= "<tr align='center'>";
			for($j=0; $j<2; $j++){
				$table .= "<td><font size = 4>".$row[$j]."</font></td>";
			}
		}
		echo $table;
?>
</div>
<script>
