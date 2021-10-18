<?php
    session_start();
    if(!isset($_SESSION["ac_name_ma"])){
        echo "<script>alert('請先登入管理者!'); location.href = 'login.php';</script>";
    }  
    $id = $_GET['id'];    
    include "dblink.php";
    $sql = "DELETE FROM `news1` WHERE `news1`.`aid` = $id";
    $result = mysqli_query($link, $sql);
    echo "<script>alert('您已刪除此筆最新消息!'); location.href = 'news1_ma.php';</script>";
    mysqli_close($link);
?>