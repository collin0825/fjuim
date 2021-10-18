<?php
    $link= mysqli_connect("localhost","root","407401376", "web_final");
            if(!$link){
                echo "connect failed!", mysqli_connect_error();
            }
            mysqli_query($link, "set names utf8");
?>