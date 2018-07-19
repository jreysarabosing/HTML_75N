<?php
    require('DB.php');
    session_start();
    if($_SESSION['logged_in']!='1'){
        header("Location: LogIn.php");  
    }
?>
<!DOCTYPE html>
<head>
	<title>CSGO Tactics</title>
	<link rel="icon" href="img/icon2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="AdminStyle.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main1.css">
</head>
<header>
	<div class="container green highlightTextIn">
		<a alt="ADMIN" class="activenav" href="Admin.php">ADMIN</a>
		<a alt="INSERT" href="Insert.php">INSERT</a>
		<a alt="LOG OUT" href="LogOut.php">LOG OUT</a>
	</div>
</header>
<body>
	
	<div id="box1">
    	<form action="Search.php" method="post">
    	<div id="contenttext">
        	<input type="text" name="searchval" placeholder="Search">
        	<input type="submit" name="search" value="Submit">
        </div>
        <div id="content">
    		<h1>Skins</h1>
    	</div>
    	<div class="table100 ver3 m-b-110">
            <div class="table100-head">
               <table>
                    <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">#</th>
                            <th class="cell100 column2">Weapon Quality</th>
                            <th class="cell100 column3">Exterior Quality</th>
                            <th class="cell100 column4">Skin Name</th>
                            <th class="cell100 column5">Attribute</th>
                            <th class="cell100 column6">Edit</th>
                            <th class="cell100 column7">Delete</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                        <?php
                            $sel_query="SELECT * FROM `skins`";
                            $result = mysqli_query($con,$sel_query);
                            while($row = mysqli_fetch_array($result)) { 
                        ?>
                        <tr class="row100 body">
                            <td class="cell100 column1"><?php echo $row["SkinID"]; ?></td>
                            <td class="cell100 column2"><?php echo $row["WeaponQuality"]; ?></td>
                            <td class="cell100 column3"><?php echo $row["ExteriorQuality"]; ?></td>
                            <td class="cell100 column4"><?php echo $row["SkinName"]; ?></td>
                            <td class="cell100 column5"><?php echo $row["Attribute"]; ?></td>
                            <td class="cell100 column6">
                                <a href="Edit.php?id=<?php echo $row["SkinID"]; ?>" style="color: grey;">Edit</a>
                            </td>
                            <td class="cell100 column7">
                                <a href="Delete.php?id= <?php echo $row["SkinID"]; ?>" style="color: grey;">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</body>
</html>