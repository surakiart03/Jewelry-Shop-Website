<html>
<head>
    <title>My Order Detail - 3 Tiger Armies | Jewals and Gems For You</title>
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
                    <tr>
                        <td width="100px"></td>
                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?PHP session_start();
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            } 
                            if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
                            if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
                            //ini_set('display_errors',0); // hide warning
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
                    <td align="left" style="font-size:25px"><b>ORDER DETAIL</b><br/><br/></td>
                    <td align="right"><a href="order.php?username=<?PHP echo $username ?>" >Back</a><br/><br/></td>
                
                </tr>
                <tr>
                    <td colspan="2">
                        <table width = "1000px" border = "0" bgcolor=#FFFFFF>
                            <tr bgcolor = #D1C0A8 height="50px" style="color:white;">
                                <?php
                                    $o_id = $_REQUEST['o_id'];
                                    $sql = "SELECT * FROM orders INNER JOIN products ON orders.p_id = products.p_id AND orders.o_id = $o_id AND orders.username ='$username'" 
                                    or die("Error:" .mysqli_error());
                                    $result = mysqli_query($conn, $sql);
                                ?>
                                <th></th>
                                <th>Product Name</th>
                                <th>Date Order</th>
                                <th width="100px">Price</th>
                                <th>Amount</th>
                                <th width="100px">Total</th>
                            </tr>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr class="tr" height="50px">
                                <td align="center" valign="center" width="250px"><img src="images/<?php echo $row['p_pic'] ?>" width="200px" height="200px"/></td>
                                <td><?php echo $row['p_name']; ?></td>
                                <td align="center"><?php echo $row['date_order']; ?></td>
                                <td align="center"><?php echo number_format($row['price']); ?></td>
                                <td align="center"><?php echo $row['amount']; ?></td>
                                <td align="center"><?php echo number_format($row['total']); ?></td>
                            </tr><?php } mysqli_close($conn); ?>
                        
                        </table>
                        <br/><br/><br/>
                    </td>
                </tr>
                </table></center>
            </td>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center" >Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>
    </table>

</body>
</html>