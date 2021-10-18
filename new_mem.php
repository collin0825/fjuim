<?php
    if(isset($_POST["na"])){
        $na = $_POST["na"];
        $stid= $_POST["stid"];
        $class = $_POST["class"];
        $pw = $_POST["password"];
        $gender = $_POST["gender"];
        $cat = $_POST["categories"];
        $fee = $_POST["fee"];
        include "dblink.php";
        $sql = "INSERT INTO `account` (`id`, `name`, `account`, `password`, `class`, `categories`, `gender`, `fee`) VALUES (NULL, '$na', '$stid', '$pw', '$class', '$cat', '$gender', '$fee');";
        $result = mysqli_query($link, $sql);
        header("Location: member_list_ma.php");
        mysqli_close($link);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit_norme</title>
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
           <font size="20"><b>新增表單</b></font>
            <form action="#" class="p-5 bg-white" method="post">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">姓名</label>
                  <input type="text" class="form-control" name="na">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">學號</label>
                  <input type="text" class="form-control" name="stid">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">系級</label>
                  <input type="text" class="form-control" name="class">
                </div>
              </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">密碼</label>
                  <input type="text" name="password" class="form-control">
                  
                </div>
              </div>
                <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">性別</label>
                  <select name="gender">
                     <option value="男">男</option>
                     <option value="女">女</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">是否繳交系費</label>
                  <input type="radio" name="fee" value="1">是
                  <input type="radio" name="fee" value="0">否
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">權限類別</label>
                  <select name="categories">
                     <option value="0">一般會員</option>
                     <option value="1">總管理員</option>
                     <option value="2">副管理員</option>
                     <option value="3">訊息管理員</option>
                     <option value="4">帳號管理員</option>
                     <option value="5">活動報名管理員</option>
                  </select>
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" value="新增"><br><br>
                </div>
              </div>

  
            </form>
        </div>
    </div>  
  </div>
</body>
</html>