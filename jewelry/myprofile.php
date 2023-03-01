<html>
<head>
    <title>MY PROFILE - 3 Tiger Armies|Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
</head>

<body>
    <table border="0" width="100%" height="100%" bgcolor = #F6EEE0>
        <tr bgcolor = #D1C0A8>
            <td align="center" valign="center" >
                <?php include("user_menu.html"); ?>
            </td>
        </tr>
        <tr>
            <td >
                <table border="0" width="100%">
                    <tr height="100px">
                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?PHP session_start();
                                if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                    echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                    exit();
                                }
                                if(isset($_SESSION['userName'])) 
                                    echo "Welcome: " . $_SESSION['userName'];
                                if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
                                    ini_set('display_errors',0); // hide warning

                                if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
                                if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
                        ?>
                        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href = "myprofile.php" ><img src="images/profile.png" width="15px"/><font color=#917461 size="4px"> My Profile </font></a>
                        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="logout.php"><font color=#917461 size="4px">Logout</font></a>
                        </td>   
                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="350px" bgcolor = #fcf7ef>
            <td align="center" valign="center" ><center><table border="0">

                    <tr height="250px"><td width="500px" align="right" valign="center">
                        <img src="images/member.png" width="400px" />
                    </td><td width="50px"></td>
                    <td style="color:#917461;font-size:20px;" width="500px">
                    
                    <?php 
                        include("connectDB.php");
                         
                        //$user_id = $_GET['user_id'];
                        $sql = "SELECT * FROM users WHERE userName = '$username'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                        echo 
                            "
                            <b>Username:</b> ".$row['userName']."<br/><br/>
                            <b>Firstname:</b> ".$row['firstname']."<br/><br/>
                            <b>Lastname:</b> ".$row['lastname']."<br/><br/>
                            <b>Email:</b> ".$row['email']."<br/><br/>
                    </td></tr>
                    
                    <tr height=\"50px\"><td></td><td></td><td>
                            <a href=\"edit_myprofile_form.php\"><font color=#72a773>Edit My Profile</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href=\"change_password_form.php\"><font color=#db0909>Change Password</a></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href=\"user_home.php\">Back</a><br/><br/>";
                        } ?>
                    </td></tr></table></center>
            </td>
        </tr>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>
    </table>
</body>
</html>
   