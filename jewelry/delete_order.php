<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $o_id = $_GET['o_id'];

    $sql = "DELETE FROM orders WHERE o_id = $o_id";
    $result = mysqli_query($conn, $sql);
    //echo "Delete Successful";
    echo"<script>alert('Delete Order Successful');window.location='order_management.php'</script>";
    exit();
?>