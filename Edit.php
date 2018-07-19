<?php
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
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'csgo');
        $id=$_REQUEST['id'];
        $query = "SELECT * from skins where SkinID='".$id."'"; 
        $result = mysqli_query($db, $query);
        $n = mysqli_fetch_assoc($result);
        $WeaponQuality = $n['WeaponQuality'];
        $ExteriorQuality = $n['ExteriorQuality'];
        $SkinName = $n['SkinName'];
        $Attribute = $n['Attribute'];
        if(isset($_POST['submit'])){ 
            $id=$_REQUEST['id'];   
            $WeaponQuality =  $_POST['WeaponQuality'];
            $ExteriorQuality =  $_POST['ExteriorQuality'];
            $SkinName =  $_POST['SkinName'];
            $Attribute =  $_POST['Attribute'];
            $sql= "UPDATE skins SET `WeaponQuality`='$WeaponQuality', `ExteriorQuality`='$ExteriorQuality' , `SkinName`= '$SkinName', `Attribute`= '$Attribute'  WHERE SkinID=$id";
            if (mysqli_query($db, $sql)){    
                echo "Inserted successfully";
                header("Location: Admin.php"); 
            } 
            else {    
                echo "Error: ". $sql . "<br>" . mysqli_error($db);
            }
            mysqli_close($db);
        } 
    ?>
    <div id="box1">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div id="content">
                <h1>Edit Skin</h1>
            </div>
            <div id="contenttext">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                </select>
            </div>
            <input type="submit" value="Submit" name="submit" style="margin-top: 0;margin-left: 50px">
        </form>
    </div>
</body>
</html>



