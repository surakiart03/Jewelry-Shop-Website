<html>
<body>
    <td align="left"><a href="cart.php?username=<?PHP echo $username ?>&amount=<?PHP echo $cnt_amount; ?> " >
                        <img src="images/cart.png" alt="cart" width="20px"/>&nbsp;
                        <font color=#917461 size="4px"> My Cart </font><font color=#917461 size="4px"> ( <?PHP echo $cnt_amount; ?> )</font>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="order.php?username=<?PHP echo $username ?>" ><font color=#917461 size="4px"> My History </font></a>
    </td>
</body>
</html>