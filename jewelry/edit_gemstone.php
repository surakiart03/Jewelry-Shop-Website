<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $g_id = $_POST['g_id'];
    $g_name = $_POST['g_name'];
    $g_color = $_POST['g_color'];
    $g_birth = $_POST['g_birth'];
    $g_zodiac = $_POST['g_zodiac'];
    $g_affirmention = $_POST['g_affirmention'];

    $file = $_FILES['g_pic']['name'];
    if($_FILES["g_pic"]["error"]>0) {
    echo "Error:" . $_FILES["g_pic"]["error"] . "<br/>";
    } else { move_uploaded_file($_FILES["g_pic"]["tmp_name"], "images/" . $_FILES["g_pic"]["name"]);}
    

    $sql = "UPDATE gemstones SET g_name= '$g_name', g_color='$g_color', g_birth = '$g_birth', g_zodiac = '$g_zodiac',
            g_affirmention = '$g_affirmention', g_pic = '$file'
            WHERE g_id = $g_id  ";
 
    $result = mysqli_query($conn, $sql);

    if($result){
        //echo "Update Successful";
        echo"<script>alert('Update Successful'); window.location='gemstones.php';</script>";
        exit();
    }else{ 
        echo"<script>alert('Can not Update Gemstone'); window.location='edit_gemstone_form.php';</script>";
        exit(); 
    }

?>
