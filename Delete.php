<?php
	require('DB.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM skins WHERE SkinID=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: Admin.php"); 
?>