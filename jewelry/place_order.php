<html>
<head>
    <title>Place Order - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .button4:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .tr:hover {background-color: #fff8dc;}
    </style>
</head>
<body>
 
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
                    <tr height ="100px">
                        <td width="100px"></td>
                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?PHP session_start();
                            ini_set('display_errors',0); // hide warning
                            include("connectDB.php");
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            }  
                            $_SESSION['refresh'] = 0;
                            if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];

                            if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
                        ?>
                            <?php include("tabwelcome.html"); ?>
                        </td>
                        
                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style="color:#917461" >
            <td align="center" valign="center" >

            <center><table border="0" style="color:#917461">
            <tr><td>
                <center><font size="6.5em"><b>MY ORDER</b><font></center> <br/><br/>
            </td></tr>

        <tr><td>
            <?php
                $p_id = $_REQUEST['p_id'];
                $date_order = $_REQUEST['date_order'];
                $amount = $_REQUEST['amount'];
                $total = $_REQUEST['total'];
                $order_status = $_REQUEST['order_status'];
                $card_number = $_REQUEST['card_number'];
                $user_address = $_REQUEST['user_address'];

                $i = 0; $j =0;
                $array_p_name = array();
                $array_amount = array();
                $array_total = array();
                $array_price = array();

                $sql = "select * from cart inner join products on cart.p_id = products.p_id and cart.username =
                '$username'" or die("Error:" . mysqli_error());
                $result = mysqli_query($conn, $sql);
                if(!$result) {echo "Can not Show Data"; }
                $total = 0;
            ?>
            <table width ="1150" align="center" bgcolor="#FFFFFF">

            <tr bgcolor="#D1C0A8" height="50" style="color:white;">
                <th></th>
                <th>Name</th>
                <th>Detail</th>
                <th>Amount</th>
                <th width="100px">Price</th>
                <th width="100px">Total</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr class="tr">
                <td align="center" valign="center"><img src = "<?PHP echo "images/".$row['p_pic']; ?>" height="200" width="200"></td>
                <td><?PHP echo $row['p_name']; ?></td>
                <td><?php echo $row['p_gem'] ; ?><br/>Type: <?php echo $row['p_type']; ?><br/>Color: <?php echo $row['p_color']; ?><br/>Birth: <?php echo $row['p_birth'] ?><br/>Zodiac: <?php echo $row['p_zodiac'] ?><br/><br/></td>
                <td align="center"><?PHP echo $row['amount']; ?></td>
                <td align="center"><?PHP echo $row['p_price']; ?></td>
                <td align="center"><?PHP echo $row['total']; ?></td>
            </tr>
            <?php
                $array_p_id[$i] = $row['p_id'];
                $array_p_name[$i] = $row['p_name'];
                $array_amount[$i] = $row['amount'];
                $array_total[$i] = $row['total'];
                $array_p_price[$i] = $row['p_price'];
                $array_p_stock[$i] = $row['p_stock'];
                $total = $total+$row['total'];
                $i++;
                }
            ?>
            <tr style="font-size:1.4em;font-weight: bold;">
                <td colspan="4" style="text-align:right;">
                    <?PHP echo "Total Price: "; ?>
                </td >
                <td>
                    <?PHP echo number_format($total). " Baht"; ?>
                </td>
            </tr>
            </table>
            <br><br>

            <?PHP
                // select the last order id from orders
                $sql_statement = "SELECT * FROM orders order by o_id desc LIMIT 1";
                $result2 = mysqli_query($conn, $sql_statement);
                if ($result2) echo $o_id;
                while($r2 = mysqli_fetch_array($result2)){
                $o_id = $r2['o_id'];
                //echo $r2['o_id'];
                }
                // insert to orders
                if($i > 0){
                    for($j = 0; $j < $i; $j++) {
                        $sql_insert = "Insert into orders (o_id, p_id, p_name, username, date_order, price, amount, total, address, card_number, order_status)
                                        Values($o_id+1, $array_p_id[$j], '$array_p_name[$j]', '$username', '$date_order', $array_p_price[$j], $array_amount[$j], $array_total[$j],'$user_address', '$card_number', 'placed')";
                        $rs2 = mysqli_query($conn, $sql_insert);
                        
                        if (!$rs2) echo "can not add: $o_id";

                        // update products cal amount of stock
                        $sql_Update = "Update products SET p_stock=$array_p_stock[$j]-$array_amount[$j]
                                        WHERE p_id = $array_p_id[$j]";
                        $rs_Update = mysqli_query($conn, $sql_Update);
                    }
                    echo "<script>alert('Place Order Successful'); </script>";
                    // delete on cart where username = $username after placed orders
                    $sql_delete = "Delete from cart WHERE username = '$username'";
                    if($j >0) {
                        $rs3 = mysqli_query($conn, $sql_delete);
                        if (!$rs3) echo "can not delete";
                    }
                }
            ?>
        </tr>
    
        <tr>
            <td align="right"><a href="userShop.php"><button class="button4" style="background-color: #72a773;color:white;border:none;padding:10px 25px;width:120px;cursor: pointer;">
                Okay</button></a>
            </td>
        </tr>

        </table></center></td></tr>
        <tr height="100px" >
            <td></td>
        </tr>
        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center" >Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>
    </table>
</body>
</html>
