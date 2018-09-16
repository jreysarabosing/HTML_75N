<?php
    require('DB.php');
    session_start();
    if($_SESSION['logged_in']!='1'){
        header("Location: LogIn.php");  
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CSGO Tactics</title>
    <link rel="icon" href="img/icon2.png">
  <link rel="stylesheet" type="text/css" href="AdminStyle.css">
</head>
<header>
    <div class="container green highlightTextIn">
        <a alt="ADMIN" class="activenav" href="Admin.php">ADMIN</a>
        <a alt="INSERT" href="Insert.php">INSERT</a>
        <a alt="LOG OUT" href="LogOut.php">LOG OUT</a>
    </div>
</header>
<body>
    <?php
        if(isset($_POST['search'])){
            $searchval = $_POST['searchval'];
            $query = "SELECT * FROM `skins` WHERE CONCAT(`WeaponQuality`, `ExteriorQuality`, `SkinName`, `Attribute`) LIKE '%".$searchval."%'";
            $search_result = filterTable($query);  
        }
        else{
            $query = "SELECT * FROM `skins`";
            $search_result = filterTable($query);
        }
        function filterTable($query){
            $connect = mysqli_connect("localhost", "root", "", "csgo");
            $filter_Result = mysqli_query($connect, $query);
            return $filter_Result;
        }
    ?>
    <div id="box1">
        <form action="Search.php" method="post">
        <div id="contenttext">
            <input type="text" name="searchval" placeholder="Search">
            <input type="submit" name="search" value="Submit">
        </div>
        <div id="content">
            <h1>Skins</h1>
        </div>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>Number</strong></th>
                    <th><strong>Weapon Quality</strong></th>
                    <th><strong>Exterior Quality</strong></th>
                    <th><strong>Skin Name</strong></th>
                    <th><strong>Attribute</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count=1;
                    while($row = mysqli_fetch_array($search_result)) { 
                ?>
                <tr><td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["WeaponQuality"]; ?></td>
                <td align="center"><?php echo $row["ExteriorQuality"]; ?></td>
                <td align="center"><?php echo $row["SkinName"]; ?></td>
                <td align="center"><?php echo $row["Attribute"]; ?></td>
                <td align="center">
                    <a href="Edit.php?id=<?php echo $row["SkinID"]; ?>" style="color: grey;">Edit</a>
                </td>
                <td align="center">
                    <a href="Delete.php?id= <?php echo $row["SkinID"]; ?>" style="color: grey;">Delete</a>
                </td>
                </tr>
                <?php $count++; } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
