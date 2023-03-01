<html>
<head>
    <title>CHANGE PASSWORD - 3 Tiger Armies|Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .button2{
            background-color: #D1C0A8;
            border: none;
            color: white;
            padding: 5px 15px;
            text-align:center;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        input,textarea { 
            background: white;
            border: none;
            padding: 5px 15px;
            font-size: 16px;
            color:brown;
        }

        input:focus,textarea:focus { 
            outline-color:#917461;
        }
        
        select {
            padding: 5px 15px;
            border: none;
            background-color: white;
            color:#917461;
        }
        select:hover {
            background-color: #d3c0ac;
            color:#ffffff;
        }
        select option {
            background-color: #ffffff;
            color:#917461;
            font-size:16px;
        }
    </style>
</head>

<body>
    <table border="0" width="100%" height="100%" bgcolor = #F6EEE0>
        <tr bgcolor = #D1C0A8>
            <td align="center" valign="center" >
                <?php include("menu.html"); ?>
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
                        <a href = "admin_myprofile.php" ><img src="images/profile.png" width="15px"/><font color=#917461 size="4px"> My Profile </font></a>
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
                    <form name="admin_change_password_form" method="post" action="change_password.php" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php 
                        include("connectDB.php");
                         
                        //$user_id = $_GET['user_id'];
                        $sql = "SELECT * FROM users WHERE userName = '$username'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                        echo 
                            "<input type=\"hidden\" name=\"userName\" value=\"".$row['userName']."\" />
                            
                            <table><tr><td style=\"color:#917461;font-size:20px;\"><b>Original Password</b><br/><br/></td><td><input type=\"password\" name=\"oldpassword\" /><br/><br/></td></tr>
                            <tr><td style=\"color:#917461;font-size:20px;\"><b>New Password</b><br/><br/></td><td><input type=\"password\" name=\"newpassword\" /><br/><br/></td></tr>
                            <tr><td style=\"color:#917461;font-size:20px;\"><b>Confirm Password</b><br/><br/></td><td><input type=\"password\" name=\"okpassword\" /><br/><br/></td>
                            </table>
                            
                            
                    </td></tr>
                    
                    <tr height=\"50px\"><td></td><td></td><td>
                            <input class=\"input\" type=\"submit\" value=\"CHANGE\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                            <a href=\"admin_myprofile.php\">Back</a><br/><br/>";
                        } ?>
                    </td></tr></table></center></form>
            </td>
        </tr>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>
    </table>
</body>
</html>
   