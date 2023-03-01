<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!-- External css -->
    <title>SIGN UP</title>
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
            input {
                width: 200px;
                height: 20px;
                padding: 12px 20px;
                border:none;
                box-sizing: border-box;
                color:brown;
            }
            input:focus,textarea:focus { 
            outline-color:#917461;
            }

    </style>
</head>

<body>

    <table border="0" width="100%" height="100%" bgcolor="#fcf7ef">
        <tr align="center" >
            <td>
                <img src = "images/logo.png" alt = "Logo - 3 Tiger Armies" width = "580px"/>
            </td>
        </tr>

        <tr bgcolor="#fcf7ef" align="center" height="360px"><td>
        <table border="0" bgcolor="#fcf7ef" width="800px">
        <tr  style="color:#917461">
            <td align="center">
                <h1>Sign up</h1>
            </td>

        </tr>

        <form name ="reg_form" method="post" action = "reg_insert.php">
        <tr >
            <td align="center"><table>
                <tr><td width="100px">Username:<br/><br/></td> <td><input type="text" name="userName" placeholder="Username*" /><br/><br/></td></tr>
                <tr><td>Password:<br/><br/></td> <td><input type="password" name="passWord" placeholder="Password*" /><br/><br/></td></tr>
                <tr><td>Firstname:<br/><br/></td> <td><input type="text" name="firstname" placeholder="firstname*" /> <br/><br/></td></tr>
                <tr><td>Lastname:<br/><br/></td> <td><input type="text" name="lastname" placeholder="lastname*" /><br/><br/></td></tr>
                <tr><td>Email:<br/><br/></td> <td><input type="text" name="email" placeholder="email*" /><br/><br/></td></tr></table>
            </td>
        </tr>
        <tr>
            <td align="center" style="color:gray;"><br/>
            You can not change your 'Username' after sign up<br/><br/>
                <button class="button button1" type="submit">Sign up</button>
            </td>
        </tr>
        </form>

        
        <tr>
            <td align="center"><br/><br/>
                <a href="Login.html">Back</a>
            </td>
        </tr>
        </table><br/><br/><br/><br/>
        </td></tr>

        <tr height="50px" >
            <td align="center" valign="center" ><font color="gray">Copyright by 3 Tiger Armies | IT/DIGITECH@SUT 2021</td></font></td>
        </tr>
    </table>
</body>
</html>