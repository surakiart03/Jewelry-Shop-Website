<html>
<head>
    <title>EDIT USER - 3 Tiger Armies|Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
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
                        ?>
                        <?php include("admin_tabwelcome.html"); ?>
                        </td>   
                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="500px" bgcolor = #fcf7ef>
            <td align="center" valign="center" ><center><table border="0" style="color:#917461"><tr><td>
                    <br/><center><h2>EDIT USER</h2></center> <br/><br/>
                    <form name="edit_user_form" method="post" action="edit_user.php" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php 
                        include("connectDB.php");
                         
                        $user_id = $_GET['user_id'];
                        $sql = "SELECT * FROM users WHERE user_id = $user_id";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                        echo 
                            "User ID: <input type=\"text\" name=\"user_id\" value=\"".$row['user_id']."\" /> <br/><br/>
                            Username: <input type=\"text\" name=\"userName\" value=\"".$row['userName']."\" /> <br/><br/>
                            Password: <input type=\"text\" name=\"passWord\" value=\"".$row['passWord']."\" /> <br/><br/>
                            Firstname: <input type=\"text\" name=\"firstname\" value=\"".$row['firstname']."\" /> <br/><br/>
                            Lastname: <input type=\"text\" name=\"lastname\" value=\"".$row['lastname']."\" /> <br/><br/>
                            Email: <input type=\"text\" name=\"email\" value=\"".$row['email']."\" /> <br/><br/>
                            Status: <select name=\"user_status\" id=\"user_status\">
                                        <option value=\"Admin\">Admin</option>
                                        <option value=\"Customer\">Customer</option>
                                    </select><br/><br/>
                            <input class=\"input\" type=\"submit\" value=\"EDIT\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"user_management.php\">Back</a><br/><br/>";
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
   