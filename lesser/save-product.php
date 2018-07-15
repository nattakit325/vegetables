<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}

    include "connect.php";
    
	$strSQL = "UPDATE selllist RIGHT JOIN product SET selllist.productname = '".trim($_POST['name'])."' 
	,product.name = '".trim($_POST['name'])."',product.detail = '".trim($_POST['detail'])."',sellist.amount = '".trim($_POST['amount'])."',sellist.price = '".trim($_POST['price'])."' WHERE username = '".$_SESSION["username"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	
	echo "Save Completed!<br>";		
	
	if($_SESSION["status"] == "ADMIN")
	{
		echo "<br> Go to <a href='detail-product.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='detail-product.php'>User page</a>";
	}
	
	mysqli_close($objCon);
?>