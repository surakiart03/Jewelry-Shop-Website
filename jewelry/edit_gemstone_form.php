<html>
<head>
    <title>EDIT GEMSTONE - 3 Tiger Armies|Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
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
                    <br/><center><h2>EDIT GEMSTONE</h2></center> <br/><br/>
                    <form name="edit_gemstone_form" method="post" action="edit_gemstone.php" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php 
                        include("connectDB.php");
                         
                        $g_id = $_GET['g_id'];
                        $sql = "SELECT * FROM gemstones WHERE g_id = $g_id";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                        echo 
                            "
                            <img src = \"images/".$row['g_pic']."\" width=\"300\"><br/><br/>
                            Name: <input type=\"text\" name=\"g_name\" value=\"".$row['g_name']."\" /> <br/><br/>
                            Color: <input type=\"text\" name=\"g_color\" value=\"".$row['g_color']."\" /> <br/><br/>
                            Birth: <input type=\"text\" name=\"g_birth\" value=\"".$row['g_birth']."\" /> <br/><br/>
                            Zodiac: <input type=\"text\" name=\"g_zodiac\" value=\"".$row['g_zodiac']."\" /> <br/><br/>
                            Affirmention: <textarea row=\"4\" name=\"g_affirmention\" >".$row['g_affirmention']."</textarea> <br/><br/>
                            Picture: <input type=\"file\" name=\"g_pic\" value=\"".$row['g_pic']." accept=\"image/*\" required/> <br/><br/>
                            <input type=\"hidden\" name=\"g_id\" value=\"".$row['g_id']."\" /> 
                            <input type=\"hidden\" name=\"g_pic\" value=\"".$row['g_pic']."\" /> 
                            <input class=\"input\" type=\"submit\" value=\"EDIT\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"gemstones.php\">Back</a><br/><br/>";
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
   