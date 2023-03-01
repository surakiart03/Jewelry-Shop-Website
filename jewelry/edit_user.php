<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $user_id = $_POST['user_id'];
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $user_status = $_POST['user_status'];

    $sql = "UPDATE users SET user_id= '$user_id', userName='$userName', passWord = '$passWord', firstname = '$firstname',
            lastname = '$lastname', email = '$email', user_status ='$user_status'
            WHERE user_id = $user_id  ";
 
    $result = mysqli_query($conn, $sql);

    if($result){
        //echo "Update Successful";
        echo"<script>alert('Update Successful'); window.location='user_management.php';</script>";
        exit();
    }else{ 
        echo"<script>alert('Can not Update Gemstone'); window.location='edit_user_form.php';</script>";
        exit(); 
    }

?>
