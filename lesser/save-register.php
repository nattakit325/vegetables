<?php
    include "connect.php";

    $strSQL1 = "INSERT INTO login ";
	$strSQL1 .="(username,password,status) VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["status"]."')";
    $objQuery = mysqli_query($objCon,$strSQL1);
    
    $strSQL2 = "INSERT INTO profile ";
	$strSQL2 .="(name,surname,age,username) VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["age"]."','".$_POST["username"]."')";
    $objQuery = mysqli_query($objCon,$strSQL2);
    
    if($objResult["status"] != "ADMIN")
			{
				header("location:index.html");
			}



?>