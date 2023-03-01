<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
    if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];

    $sql = "DELETE FROM cart WHERE username = '$username'";
    $rs = mysqli_query($conn, $sql);
    //echo "Cancel Successful";
    echo"<script>('Cancel All Successful');window.location='userShop.php'</script>";
 exit();
?>