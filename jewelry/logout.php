<?php
    session_start();
    session_destroy();
    echo"<script>alert('Log out successful, Thank you...'); window.location='index.php';</script>";
    exit();
?>