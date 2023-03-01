<?php
    $hostName = "it2.sut.ac.th";
    $userName = "php63_g2";
    $passWord = "4909510";
    $dbName = "php63_g2";
    $conn = mysqli_connect($hostName, $userName, $passWord, $dbName);
    if(mysqli_connect_error()){
        echo "Connect falied : " .mysqli_connect_error();
    }else{
        //echo "successful";
    }
?>