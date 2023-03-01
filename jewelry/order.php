<html>
<head>
    <title>My History - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .tr:hover {background-color: #fff8dc;}
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        select {
            padding: 5px 15px;
            border-color: #917461;
            background-color: #ffffff;
            color:#917461;
        }
        select:hover {
            outline:brown;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        select option {
            background-color: #ffffff;
            color:#917461;
            font-size:16px;
        }

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
                        <?php session_start();
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            }   
                            $username = $_REQUEST['username'];
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
                <tr><td colspan="2">
                <center><font size="6.5em"><b>MY HISTORY</b><font></center> <br/><br/>
                </td></tr>
                <tr>
                    <td><a href="userShop.php" >Back</a><br/><br/></td>
                
                </tr>
                <?php
                    $sql = "SELECT o_id, date_order, SUM(amount), SUM(total), address, order_status
                        FROM orders WHERE username = '$username' GROUP BY o_id, date_order" 
                        or die("Error:". mysqli_error());
                    $result = mysqli_query($conn, $sql);
                ?>

                <tr>
                <td colspan="2">
                        <table width = "1000px" border = "0" bgcolor=#FFFFFF>
                            <tr bgcolor = #D1C0A8 height="50px" style="color:white;">
                                <th width="150px">Order ID</th>
                                <th width="100px">Date Order</th>
                                <th width="100px">Amount</th>
                                <th width="100px">Total</th>
                                <th width="350px">Address</th>
                                <th width="100px">Order Status</th>
                                <th width="100px"></th>
                            </tr>
                            <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr class="tr" height="50px"><td align="center"><?php echo $row['o_id']; ?></td>
                                <td align="center"><?php echo $row['date_order']; ?></td>
                                <td align="center"><?php echo $row['SUM(amount)']; ?></td>
                                <td align="center"><?php echo number_format($row['SUM(total)']); ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <?php    if($row['order_status']=='placed'){ ?>
                                    <td align="center" ><font color="red"><b><?php echo $row['order_status']; ?></b></font></td>
                                    <?php }else if($row['order_status']=='sent'){ ?>
                                        <td align="center" ><font color="green"><b><?php echo $row['order_status']; ?></b></font></td>
                                    <?php }else{ ?>
                                        <td align="center" ><font color="#917461"><b><?php echo $row['order_status']; ?></b></font></td>
                                    <?php } ?>
                                <td align="center"><a href="view_order.php?o_id=<?PHP echo $row['o_id']; ?>
                                &username=<?PHP echo $username; ?>"><font color="#72a773">Detail</font></td>
                            </tr><?PHP } mysqli_close($conn);?>
                        </table>
                        <br/><br/><br/>
                </td>
                </tr>
                </table></center>
            </td>
        </tr>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center" >Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>

    </table>

</body>
</html>