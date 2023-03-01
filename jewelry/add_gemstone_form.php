<html>
<head>
    <title>Add Gemstone - 3 Tiger Armies | Jewals and Gems For You</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <style>
        .input[type=submit]:hover {
            text-decoration:underline;
            text-align:center;
            font-style: italic;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
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

        <tr height="500px" bgcolor = #fcf7ef>
            <td align="center" valign="center" ><center><table border="0" style="color:#917461"><tr><td>
                <form name="add_gemstone_form" method=post action="add_gemstone.php" accept-charset="utf-8" enctype="multipart/form-data">
                    <center><h2>ADD GEMSTONE</h2></center> <br/><br/>
                    Name: <input type="text" name="g_name" /> <br/><br/>
                    Color: <input type="text" name="g_color" /> <br/><br/>
                    Birth: <select name="g_birth">
                                <option value = "">None</option>
                                <option value = "January">January</option>
                                <option value = "February">February</option>
                                <option value = "March">March</option>
                                <option value = "April">April</option>
                                <option value = "May">May</option>
                                <option value = "June">June</option>
                                <option value = "July">July</option>
                                <option value = "August">August</option>
                                <option value = "September">September</option>
                                <option value = "October">October</option>
                                <option value = "November">November</option>
                                <option value = "December">December</option>
                            </select><br/><br/>
                    Zodiac: <select name="g_zodiac">
                                <option value = "">None</option>
                                <option value = "Aquarius">Aquarius</option>
                                <option value = "Pisces">Pisces</option>
                                <option value = "Aries">Aries</option>
                                <option value = "Taurus">Taurus</option>
                                <option value = "Gemini">Gemini</option>
                                <option value = "Cancer">Cancer</option>
                                <option value = "Leo">Leo</option>
                                <option value = "Virgo">Virgo</option>
                                <option value = "Libra">Libra</option>
                                <option value = "Scorpio">Scorpio</option>
                                <option value = "Sagittarius">Sagittarius</option>
                                <option value = "Capricorn">Capricorn</option>
                            </select><br/><br/>
                    Affirmention: <textarea rows="4" name="g_affirmention"></textarea><br/><br/>
                    <label for="g_pic">Picture: </label><input type="file" name="g_pic"/>
                    <input class="input" type="submit" value="ADD"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="gemstones.php">Back</a>
            </td></tr></table></center></td></form>
        </tr>

        <tr height="100px" bgcolor = #D1C0A8>
            <td align="center" valign="center">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td>
        </tr>


    </table>
</body>

</html>