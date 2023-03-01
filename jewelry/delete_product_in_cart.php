<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
    if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
    $cart_id = $_GET['cart_id'];
    $cnt_amount = 0;
    $sql2 = "SELECT * FROM cart WHERE username = '$username'" or die("Error:" . mysqli_error());
    $result2 = mysqli_query($conn, $sql2);

    while($rs2 = mysqli_fetch_array($result2)){
        $cnt_amount = $cnt_amount + $rs2['amount'];
    }
    $cnt_amount = $cnt_amount-1;

    $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
    $rs = mysqli_query($conn, $sql);
    //echo "Delete Successful";
    echo"<script>alert('Delete Order Successful'); window.location='cart.php?amount=$cnt_amount';</script>";
    exit();
?>