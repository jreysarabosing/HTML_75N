<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>CSGO Tactics</title>
	<link rel="icon" href="img/icon2.png">
  <link rel="stylesheet" type="text/css" href="LogInStyle.css">
</head>
<header>
	<div class="container green highlightTextIn">
		<a alt="HOME" href="Index.html">HOME</a>
		<a alt="PRODUCTS" href="Products.html">PRODUCTS</a>
		<a alt="SIGN UP" href="SignUp.html">SIGN UP</a>
		<a alt="CONTACT US" href="ContactUs.html">CONTACT US</a>
		<a alt="LOG IN" class="activenav" href="LogIn.php">LOG IN</a>
	</div>
</header>
<body>
	<div id="box1">
		<div id="contentimage">
			<img src="img/squareglobal.jpg">
		</div>
		<div id="content">
			<h1>Log In</h1>
		</div>
		<div id="contenttext">
			<br><br>
			<form method="POST">
				<label>Username:</label><br>
				<div id="contenttext2">
					<input name="username" type="text" required>
					<br>
					<label>Password:</label><br>
					<input name="password" type="password" required>
					<br><br>
				</div>
				<input type="submit" value="Submit">
			</form>
			<?php
				$_SESSION["user"]="aos312";
				$_SESSION["pass1"]="admin";
				$_SESSION["pass2"]="multi";
			   if($_SERVER["REQUEST_METHOD"]=="POST"){
					$username=$_REQUEST["username"];
					$password=$_REQUEST["password"];
				  if($username == $_SESSION["user"] && $password == $_SESSION["pass2"]){
				  		$_SESSION['logged_in']='1';
						header("Location: MultTable.php");
						exit;
					}
					else if($username == $_SESSION["user"] && $password == $_SESSION["pass1"]){
						$_SESSION['logged_in']='1';
						header("Location: Admin.php");
						exit;
					}
					else{
						echo "Account not recognized.";
					}
				}
			 ?>
		</div>
	</div>
</body>
</html>