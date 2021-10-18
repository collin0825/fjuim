<?php
    session_start();
    unset($_SESSION["ac_name_nor"]);
    unset($_SESSION["ac_name_ma"]);
    header("Location: login.php");
?>
