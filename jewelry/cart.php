<html>
<head>
    <title>My Cart - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .tr:hover {background-color: #fff8dc;}
    </style>
</head>

<body>
    <table border="0" width="100%" height="100%" bgcolor = #fcf7ef>
        <tr bgcolor = #D1C0A8>
            <td align="center" valign="center" >
            <?php include("user_menu.html"); ?>
            </td>
        </tr>
        
        <tr>
            <td >
                <table border="0" width="100%">
                    <tr height="100px">
                        <td width="100px"></td>
                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?PHP session_start();
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            }   
                            if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
                            ini_set('display_errors',0); // hide warning
                            include("connectDB.php");
                        ?>
                            <?php include("tabwelcome.html"); ?>

                        </td>
                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr bgcolor = #fcf7ef>
            <td align="center" valign="center" >
                <center><table border="0" style="color:#917461">
                    <tr>
                        <td align="center"><font size="6.5em"><b>MY CART</b><font><br/><br/></td>
                    </tr>

                    <tr>
                        <td align="left"><a href="userShop.php" >Back</a><br/><br/></td>
                    </tr>

                    <tr>
                        <td><table width = "1200px" border="0" bgcolor=#FFFFFF>
                            <tr height="50px" style="color:#FFFFFF" bgcolor=#D1C0A8 >
                                <th></th>
                                <th> Name </th>
                                <th> Detail </th>
                                <th width="100"> Amount </th>
                                <th width="100"> Price </th>
                                <th width="100"> Total </th>
                                <th width="100"></th>
                            </tr>
                            
                                <?php
                                    if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
                                    if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
                                    $amount = $_REQUEST['amount'];

                                    if($amount == 0){
                                        echo "<tr><td colspan=\"7\" align=\"center\"><br/><br/><br/><font align=\"center\" size=\"150px\" color=\"gray\"><b>HAVE&nbsp;&nbsp;NO&nbsp;&nbsp;PRODUCTS&nbsp;&nbsp;IN&nbsp;&nbsp;MY&nbsp;&nbsp;CART!</b><br/><br/></font></td></tr>";
                                    }else{
                                        $sql = "SELECT * FROM cart INNER JOIN products ON cart.p_id = products.p_id AND cart.username = '$username'" 
                                            or die("Error:" . mysqli_error());
                                        $result = mysqli_query($conn, $sql);
                                    }              
                                        $total = 0;
                                        while($row = mysqli_fetch_array($result)){
                                ?>
                            <tr class="tr">
                                <td align="center"><img src="images/<?php echo $row['p_pic'] ?>" height="200" width="200"/></td>
                                <td><?php echo $row['p_name']?></td>
                                <td><?php echo $row['p_gem']?><br/>Type: <?php echo $row['p_type'] ?><br/>Color: <?php echo $row['p_color'] ?><br/>Birth: <?php echo $row['p_birth'] ?><br/>Zodiac: <?php echo $row['p_zodiac'] ?><br/><br/></td>
                                <td align="center"><?php echo $row['amount']?></td>
                                <td align="center"><?php echo number_format($row['p_price'])?></td>
                                <td align="center"><?php echo number_format($row['total'])?></td>
                                <?php $total= $total+$row['total']; ?>
                                <td align="center"><a href="delete_product_in_cart.php?cart_id=<?php echo $row['cart_id'] ?>"><font color=#db0909>DELETE</font></a></td>
                            </tr>
                                <?php }?>
                        </table></td>
                    </tr>
                        <tr height="30px"></tr>

                        <tr>
                            <td align="right">
                                <form name="cancel" action= "cancel_all_in_cart.php" method="GET">
                                    <input type="hidden" name="username" value="<?PHP echo $username;?>" />
                                    <button class="input" type ="submit" name="cancel" 
                                    style="background-color: #e05d5d;color:white;border:none;padding:10px 25px;width:120px;cursor: pointer;">
                                    Cancel All</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><font size="5px"><b>Total Price</b></font></h3><br/><font size="5em"><?php echo number_format($total) ?></font> BAHT
                            <br/><br/>
                            </td>
                        </tr>

                        <form name="placorder" action= "place_order.php" method="GET">
                        <tr>
                            <td align="center"><font size="3px"><b>Please Enter Your Address</b></font></h3><br/>
                            <textarea  name="user_address" rows="5" cols="40"></textarea>
                            <br/><br/>
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><font size="3px"><b>Please Enter Your Credit/Debit Number</b></font></h3><br/>
                            <input type="text" name="card_number" cols="40">
                            <br/><br/>
                            </td>
                        </tr>

                        <tr>
                                <td align="center"><input type="hidden" name="username" value="<?PHP echo $username;?>" />
                                <input type="hidden" name="date_order" value="<?PHP echo date("Y-m-d")?>" />
                                <input type="hidden" name="total" value="<?PHP echo $total;?>" />
                                <input type="hidden" name="order_status" value="Placed" />
                                <button class="input" type ="submit" name="place" 
                                style="background-color: #72a773;color:white;border:none;padding:10px 25px;cursor: pointer;">
                            PLACE ORDER</button>
                            </td>
                        </tr>
                        </form>
                        
                        </table></center><br/><br/><br/></td>
                    </tr>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center" >Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>
    </table>
</body>
</html>