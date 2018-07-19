<?php
    session_start();
    if($_SESSION['logged_in']!='1'){
        header("Location: LogIn.php");  
    }
?>
</!DOCTYPE html>
<html>
<head>
  <title>CSGO Tactics</title>
  <link rel="icon" href="img/icon2.png">
  <link rel="stylesheet" type="text/css" href="AdminStyle.css">
</head>
<header>
  <div class="container green highlightTextIn">
	<a alt="ADMIN" href="Admin.php">ADMIN</a>
	<a alt="INSERT" class="activenav" href="Insert.php">INSERT</a>
	<a alt="LOG OUT" href="LogOut.php">LOG OUT</a>
  </div>
</header>
<body>
  	<?php
		session_start();
	 	 $db = mysqli_connect('localhost', 'root', '', 'csgo');
	 	 if(isset($_POST['submit'])){
			  $WeaponQuality =  $_POST['WeaponQuality'];
			  $ExteriorQuality =  $_POST['ExteriorQuality'];
			  $SkinName =  $_POST['SkinName'];
			  $Attribute =  $_POST['Attribute'];
			  $sql="INSERT INTO `skins`(`WeaponQuality`, `ExteriorQuality`, `SkinName`, `Attribute`) VALUES ('$WeaponQuality','$ExteriorQuality','$SkinName','$Attribute')";
			if (mysqli_query($db, $sql)){    
				echo "Inserted successfully";
				header("Location: Admin.php");
			 } 
			else{    
		  		echo "Error: ". $sql . "<br>" . mysqli_error($db);
			}
			mysqli_close($db);
	  	}
  	?>
  	<div id="box1">
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  			<div id="content">
  				<h1>Add New Skin</h1>
  			</div>
			<div id="contenttext">
				<label>Weapon Quality</label><br>
				<select name="WeaponQuality" required>
						<option disabled selected>Choose one</option>
						<option value="Common">Common</option>
					<option value="Uncommon">Uncommon</option>
					<option value="Rare">Rare</option>
					<option value="Mythical">Mythical</option>
					<option value="Legendary">Legendary</option>
					<option value="Ancient">Ancient</option>
					<option value="Exceedingly Rare">Exceedingly Rare</option>
				</select><br>
				<label>Exterior Quality</label><br>
				<select name="ExteriorQuality" required>
					<option disabled selected>Choose one</option>
					<option value="FN">Factory New</option>
					<option value="MW">Minimal Wear</option>
					<option value="FT">Field-Tested</option>
					<option value="WW">Well-Worn</option>
					<option value="BS">Battle-Scarred</option>
				</select><br>
				<label>Skin Name</label><br>
				<input type="text" name="SkinName" placeholder="Skin Name" required>
				<br>
				<label>Attribute</label><br>
				<select name="Attribute" required style="margin-bottom: 1px">
					<option disabled selected>Choose one</option>
					<option value="StatTrak">StatTrak</option>
					<option value="Souvenir">Souvenir</option>
					<option value="None">None</option>
				</select><br>
			</div>
			<input type="submit" value="Submit" name="submit" style="margin-top: 0;margin-left: 50px">
		</form>
	</div>
</body>
</html>