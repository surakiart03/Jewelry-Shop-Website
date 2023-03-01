<?php session_start();
    //ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $p_id = $_GET['p_id'];

    $sql = "DELETE FROM products WHERE p_id = $p_id";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){ 
        echo "<script>alert('can not delete, because this product is in order'); window.location='adminShop.php';</script>";
    }else{
        echo"<script>alert('Delete Successful'); window.location='adminShop.php';</script>";
        exit();
    }
?>