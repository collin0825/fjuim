<?php
    session_start();
    $name = $_SESSION["atlist"];
    header('Content-type: text/html; charset=utf8');
    header("Content-type:application/vnd.ms-excel;charset=utf8"); 
    header("Content-Disposition:filename=$name.xls");
    include "dblink.php";
    $sql="select * from attend where aid='$name'";
    $result = mysqli_query($link, $sql);
    echo chr(239).chr(187). chr(191);
    echo "姓名\t學號\t系級\t性別\t系費繳交\n";
    while($row=mysqli_fetch_array($result)){
        if($row[4]==1){
            echo $row["name"]."\t".$row["stid"]."\t".$row["class"]."\t".$row["gender"]."\t"."是"."\n";
        }
        elseif($row[4]==0){
            echo $row["name"]."\t".$row["stid"]."\t".$row["class"]."\t".$row["gender"]."\t"."否"."\n";      }
    }
?>