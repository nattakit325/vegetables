<?php
    $server="localhost:8080";
    $user="root";
    $password="167349258123";
    $db="smartfarmer";

    $objCon = mysqli_connect($server,$user,$password,$db);

    mysqli_set_charset($objCon,"utf8");




?>