<?php
	session_start();
    if($_SESSION['logged_in']!='1'){
    	header("Location: LogIn.php");  
    }
?>
<!DOCTYPE html>
<head>
	<title>CSGO Tactics</title>
	<link rel="icon" href="img/icon2.png">
  <link rel="stylesheet" type="text/css" href="MultTableStyle.css">
</head>
<header>
	<div class="container green highlightTextIn">
		<a alt="MULT TABLE" class="activenav" href="MultTable.php">MULT TABLE</a>
		<a alt="LOG OUT"  href="LogOut.php" >LOG OUT</a>
	</div>
</header>
<body>
	<div id="box1">
		<div id="content"
			<h1>Multiplication Table</h1>
		</div>
		<div id="contenttext">
			<form method="GET">
				<div id="contenttext2">
					<label>Rows:</label><br>
					<input type="number" name="columns">
					<br><br>
					<label>Columns:</label><br>
					<input type="number" name="rows">
				</div>
				<input type="submit" value="Calculate">
			</form>
		</div>
		<?php
			if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["rows"]) && isset($_GET["columns"])){
				$cols = $_GET["rows"];
				$rows = $_GET["columns"];
				if(empty($rows)||!is_numeric($rows)||empty($cols)||!is_numeric($cols)){
					echo "<p>Invalid Input</p>";
				}
				else{
					echo "<table align=\"center\" border=1 width=50%>";
					for ($r =1; $r <= $rows; $r++){
						echo "<tr>";
						echo "<td>".$r."</td>";
						for ($c = 2; $c <= $cols; $c++){
							echo "<td>" .$c*$r."</td>";
						}
						echo "</tr>";
					}
					echo"</table>";
				}
			}	
		?>
	</div>
</body>
</html>