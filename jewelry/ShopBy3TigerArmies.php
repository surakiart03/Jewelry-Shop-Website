<html>
<head>
    <title>SHOP - 3 Tiger Armies | Jewals and Gems For You</title>
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
            <td align="center" valign="center" ><a href="index.php" ><img src = "images/logo.png" alt = "Logo - 3 Tiger Armies" width = "350px"/></a><br/>
            <font size="2em"><a href="GemstonesBy3TigerArmies.php" >GEMSTONES</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ShopBy3TigerArmies.php" >SHOP</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Login.html" >LOG IN TO SHOP NOW</a><br/><br/>
            </td>
        </tr>
        <tr height="30px">
            <td></td>
        </tr>
        <tr height="100px">
            <td align="center" valign="bottom" style="color:#917461;font-size:30px"><b>JEWELS AND GEMS FOR YOU</b><br/>
            </td>
        </tr>
        <tr height="50px">
            <td align="center" valign="center"><a href="Shopby3TigerArmies.php">All</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="EarringShop.php">Earrings</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="RingShop.php">Rings</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="PendentShop.php">Pendents</a> <br/>
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
                    $sql = "SELECT * FROM products where p_name like '%". $g_name ."%' ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_gem') {
                    $g_name = $_GET['searching'];
                    $sql = "SELECT * FROM products where p_gem like '%". $g_name ."%' ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_color'){
                    $g_color = $_GET['searching'];
                    $sql = "SELECT * FROM products where p_color like '%". $g_color . "%' ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_birth') {
                    $g_birth = $_GET['searching'];
                    $sql = "SELECT * FROM products where p_birth like '%". $g_birth . "%' ORDER by p_price $type_char";
                }
                if($_GET['type_search'] == 'p_zodiac') {
                    $g_zodiac = $_GET['searching'];
                    $sql = "SELECT * FROM products where p_zodiac like '%". $g_zodiac . "%' ORDER by p_price $type_char";
                }


            }
        }else if ($_GET['type_char'] != '' and $_GET['searching'] == '') {
            $type_char = $_GET['type_char'];
            if($_GET['type_char'] == 'desc'){
                $sql = "SELECT * FROM products ORDER by p_price $type_char";
            }else{
                $sql = "SELECT * FROM products ORDER by p_price $type_char";
            }
        }else{
            $sql = "select * from products";
        }
    }
 
    if($_GET['type_search'] == 'p_birth' and $_GET['searching']==''){
        if($_GET['category'] != '') {
            $g_birth = $_GET['category'];
            echo $g_birth;
            $sql = "SELECT * FROM products where p_birth like $g_birth ORDER by p_birth $type_price";
        }
    }
 
    if(!isset($_GET['searching']) and !isset($_GET['p_birth'])) 
        {$sql = "select * from products";}
        
       $result = mysqli_query($conn, $sql);
 ?>

 <!------------------------------------------------------------------------------------------------>
 <tr bgcolor = #fcf7ef>
            <td align="center" valign="center" >
                <table border="0"  width="0" valign="top" style="color:#917461;font-size:1.2em">
                <?php
                   $column = 0;
                   $count = 0;
                   echo "<tr valign=\"top\" height=\"50px\"></tr><tr valign=\"top\" >";
                   while($row = mysqli_fetch_array($result)){
                       $column +=1;
                       $price=$row['p_price'];
                       if($column==1){
                           echo "<td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                           "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                           "Gemstone: ".$row['p_gem']."<br/>".
                           "Type: ".$row['p_type']."<br/>".
                           "Color: ".$row['p_color']."<br/>".
                           "Birth: ".$row['p_birth']."<br/>".
                           "Zodiac: ".$row['p_zodiac']."<br/><br/>".
                           "<b>Price: ".number_format($price)." baht</b><br/>";?>
                           
                           <br/><br/></td>
                        <?php }
                       if($column==2){
                           echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                           "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                           "Gemstone: ".$row['p_gem']."<br/>".
                           "Type: ".$row['p_type']."<br/>".
                           "Color: ".$row['p_color']."<br/>".
                           "Birth: ".$row['p_birth']."<br/>".
                           "Zodiac: ".$row['p_zodiac']."<br/><br/>".
                           "<b>Price: ".number_format($price)." baht</b><br/>";?>
                           
                           <br/><br/></td>
                        <?php }
                        if($column==3){
                            echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['p_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['p_name']."</b></center><br/>".
                            "Type: ".$row['p_type']."<br/>".
                            "Gem: ".$row['p_gem']."<br/>".
                            "Color: ".$row['p_color']."<br/>".
                            "Birth: ".$row['p_birth']."<br/>".
                            "Zodiac: ".$row['p_zodiac']."<br/><br/>".
                            "<b>Price: ".number_format($row['p_price'])." baht</b><br/></td></tr><tr height=\"30\" ></tr><tr valign=\"top\">";
                            $column = 0;
                        ?>
                           
                           <br/><br/></td></tr><tr height="30" ></tr><tr valign="top">
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
