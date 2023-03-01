<html>
<head>
    <title>Order Management - 3 Tiger Armies | Jewals and Gems For You</title>
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
                
                <center><h2>ORDER MANAGEMENT</h2></center> <br/><br/> </td></tr>
                <tr><td align="left"><a href="gemstones.php">Back</a><br/><br/></tr>
                
                <tr><td>
                            <table width = "1300px" border="0.5" bgcolor=#FFFFFF>
                                <tr height="30px" style="color:#FFFFFF" bgcolor=#D1C0A8 >
                                    <th width="100"> Order ID </th>
                                    <th width="100"> Username </th>
                                    <th width="150"> Date Order </th>
                                    <th width="100"> Amount </th>
                                    <th width="100"> Total </th>
                                    <th> Address </th>
                                    <th width="100"> Status </th>
                                    <th width="150"> Change Status </th>
                                    <th width="100"></th>
                                    <th width="100"></th>
                                </tr>

                            <?php
                                ini_set('display_errors',0); // hide warning
                                include("connectDB.php");

                                $sql = "SELECT o_id, username, date_order, SUM(amount), SUM(total), address, order_status
                                        FROM orders GROUP BY o_id, date_order" or die("Error:" . mysqli_error());
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_array($result)){ ?>
                                <tr class="tr" height="50px"><td align="center"><?php echo $row['o_id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td align="center"><?php echo $row['date_order'] ?></td>
                                    <td align="center"><?php echo $row['SUM(amount)'] ?></td>
                                    <td align="center"><?php echo number_format($row['SUM(total)']) ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td align="center">
                                    <?php    if($row['order_status']=='placed'){ ?>
                                    <font color="red"><b><?php echo $row['order_status'] ?></b></font></td>
                                    <?php }else if($row['order_status']=='sent'){ ?>
                                    <font color="green"><b><?php echo $row['order_status'] ?></b></font></td>
                                    <?php }else{ ?>
                                    <font color="#917461"><b><?php echo $row['order_status'] ?></b></font></td>
                                    <?php } ?>
                                    <form name ="update_order_status_form" method="get" action = "update_order_status.php">
                                        <input type ="hidden" name="o_id" value=<?PHP echo $row['o_id']; ?> />
                                    
                                    <td align="center"><select name="order_status" id="order_status">
                                            <option value="paid">paid</option>
                                            <option value="processing">processing</option>
                                            <option value="sent">sent</option>
                                        </select></td>
                                    <td><input class="input" type="submit" value="UPDATE" style="padding: 5px 15px;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </form>
                                    
                                    <input type ="hidden" name="o_id" value=<?PHP echo $row['o_id']; ?> />
                                    
                                    <a href="delete_order.php?o_id=<?php echo $row['o_id'] ?>"><font color=#db0909>DELETE</font></a></td>
                                    
                                    <td align="center"><a href="admin_view_order.php?o_id=<?PHP echo $row['o_id']; ?>"><font color="#72a773">Detail</font></td>
                                </tr>
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