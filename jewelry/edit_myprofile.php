<?php
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    
    $userName = $_POST['userName'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $passWord = $_POST['passWord'];

    $sqlcheckpass = "SELECT * FROM users WHERE userName='$userName'";
    $rst = mysqli_query($conn, $sqlcheckpass);
    while($row = mysqli_fetch_array($rst)){
        $checkpass = $row['passWord'];
        $user_id = $row['user_id'];
        $status = $row['user_status'];
    }
    
   if($checkpass==$passWord){

        $sql = "UPDATE users SET firstname = '$firstname',
            lastname = '$lastname', email = '$email'
            WHERE user_id = $user_id ";
 
        $result = mysqli_query($conn, $sql);

        //echo "Update Successful";
        if($status=='Admin'){
            echo"<script>alert('Update Your Profile Successful'); window.location='admin_myprofile.php';</script>";
            exit();
        }else{
            echo"<script>alert('Update Your Profile Successful'); window.location='myprofile.php';</script>";
            exit();
        }
    }
    else{ 
        if($status=='Admin'){
            echo"<script>alert('Incorrect Password, Please try again'); window.location='admin_edit_myprofile_form.php';</script>";
            exit();
        }else{
            echo"<script>alert('Incorrect Password, Please try again'); window.location='edit_myprofile_form.php';</script>";
            exit();
        }
    }

?>
