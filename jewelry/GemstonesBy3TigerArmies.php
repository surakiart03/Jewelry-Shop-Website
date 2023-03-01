<html>
<head>
    <title>GEMSTONES - 3 Tiger Armies | Jewals and Gems For You</title>
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
            <td align="center" valign="center" style="color:#917461;font-size:30px"><b>GEMSTONES</b></td>
        </tr>

        <tr height="50px">
            <td align="center">
                <table width="100%">
                    <tr align="center">
                        <form name="search" action="" method="get">
                        <td>Search by <select name="type_search" id="type_search">
                                            <option value="g_name">Name</option>
                                            <option value="g_color">Color</option>
                                            <option value="g_birth">Birth</option>
                                            <option value="g_zodiac">Zodiac</option>
                                            <option value="g_affirmention">Affirmention</option>
                                        </select>
                        
                        <input type="text" id="searching" name="searching" value="" />
                        
                        Sort by <select name="type_char" id="type_char" class="select-css">
                                <option value="asc">A to Z</option>
                                <option value="desc">Z to A</option>
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
                if($_GET['type_search'] == 'g_name') {
                    $g_name = $_GET['searching'];
                    $sql = "SELECT * FROM gemstones where g_name like '%". $g_name ."%' ORDER by g_name $type_char";
                }
                if($_GET['type_search'] == 'g_color'){
                    $g_color = $_GET['searching'];
                    $sql = "SELECT * FROM gemstones where g_color like '%". $g_color . "%' ORDER by g_color $type_char";
                }
                if($_GET['type_search'] == 'g_birth') {
                    $g_birth = $_GET['searching'];
                    $sql = "SELECT * FROM gemstones where g_birth like '%". $g_birth . "%' ORDER by g_birth $type_char";
                }
                if($_GET['type_search'] == 'g_zodiac') {
                    $g_zodiac = $_GET['searching'];
                    $sql = "SELECT * FROM gemstones where g_zodiac like '%". $g_zodiac . "%' ORDER by g_zodiac $type_char";
                }
                if($_GET['type_search'] == 'g_affirmention') {
                    $g_affirmention = $_GET['searching'];
                    $sql = "SELECT * FROM gemstones where g_affirmention like '%". $g_affirmention . "%' ORDER by g_affirmention $type_char";
                }

            }
        }else if ($_GET['type_char'] != '' and $_GET['searching'] == '') {
            $type_char = $_GET['type_char'];
            if($_GET['type_char'] == 'desc'){
                $sql = "SELECT * FROM gemstones ORDER by g_name $type_char";
            }else{
                $sql = "SELECT * FROM gemstones ORDER by g_name $type_char";
            }
        }else{
            $sql = "select * from gemstones";
        }
    }
 
    if($_GET['type_search'] == 'g_birth' and $_GET['searching']==''){
        if($_GET['category'] != '') {
            $g_birth = $_GET['category'];
            echo $g_birth;
            $sql = "SELECT * FROM gemstones where g_birth like $g_birth ORDER by g_birth $type_price";
        }
    }
 
    if(!isset($_GET['searching']) and !isset($_GET['g_birth'])) 
        {$sql = "select * from gemstones";}
        
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
                        if($column==1){
                            echo "<td class=\"td\" width=\"300px\"><img src=\"images/".$row['g_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['g_name']."</b><br/><br/>".
                            "Color: ".$row['g_color']."<br/>".
                            "Birth: ".$row['g_birth']."<br/>".
                            "Zodiac: ".$row['g_zodiac']."<br/>".
                            "<br/><i>\"".$row['g_affirmention']."\"</i><br/><br/></center></td>";}

                        if($column==2){
                            echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['g_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['g_name']."</b><br/><br/>".
                            "Color: ".$row['g_color']."<br/>".
                            "Birth: ".$row['g_birth']."<br/>".
                            "Zodiac: ".$row['g_zodiac']."<br/>".
                            "<br/><i>\"".$row['g_affirmention']."\"</i><br/><br/></center></td>";}

                        if($column==3){
                            echo "<td width=\"50px\"></td><td class=\"td\" width=\"300px\"><img src=\"images/".$row['g_pic']."\" width=\"300px\" height=\"300px\"/><br/><br/>".
                            "<center><b style=\"color:black;font-size:1.3em\">".$row['g_name']."</b><br/><br/>".
                            "Color: ".$row['g_color']."<br/>".
                            "Birth: ".$row['g_birth']."<br/>".
                            "Zodiac: ".$row['g_zodiac']."<br/>".
                            "<br/><i>\"".$row['g_affirmention']."\"</i><br/><br/></center></td></tr><tr height=\"30\" ></tr><tr valign=\"top\">";
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
        <tr height="50px">
        </tr>
        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>


    </table>            
</body>

</html>
