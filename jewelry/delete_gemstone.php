<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $g_id = $_GET['g_id'];

    $sql = "DELETE FROM gemstones WHERE g_id = $g_id";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){ 
        echo "can not delete, because this product is in order";
    }else{
        echo"<script>alert('Delete Successful'); window.location='gemstones.php';</script>";
        exit();
    }
?>