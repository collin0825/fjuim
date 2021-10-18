<?php
    session_start();
    if(!isset($_SESSION["ac_name_ma"])){
        echo "<script>alert('請先登入管理者!'); location.href = 'login.php';</script>";
    }
    $id = $_GET['id'];
    if(isset($_POST["name"])){
        $name = $_POST["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"]);
        $file = "images/" . $_FILES["file"]["name"];
        $info = $_POST["info"];
        $date = $_POST["date"];
        include "dblink.php";
        $sql = "UPDATE `news` SET `name` = '$name', `picture` = '$file', `info` = '$info', `date` = '$date' WHERE `news`.`aid` = $id";
        $result = mysqli_query($link, $sql);
        echo "<script>alert('您已修改此筆活動資料!'); location.href = 'news_ma.php';</script>";
        mysqli_close($link);
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit_news</title>
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
 <br>
 <br>
  <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-5">
           <font size="20"><b>修改活動表單</b></font>
            <form class="p-5 bg-white" method="post" enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">消息名稱</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">消息圖片</label>
                  <input type="file" class="form-control-file border" name="file">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">消息簡介</label>
                  <textarea name="info"ols="30" rows="10" class="form-control"></textarea>
                  
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">發布日期</label>
                  <input type="date" class="form-control-file border" name="date">
                  
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
<!--
                 <p><a href="news.html" class="btn btn-primary text-white px-4"><span class="caption">確定修改</span></a></p>
                 <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">刪除此則消息</span></a></p>
-->
                  <input type="submit" class="btn btn-primary" value="確定修改"><br><br>
                </div>
              </div>
            </form>
        </div>
    </div>  
  </div>
   
</body>
</html>