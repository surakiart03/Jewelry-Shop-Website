<?php session_start();
    //ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
    if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];

    $p_id = $_REQUEST['p_id'];
    $price = $_REQUEST['p_price'];
    $amount = $_REQUEST['amount'];
    $total = $price*$amount;

    $sql = "INSERT INTO cart (p_id, username, p_price, amount, total)
        VALUES($p_id,'$username', $price, $amount, $total)";
    $result = mysqli_query($conn, $sql);

    //echo "Add to Cart Successful";
        echo"<script>alert('Add to Cart Successful'); window.location='userShop.php'</script>";
    exit();
?>
