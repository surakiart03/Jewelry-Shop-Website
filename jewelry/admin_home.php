<html>
<head>
    <title>HOME - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
            .button{
                background-color: #D1C0A8;
                border: none;
                color: white;
                padding: 10px 30px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
                width: 300px;
            }
            .button1:hover {
                background-color: #d3c0ac;
                text-decoration:underline;
                color: grey;
                font-style: italic;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            }

    </style>
</head>

<body>
    <a name="top"></a>
    <table border="0" width="100%" height="100%" bgcolor = #fcf7ef>
        <tr bgcolor = #D1C0A8>
            <td align="center" valign="center" >
                <?php include("menu.html"); ?>
            </td>
        </tr>
        <tr>
            <td >
                <table border="0" width="100%">
                    <tr height="100px"><td width="100px"></td>

                        <td align="right" valign="center" style="color:#917461;font-size:1.5em;">
                        <?php session_start();
                            if($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
                                echo"<script>alert('Please Login before Enter This Shop'); window.location='index.php'</script>";
                                exit();
                            }                   
                            if(isset($_SESSION['userName'])) echo "Welcome: " . $_SESSION['userName'];
                            if(isset($_SESSION['guest'])) echo "Welcome: " . $_SESSION['guest'];
                        ?>
                        <?php include("admin_tabwelcome.html"); ?>
                        </td>

                        <td width="100px"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>
            <table border="0" width="100%">
                
                <tr>
                    <td width="50%" align="right"><img src = "images/jewelsgems.jpg" alt = "Jewels and Gems" width = "100%"/></td>
                    <td width="50%" align="center"><h1>JEWELS & GEMS</h1><br/>
                        Each piece is individually hand-crafted and carefully hand-picked,<br/>
                        as we aspire to create a collection enhancing the beauty of natural / genuine stones <br/><br/>
                        We want you to find the perfect piece that you can wear as <br/>
                        a talisman, a lucky charm bringing you healing and prosperity.<br/><br/>
                    
                        <a href="adminShop.php"><button class="button button1">SEE OUR PRODUCTS</button></a>

                    </td>
                </tr>
                <tr>   
                    <td width="50%" align="center"><h1>Birthstone or Zodiac Stone</h1><br/>
                    The Birthstones collection gathers the Birthstones for each month of<br/>
                    the year, and allows you to channel your gemstone's unique energy.<br/><br/>
                    Each Zodiac collection gathers a selection of gemstones and healing <br/>
                    crystals to attract the unique energy that your Star sign is associated <br/>
                    with, in order to restore balance and live your life to the fullest<br/> potential.<br/><br/>

                    <a href="gemstones.php"><button class="button button1">SEE YOUR GEMSTONES</button></a>

                    </td>
                    <td width="50%"><img src = "images/jew.jpg" alt = "Jewely" width = "100%"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><br/><br/><br/><h1>Shop With Us</h1><br/><br/><br/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><img src = "images/ring.jpg" alt = "ring" width = "300px" height = "300px"/>
                    <img src = "images/ring2.jpg" alt = "ring" width = "300px" height = "300px"/>
                    <img src = "images/pendant.jpg" alt = "pendant" width = "300px" height = "300px"/>
                    <img src = "images/pendant2.jpg" alt = "pendant" width = "300px" height = "300px"/><br/>
                    <img src = "images/earring.jpg" alt = "earring" width = "300px" height = "300px"/>
                    <img src = "images/earring2.jpg" alt = "earring" width = "300px" height = "300px"/>
                    <img src = "images/earring3.jpg" alt = "earring" width = "300px" height = "300px"/>
                    <br/><br/><br/><br/><br/></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><a href ="#top"><img src = "images/gototop.png" alt = "go_to_top" width = "50px" height = "50px"/></a>
                    <br/><br/></td>
                <tr>
            </table>
        </td></tr>


        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>


    </table>            
</body>

</html>
