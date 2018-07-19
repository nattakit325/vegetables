<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="nattakit_db";

    $objCon = mysqli_connect($server,$user,$password,$db);

    mysqli_set_charset($objCon,"utf8");




?>