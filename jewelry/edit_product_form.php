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
                    <br/><center><h2>EDIT PRODUCT</h2></center> <br/><br/>
                    <form name="edit_product_form" method="post" action="edit_product.php" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php 
                        include("connectDB.php");
                         
                        $p_id = $_GET['p_id'];
                        $sql = "SELECT * FROM products WHERE p_id = $p_id";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo 
                            "
                            <img src = \"images/".$row['p_pic']."\" width=\"300\"><br/><br/>
                            Name: <input type=\"text\" name=\"p_name\" value=\"".$row['p_name']."\" /> <br/><br/>
                            Gemstone: <input type=\"text\" name=\"p_gem\" value=\"".$row['p_gem']."\" /> <br/><br/>
                            Type: <input type=\"text\" name=\"p_type\" value=\"".$row['p_type']."\" /> <br/><br/>
                            Color: <input type=\"text\" name=\"p_color\" value=\"".$row['p_color']."\" /> <br/><br/>
                            Birth: <input type=\"text\" name=\"p_birth\" value=\"".$row['p_birth']."\" /> <br/><br/>
                            Zodiac: <input type=\"text\" name=\"p_zodiac\" value=\"".$row['p_zodiac']."\" /> <br/><br/>
                            Picture: <input type=\"file\" name=\"p_pic\" value=\"".$row['p_pic']." accept=\"image/*\" required/> <br/><br/>
                            Price: <input type=\"text\" name=\"p_price\" value=\"".$row['p_price']."\"  style=\"width:100px;\"/> Baht <br/><br/>
                            Stock: <input type=\"text\" name=\"p_stock\" value=\"".$row['p_stock']."\" style=\"width:50px;\" /> EA <br/><br/>
                            <input class=\"input\" type=\"submit\" value=\"EDIT\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"adminShop.php\">Back</a><br/><br/>
                            <input type=\"hidden\" name=\"p_id\" value=\"".$row['p_id']."\" /> <br/><br/>
                            <input type=\"hidden\" name=\"p_pic\" value=\"".$row['p_pic']."\" /> <br/><br/>";
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
   