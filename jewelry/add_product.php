<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $p_name = $_POST['p_name'];
    $p_gem = $_POST['p_gem'];
    $p_type = $_POST['p_type'];
    $p_color = $_POST['p_color'];
    $p_birth = $_POST['p_birth'];
    $p_zodiac = $_POST['p_zodiac'];

    $p_price = $_POST['p_price'];
    $p_stock = $_POST['p_stock'];

    $file = $_FILES['p_pic']['name'];
    if($_FILES["p_pic"]["error"]>0) {
    echo "Error:" . $_FILES["p_pic"]["error"] . "<br/>";
    } else { move_uploaded_file($_FILES["p_pic"]["tmp_name"], "images/" . $_FILES["p_pic"]["name"]);}
    

    $sql = "INSERT INTO products (p_name, p_gem, p_type, p_color, p_birth, p_zodiac, p_price, p_stock, p_pic)
    Values('$p_name','$p_gem', '$p_type','$p_color','$p_birth','$p_zodiac', $p_price, $p_stock,'$file')";
    $result = mysqli_query($conn, $sql);

    echo"<script>alert('Add Product Successful'); window.location='add_product_form.php';</script>";
    exit();
?>
