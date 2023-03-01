<html>
<head>
    <title>User Management - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .tr:hover {background-color: #fff8dc;}
        .td:hover {background-color: #fff8dc;}
    </style>
</head>

<body>
    <table border="0" width="100%" height="100%" bgcolor = #fcf7ef>
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
        <tr bgcolor = #fcf7ef>
            <td align="center" valign="center" ><center><table border="0" style="color:#917461"><tr><td>
                
                    <center><h2>USER MANAGEMENT</h2></center> <br/><br/> </td></tr>
                    <tr><td align="left"><a href="gemstones.php">Back</a><br/><br/></tr>
                    <tr><td>
                            <table width = "1200px" border="0.5" bgcolor=#FFFFFF>
                                <tr height="30px" style="color:#FFFFFF" bgcolor=#D1C0A8 >
                                    <th> User ID </th>
                                    <th> Username </th>
                                    <th> Password </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Status </th>
                                    <th></th>
                                </tr>

                            <?php
                                ini_set('display_errors',0); // hide warning
                                include("connectDB.php");

                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr class=\"tr\" height=\"30px\"><td align=\"center\">".$row['user_id']."</td>
                                    <td>".$row['userName']."</td>
                                    <td>".$row['passWord']."</td>
                                    <td>".$row['firstname']." ".$row['lastname']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['user_status']."</td><td width=\"150\">"; ?>
                                
                                    <a href="edit_user_form.php?user_id=<?php echo $row['user_id'] ?>"><font color=#72a773>EDIT</font></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="delete_user.php?user_id=<?php echo $row['user_id'] ?>"><font color=#db0909>DELETE</font></a>
                                    </td></tr>
                            <?php
                                }
                                mysqli_close($conn);
                            ?>
                            </table><br/><br/><br/>
                </td></tr></table>
            </td>    
        </tr>                    
        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center" >Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>


    </table>
</body>

</html>