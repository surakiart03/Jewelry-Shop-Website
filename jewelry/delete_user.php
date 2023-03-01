<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){ 
        echo "<script>alert('Can not delete, Please try agian'); window.location='user_management.php';</script>";
    }else{
        echo"<script>alert('Delete Successful'); window.location='user_management.php';</script>";
        exit();
    }
?>