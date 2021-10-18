<?php
    session_start();
    if(!isset($_SESSION["ac_name_ma"])){
        echo "<script>alert('請先登入管理者!'); location.href = 'login.php';</script>";
    }
    if(isset($_POST["list"])){
        $_SESSION["atlist"] = $_POST["list"];
        $act = $_POST["list"];
        include "dblink.php";
        $sql = "SELECT * FROM attend WHERE aid='$act'";
        $result = mysqli_query($link, $sql);
        $sql1 = "SELECT name FROM news WHERE aid='$act' LIMIT 1";
        $result1 = mysqli_query($link, $sql1);
        mysqli_close($link);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>member_list</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h2 class="mb-0 site-logo"><a href="index_ma.php" class="font-weight-bold"><img src="images/logo.jpg" alt=""></a></h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index_ma.php">&nbsp; <font size="6"><img src="images/home.png" alt="">Home</font> <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="attend_download_ma.php">&nbsp; <font size="6"><img src="images/download.png" alt="">下載報名清單</font></a>
          <a class="nav-item nav-link" href="member_list_ma.php">&nbsp; <font size="6"><img src="images/member.png" alt="">會員管理</font></a>
          <a class="nav-item nav-link" href="news1_ma.php"><font size="6"><img src="images/news.png" alt="">最新消息</font></a>
          <a class="nav-item nav-link" href="news_ma.php"><font size="6"><img src="images/news.png" alt="">活動消息</font></a>
          <a class="nav-item nav-link" href="logout.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary"><font size="4">登出</font></span></a>
        </div>
      </div>
</nav>
</head>
<body style="background-image: url('images/member.jpg'); background-repeat: no-repeat; background-position:center top; background-size:100%;">
 <br>
 <br>
 <div align="center">
 <font size="20" color="black"><strong>報名列表</strong></font>
 <form method="post">
     <table>
         <tr>
             <td><font size="5"><b>請選擇您要的活動報名列表</b></font></td>
             <td><select name="list" style="width:120px; height:40px;" class="form-control">
                    <option value="1">系烤</option>
                    <option value="2">博奕大賽</option>
                    <option value="3">耶誕舞會</option>
                    <option value="4">電競大賽</option>
                    <option value="5">資韻獎</option>
                    <option value="6">資管之夜</option>
                </select></td>
            <td><input type="submit" class="btn btn-primary" value="確定"></td>
            <td>&nbsp; </td>
            <?php
               while($row1 = mysqli_fetch_array($result1)){
            ?>
            <td><?php echo $row1["name"] ?>報名表單</td>
            <?php
               }
            ?>
         </tr>
     </table>
 </form>
<table class="table table-striped table-dark" style="width:90%;">
 
  <thead>
    <tr>
      <th scope="col"><font size="5">姓名</font></th>
      <th scope="col"><font size="5">學號</font></th>
      <th scope="col"><font size="5">系級</font></th>
      <th scope="col"><font size="5">性別</font></th>
      <th scope="col"><font size="5">系費繳交</font></th>
    </tr>
  </thead>
  <tbody>
    <?php
       while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
      <td><font size="5"><?php echo $row["name"] ?></font></td>
      <td><font size="5"><?php echo $row["stid"] ?></font></td>
      <td><font size="5"><?php echo $row["class"] ?></font></td>
      <td><font size="5"><?php echo $row["gender"] ?></font></td>
      <?php if($row["fee"]==0){
        ?>
        <td><font size="5">否</font></td>
        <?php
            }
        ?>
        <?php if($row["fee"]==1){
        ?>
        <td><font size="5">是</font></td>
        <?php
            }
        ?>
      <td><a href="del_attend.php?id=<?php echo $row["id"]?>"><button class="btn btn-primary">刪除</button></a></td>
    </tr>
    <?php
       $i++;
       }
    ?>
    
    
  </tbody>
</table>
<a href="attendlist_download.php"><button class="btn btn-primary">下載</button></a>
 </div>
   
</body>
</html>