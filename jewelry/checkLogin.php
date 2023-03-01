<?php session_start();
    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $guest = $_GET['guest'];
    $_SESSION['userName'] = $userName;
    $_SESSION['passWord'] = $passWord;
    $_SESSION['guest'] = $guest;

    $sql = "select * from users Where userName ='$userName' and passWord = '$passWord'";
    $rs = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($rs);
    $_SESSION['user_type'] = $data['user_status'];
    if (isset($_SESSION['user_type'])) {
        echo "This var is set so I will print.";
        if($data['user_status'] == "Admin"){
            header("Location: admin_home.php");
        }else if($data['user_status'] == "Customer"){
            header("Location: user_home.php");
        }
        else{
            //echo "Incorrect UserName or Password. Please Try again or Enter with Guest.";
            echo"<script>alert('Incorrect UserName or Password. Please Try again or Enter with Guest.');
            window.location='index.php'</script>";
            exit();
        }
    }else{
        if($_SESSION['guest'] == "Guest"){
            header("Location: user_home.php");
            }else{echo "Incorrect UserName or Password. Please Try again or Enter with Guest.";
            echo"<script>alert('Incorrect UserName or Password. Please Try again or Enter with Guest.');
            window.location='login.html'</script>";
            exit();
    }
 }
?>
