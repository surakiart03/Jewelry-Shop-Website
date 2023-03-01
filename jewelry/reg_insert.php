<?php
    //ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    // check username
    if($userName == '' or $passWord ==  '' or $firstname == '' or $lastname == '' or $email == ''){
        echo"<script>alert('Please enter your information');window.location='reg_form.php'</script>";
        exit();
    }else{
        $sql_select = "SELECT * FROM users WHERE userName='$userName'" or die("Error:" . mysqli_error());
        $result = mysqli_query($conn, $sql_select);
        $cnt = 0;
        while($rs = mysqli_fetch_array($result)){
            $cnt++;
        }
        if($cnt == 0){
            $sql = "INSERT INTO users (userName, passWord, firstname, lastname, email, user_status)
                    VALUES('$userName','$passWord','$firstname','$lastname','$email','Customer')";
            $rs = mysqli_query($conn, $sql);
        //echo "Register Successful";
        echo"<script>alert('Sign up Successful');window.location='login.html'</script>";
        exit();
        }else{
            echo"<script>alert('The Username already exist, Please use another
            Username.');window.location='reg_form.php'</script>";
            exit();
        }
    }
?>