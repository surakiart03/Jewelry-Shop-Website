<html>
<head>
    <title>RINGS - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .button2{
            background-color: #D1C0A8;
            border: none;
            color: white;
            padding: 5px 15px;
            text-align:center;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button3:hover {
            background-color: #d3c0ac;
            text-decoration:underline;
            text-align:center;
            color: grey;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .td:hover{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            background-color: #fff8dc;
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
    <table border="0" width="100%" height="100%" bgcolor = #fcf7ef>
        <tr bgcolor = #D1C0A8>
            <td align="center" valign="center" >
            <?php include("user_menu.html"); ?>
            </td>
        </tr>
        <tr>
            <td >
                <table border="0" width="100%">
                    <tr height="100px"><td width="100px"></td>
                        <?php session_start();
                            ini_set('display_errors',0); // hide warning
                            include("connectDB.php");
                            $cnt_amount = 0;
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            }   
                            if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];
                            $sql2 = "select * from cart WHERE username = '$username'" or die("Error:" .
                            mysqli_error());
                            $result2 = mysqli_query($conn, $sql2);
                            while($rs2 = mysqli_fetch_array($result2)){
                                $cnt_amount = $cnt_amount + $rs2['amount'];
                            }
                            //echo " ". $cnt_amount;
                            if(!$result2) {echo "Can not Show Data"; }
                        ?>
                        <?php include("tabcart.php"); ?>

                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?php session_start();
                            if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
                        ?>
                        <?php include("tabwelcome.html"); ?>
                        </td>

                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30px">
            <td></td>
        </tr>
        <tr height="50px">
            <td align="center" valign="center" style="color:#917461;font-size:30px"><b>JEWELS AND GEMS FOR YOU</b>
            </td>
        </tr>
        <tr height="50px">
            <td align="center" valign="center"><a href="userShop.php">All</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="userEarringShop.php">Earrings</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="userRingShop.php">Rings</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="userPendentShop.php">Pendents</a> <br/>
            <br/></td>
        </tr>
        <tr height="30px">
            <td></td>
        </tr>

        <tr height="50px">
            <td align="center">
                <table width="100%">
                    <tr align="center">
                        <form name="search" action="" method="get">
                        <td>Search by <select name="type_search" id="type_search">
                                            <option value="p_name">Name</option>
                                            <option value="p_gem">Gem</option>
                                            <option value="p_color">Color</option>
                                            <option value="p_birth">Birth</option>
                                            <option value="p_zodiac">Zodiac</option>
                                        </select>
                        
                        <input type="text" id="searching" name="searching" value="" />

                        Sort by <select name="type_char" id="type_char">
                                <option value="asc">Ascending price</option>
                                <option value="desc">Descending price</option>
                            </select>
                        <button class="button2 button3" type="submit" >SEARCH</button></p></td>
                        </form>
                    </tr>
                </table>
            </td>
        </tr>


<!-------------------------------------------------PHP SEARCH------------------------->

<?PHP

    ini_set('display_errors',0); // hide warning
    include("connectDB.php");

    if(isset($_GET['searching'])){
        if($_GET['searching'] != '') {
            if(isset($_GET['type_search'])) {
                $type_price = $_GET['type_char'];
                if($_GET['type_search'] == 'p_name') {
                    $g_name = $_GET['searching'];
                    $sql = "SELECT * FROM products 
                            WHERE p_name like '%". $g_name ."%' AND p_type='Ring' 
                            ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_gem') {
                    $g_name = $_GET['searching'];
                    $sql = "SELECT * FROM products 
                            WHERE p_gem like '%". $g_name ."%' AND p_type='Ring' 
                            ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_color'){
                    $g_color = $_GET['searching'];
                    $sql = "SELECT * FROM products 
                            WHERE p_color like '%". $g_color . "%' AND p_type='Ring' 
                            ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_birth') {
                    $g_birth = $_GET['searching'];
                    $sql = "SELECT * FROM products 
                            WHERE p_birth like '%". $g_birth . "%' AND p_type='Ring' 
                            ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_zodiac') {
                    $g_zodiac = $_GET['searching'];
                    $sql = "SELECT * FROM products 
                            WHERE p_zodiac like '%". $g_zodiac . "%' AND p_type='Ring' 
                            ORDER by p_price $type_char";
                }


            }
        }else if ($_GET['type_char'] != '' and $_GET['searching'] == '') {
            $type_char = $_GET['type_char'];
            if($_GET['type_char'] == 'desc'){
                $sql = "SELECT * FROM products 
                        WHERE p_type='Ring' 
                        ORDER by p_price $type_char";
            }else{
                $sql = "SELECT * FROM products 
                        WHERE p_type='Ring' 
                        ORDER by p_price $type_char";
            }
        }else{
            $sql = "SELECT * FROM products WHERE p_type='Ring' ";
        }
    }
 
    if($_GET['type_search'] == 'p_birth' and $_GET['searching']==''){
        if($_GET['category'] != '') {
            $g_birth = $_GET['category'];
            echo $g_birth;
            $sql = "SELECT * FROM products 
                    WHERE p_birth like $g_birth AND p_type='Ring' 
                    ORDER by p_birth $type_price";
        }
    }
 
    if(!isset($_GET['searching']) and !isset($_GET['p_birth'])) 
        {$sql = "SELECT * FROM products WHERE p_type='Ring' ";}
        
       $result = mysqli_query($conn, $sql);
 ?>

 <!------------------------------------------------------------------------------------------------>
 <tr bgcolor = #fcf7ef>
            <td align="center" valign="center" >
                <table border="0"  width="0" valign="top" style="color:#917461;font-size:1.2em">
                
                <?php
                    $column = 0;
                    $count = 0;
                    echo "<tr valign=top height=50px></tr><tr valign=top >";
                    while($row = mysqli_fetch_array($result)){
                        $column +=1;
                        $price=$row['p_price'];
                        $stock=$row['p_stock'];
                        if($column==1){
                            echo "<td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                            "Gemstone: ".$row['p_gem']."<br/>".
                            "Type: ".$row['p_type']."<br/>".
                            "Color: ".$row['p_color']."<br/>".
                            "Birth: ".$row['p_birth']."<br/>".
                            "Zodiac: ".$row['p_zodiac']."<br/>".
                            "<br/>Stock: ";
                            if($row['p_stock']==0){
                                echo "<font color=\"red\"><b>Out of stock</b></font><br/>";
                            }else{
                                echo $row['p_stock']."<br/>";
                            }
                                
                            echo "<b>Price: ".number_format($price)." baht</b><br/>";
                            ?>
                        
                        <form method="get" action="add_to_cart.php">
                        
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ?>"/>
                        <input type="hidden" name="p_name" value="<?php echo $row['p_name']?>"/>
                        <input type="hidden" name="p_gem" value="<?php echo $row['p_gem']?>"/>
                        <input type="hidden" name="p_type" value="<?php echo $row['p_type']?>"/>
                        <input type="hidden" name="p_color" value="<?php echo $row['p_color']?>"/>
                        <input type="hidden" name="p_birth" value="<?php echo $row['p_birth']?>"/>
                        <input type="hidden" name="p_zodiac" value="<?php echo $row['p_zodiac']?>"/>
                        <input type="hidden" name="p_stock" value="<?php echo $row['p_stock']?>"/>
                        <input type="hidden" name="p_price" value="<?php echo $row['p_price']?>"/>
                        
                        <?php if($stock>0){ ?>
                        <br/><center><b>AMOUNT:</b> <input type="number" name="amount" placeholder="1" maxlength="3" required min="1" max="<?php echo $stock ?>" value="1" /> EA <br/>
                        
                        <input class="input" type="submit" value="ADD TO CART" /></center>
                        
                        </form></td> 
                        <?php } 
                        }

                        if($column==2){
                            echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                            "Gemstone: ".$row['p_gem']."<br/>".
                            "Type: ".$row['p_type']."<br/>".
                            "Color: ".$row['p_color']."<br/>".
                            "Birth: ".$row['p_birth']."<br/>".
                            "Zodiac: ".$row['p_zodiac']."<br/>".
                            "<br/>Stock: ";
                            if($row['p_stock']==0){
                                echo "<font color=\"red\"><b>Out of stock</b></font><br/>";
                            }else{
                                echo $row['p_stock']."<br/>";
                            }
                            echo "<b>Price: ".number_format($price)." baht</b><br/>";?>
                        
                        <form method="get" action="add_to_cart.php">
                        
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ?>"/>
                        <input type="hidden" name="p_name" value="<?php echo $row['p_name']?>"/>
                        <input type="hidden" name="p_gem" value="<?php echo $row['p_gem']?>"/>
                        <input type="hidden" name="p_type" value="<?php echo $row['p_type']?>"/>
                        <input type="hidden" name="p_color" value="<?php echo $row['p_color']?>"/>
                        <input type="hidden" name="p_birth" value="<?php echo $row['p_birth']?>"/>
                        <input type="hidden" name="p_zodiac" value="<?php echo $row['p_zodiac']?>"/>
                        <input type="hidden" name="p_stock" value="<?php echo $row['p_stock']?>"/>
                        <input type="hidden" name="p_price" value="<?php echo $row['p_price']?>"/>
                        
                        <?php if($stock>0){ ?>
                        <br/><center><b>AMOUNT:</b> <input type="number" name="amount" placeholder="1" maxlength="3" required min="1" max="<?php echo $stock ?>" value="1" /> EA <br/>
                        
                        <input class="input" type="submit" value="ADD TO CART" /></center>

                        </form></td>
                        <?php } 
                        }
                        
                        if($column==3){
                           echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                           "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                           "Gemstone: ".$row['p_gem']."<br/>".
                           "Type: ".$row['p_type']."<br/>".
                           "Color: ".$row['p_color']."<br/>".
                           "Birth: ".$row['p_birth']."<br/>".
                           "Zodiac: ".$row['p_zodiac']."<br/>".
                           "<br/>Stock: ";
                            if($row['p_stock']==0){
                                echo "<font color=\"red\"><b>Out of stock</b></font><br/>";
                            }else{
                                echo $row['p_stock']."<br/>";
                            }
                           
                           echo "<b>Price: ".number_format($price)." baht</b><br/>";?>

                        <form method="get" action="add_to_cart.php">
                        
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id'] ?>"/>
                        <input type="hidden" name="p_name" value="<?php echo $row['p_name']?>"/>
                        <input type="hidden" name="p_gem" value="<?php echo $row['p_gem']?>"/>
                        <input type="hidden" name="p_type" value="<?php echo $row['p_type']?>"/>
                        <input type="hidden" name="p_color" value="<?php echo $row['p_color']?>"/>
                        <input type="hidden" name="p_birth" value="<?php echo $row['p_birth']?>"/>
                        <input type="hidden" name="p_zodiac" value="<?php echo $row['p_zodiac']?>"/>
                        <input type="hidden" name="p_stock" value="<?php echo $row['p_stock']?>"/>
                        <input type="hidden" name="p_price" value="<?php echo $row['p_price']?>"/>
                        
                        <?php if($stock>0){ ?>
                        <br/><center><b>AMOUNT:</b> <input type="number" name="amount" placeholder="1" maxlength="3" required min="1" max="<?php echo $stock ?>" value="1" /> EA <br/>
                        
                        <input class="input" type="submit" value="ADD TO CART" /></center>
                        <?php } ?>
                        </form></td></tr><tr height="30" ></tr><tr valign="top">
                    <?php
                            $column = 0;
                        }
                        $count +=1;
                    }
                    if($count == 0){ 
                        echo "<br/><br/><br/><font align=\"center\" size=\"150px\" color=\"gray\"><b>SEARCH&nbsp;&nbsp;WAS&nbsp;&nbsp;NOT&nbsp;&nbsp;FOUND!</b></font>";
                    }
                    mysqli_close($conn);
                    //echo "</tr>";
                ?>
                </table>
            </td>
        </tr>
        <tr height="50px" bgcolor = #D1C0A8>
        </tr>
        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>


    </table>            
</body>

</html>