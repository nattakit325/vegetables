<?php

     include "connect.php";
     $loname = $_POST["loname"];
     $lati = $_POST["la"];
     $longti = _POST["long"];
    // $loname = json_decode(stripslashes($_POST["loname"]));
    // $lati =  json_decode(stripslashes($_POST["la"]));
    // $longti =  json_decode(stripslashes($_POST["long"]));
    
     foreach($loname as $value ){
        $strSQL1 = "INSERT INTO market";
        $strSQL1 .="(market,latitude,longitude,type) VALUES ('$loname','$lati','$longti','2')";
        $objQuery = mysqli_query($objCon,$strSQL1);
    }
   echo "done";

?>