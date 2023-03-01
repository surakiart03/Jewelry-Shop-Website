<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_gem = $_POST['p_gem'];
    $p_type = $_POST['p_type'];
    $p_color = $_POST['p_color'];
    $p_birth = $_POST['p_birth'];
    $p_zodiac = $_POST['p_zodiac'];


    $file = $_FILES['p_pic']['name'];
    if($_FILES["p_pic"]["error"]>0) {
    echo "Error:" . $_FILES["p_pic"]["error"] . "<br/>";
    } else { move_uploaded_file($_FILES["p_pic"]["tmp_name"], "images/" . $_FILES["p_pic"]["name"]);}
    
    $p_price = $_POST['p_price'];
    $p_stock = $_POST['p_stock'];

    $sql = "UPDATE products SET p_name= '$p_name', p_gem='$p_gem', p_type = '$p_type', p_color = '$p_color',
            p_birth = '$p_birth', p_zodiac = '$p_zodiac', p_pic = '$file', p_price = '$p_price', p_stock = '$p_stock'
            WHERE p_id = $p_id  ";
 
    $result = mysqli_query($conn, $sql);

    if($result){
        //echo "Update Successful";
        echo"<script>alert('Update Successful'); window.location='adminShop.php';</script>";
        exit();
    }else{ 
        echo"<script>alert('Can not Update Gemstone'); window.location='edit_product_form.php';</script>";
        exit(); 
    }

?>
