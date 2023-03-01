<?php
    //ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $okpassword = $_POST['okpassword'];
    $userName = $_POST['userName'];

    $sqlcheckpass = "SELECT * FROM users WHERE userName='$userName'";
    $rst = mysqli_query($conn, $sqlcheckpass);
    while($row = mysqli_fetch_array($rst)){
        $checkpass = $row['passWord'];
        $status = $row['user_status'];
    }
    echo $checkpass;
    echo $oldpassword;
    
    if($oldpassword=='' or $newpassword=='' or $okpassword==''){
        if($status=='Customer'){
            echo"<script>alert('Please enter your password'); window.location='change_password_form.php';</script>";
            exit();
        }else{
            echo"<script>alert('Please enter your password'); window.location='admin_change_password_form.php';</script>";
            exit();
        }
    }else{
        if($checkpass!=$oldpassword){
            if($status=='Customer'){
                echo"<script>alert('Incorrect Original Password, Please try again'); window.location='change_password_form.php';</script>";
                exit(); 
            }else{
                echo"<script>alert('Incorrect Original Password, Please try again'); window.location='admin_change_password_form.php';</script>";
                exit(); 
            }
            
        }else{
            if($newpassword!=$okpassword){
                if($status=='Customer'){
                    echo"<script>alert('Your confirm password is not math with new password, Please try again'); window.location='change_password_form.php';</script>";
                    exit();
                }else{
                    echo"<script>alert('Your confirm password is not math with new password, Please try again'); window.location='admin_change_password_form.php';</script>";
                    exit();
                }
                
            }else{
                $sql = "UPDATE users SET passWord = '$newpassword'
                WHERE userName = '$userName' ";
    
                $result = mysqli_query($conn, $sql);

            //echo "Update Successful";
                if($status=='Admin'){
                    echo"<script>alert('Change Password Successful'); window.location='admin_myprofile.php';</script>";
                    exit();
                }else{
                    echo"<script>alert('Change Password Successful'); window.location='myprofile.php';</script>";
                    exit();
                }
                
            }
        }
    }

?>
