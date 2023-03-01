<html>
<head>
    <title>My Order Detail - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .tr:hover {background-color: #fff8dc;}
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
            <td align="center" valign="center" >

                <center><table border="0" style="color:#917461">
                <tr><td>
                <center><font size="6.5em"><b>ORDER DETAIL</b><font></center> <br/><br/>
                </td></tr>
                <tr>
                    <td align="left"><a href="order_management.php" >Back</a><br/><br/>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width = "1200px" border = "0" bgcolor=#FFFFFF>
                            <tr bgcolor = #D1C0A8 height="50px" style="color:white;">
                                <th>Product ID</th>
                                <th></th>
                                <th width="100px">Product Name</th>
                                <th>Date Order</th>
                                <th width="100px">Price</th>
                                <th>Amount</th>
                                <th width="100px">Total</th>
                            </tr>
                            <?php
                                    include("connectDB.php");
                                    $o_id = $_REQUEST['o_id'];
                                    $sql = "SELECT * FROM orders INNER JOIN products ON orders.p_id = products.p_id AND orders.o_id = $o_id"
                                    or die("Error:" .mysqli_error());
                                    $result = mysqli_query($conn, $sql);
                                    
                                    while($row = mysqli_fetch_array($result)){ ?>
                            <tr class="tr" height="50px"><td align="center"><?php echo $row['p_id']; ?></td>
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