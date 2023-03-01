<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $g_name = $_POST['g_name'];
    $g_color = $_POST['g_color'];
    $g_birth = $_POST['g_birth'];
    $g_zodiac = $_POST['g_zodiac'];
    $g_affirmention = $_POST['g_affirmention'];
 
    $file = $_FILES['g_pic']['name'];
    if($_FILES["g_pic"]["error"]>0) {
    echo "Error:" . $_FILES["g_pic"]["error"] . "<br/>";
    } else { move_uploaded_file($_FILES["g_pic"]["tmp_name"], "images/" . $_FILES["g_pic"]["name"]);}
    

    $sql = "INSERT INTO gemstones (g_name, g_color, g_birth, g_zodiac, g_affirmention, g_pic)
    Values('$g_name','$g_color','$g_birth','$g_zodiac','$g_affirmention','$file')";
    $result = mysqli_query($conn, $sql);

    echo"<script>alert('Add Gemstone Successful'); window.location='add_gemstone_form.php';</script>";
    exit();
?>