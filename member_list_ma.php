<?php
    session_start();
    if(!isset($_SESSION["ac_name_ma"])){
        echo "<script>alert('請先登入管理者!'); location.href = 'login.php';</script>";
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
 <div class="col-md-12 col-lg-12 mb-5">
      
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">一般會員清單</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">管理者清單</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">權限管理</a>
  </li>
  
</ul>
<?php
    include "dblink.php";
    $sql = "SELECT * FROM account WHERE categories=0";
    $result = mysqli_query($link, $sql);
?>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <table name='tbl' id="tbl" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">姓名</th>
      <th scope="col">學號</th>
      <th scope="col">系級</th>
      <th scope="col">性別</th>
      <th scope="col">是否已繳系費</th>
      <th scope="col">權限類別</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <?php
       while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
      <td scope="row"><?php echo $row["id"]?></td>
      <td><?php echo $row["name"]?></td>
      <td><?php echo $row["account"]?></td>
      <td><?php echo $row["class"]?></td>
      <td><?php echo $row["gender"]?></td>
      <?php if($row["fee"]==0){
        ?>
        <td>否</td>
        <?php
            }
        ?>
        <?php if($row["fee"]==1){
        ?>
        <td>是</td>
        <?php
            }
        ?>
      <?php if($row["categories"]==0){
        ?>
        <td>一般會員</td>
        <?php
            }
        ?>
      <td width="100"><a href="edit_mem.php?id=<?php echo $row["id"]?>& account=<?php echo $row["account"]?>"><button type="button" class="btn btn-danger">修改</button></a></td>
      <td width="100"><a href="del_mem.php?id=<?php echo $row["id"]?>"><button type="button" class="btn btn-danger">刪除</button></a></td>
    </tr>
    <?php
       }
    ?>
  </tbody>
</table>
 <div align="right">
    <a href="new_mem.php"><button class="btn btn-outline-dark">新增</button></a>
</div>
  </div>
  <?php
    $sql1 = "SELECT * FROM account WHERE categories>=1";
    $result1 = mysqli_query($link, $sql1);
?>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <table name='tll' id="tll" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">姓名</th>
      <th scope="col">學號</th>
      <th scope="col">系級</th>
      <th scope="col">性別</th>
      <th scope="col">是否繳交系費</th>
      <th scope="col">權限類別</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <?php
       while($row = mysqli_fetch_array($result1)){
    ?>
    <tr>
      <td scope="row"><?php echo $row["id"]?></td>
      <td><?php echo $row["name"]?></td>
      <td><?php echo $row["account"]?></td>
      <td><?php echo $row["class"]?></td>
      <td><?php echo $row["gender"]?></td>
      <?php if($row["fee"]==0){
        ?>
        <td>否</td>
        <?php
            }
        ?>
        <?php if($row["fee"]==1){
        ?>
        <td>是</td>
        <?php
            }
        ?>
      <?php if($row["categories"]==1){
        ?>
        <td>總管理員</td>
        <?php
            }
        ?>
        <?php if($row["categories"]==2){
        ?>
        <td>副管理員</td>
        <?php
            }
        ?>
        <?php if($row["categories"]==3){
        ?>
        <td>訊息管理員</td>
        <?php
            }
        ?>
        <?php if($row["categories"]==4){
        ?>
        <td>帳號管理員</td>
        <?php
            }
        ?>
        <?php if($row["categories"]==5){
        ?>
        <td>活動報名管理員</td>
        <?php
            }
        ?>
      <td width="100"><a href="edit_mem.php?id=<?php echo $row["id"]?>& account=<?php echo $row["account"]?>"><button type="button" class="btn btn-danger">修改</button></a></td>
      <td width="100"><a href="del_mem.php?id=<?php echo $row["id"]?>"><button type="button" class="btn btn-danger">刪除</button></a></td>
    </tr>
   <?php
       }
    ?>
  </tbody>
</table>
 <div align="right">
    <a href="new_mem.php"><button class="btn btn-outline-dark">新增</button></a>
</div>
  </div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
         <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">權限</th>
      <th scope="col">新增訊息</th>
      <th scope="col">修改訊息</th>
      <th scope="col">刪除訊息</th>
      <th scope="col">新增會員</th>
      <th scope="col">修改會員</th>
      <th scope="col">刪除會員</th>
      <th scope="col">新增管理者</th>
      <th scope="col">修改管理者</th>
      <th scope="col">刪除管理者</th>
      <th scope="col">下載活動報名清單</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">總管理員</th>
      <td><input type="checkbox" name="boss" value="新增訊息" checked>新增訊息</td>
      <td><input type="checkbox" name="boss" value="修改訊息" checked >修改訊息</td>
      <td><input type="checkbox" name="boss" value="刪除訊息" checked >刪除訊息</td>
      <td><input type="checkbox" name="boss" value="新增會員" checked >新增會員</td>
      <td><input type="checkbox" name="boss" value="修改會員" checked >修改會員</td>
      <td><input type="checkbox" name="boss" value="新增訊息" checked >刪除會員</td>
      <td><input type="checkbox" name="boss" value="新增管理者" checked >新增管理者</td>
      <td><input type="checkbox" name="boss" value="修改管理者" checked >修改管理者</td>
      <td><input type="checkbox" name="boss" value="刪除管理者" checked >刪除管理者</td>
      <td><input type="checkbox" name="boss" value="下載活動報名清單" checked >下載活動報名清單</td>
    </tr>
    <tr>
      <th scope="row">副管理員</th>
     <td><input type="checkbox" name="bossbaby" value="新增訊息" checked >新增訊息</td>
      <td><input type="checkbox" name="bossbaby" value="修改訊息" checked >修改訊息</td>
      <td><input type="checkbox" name="bossbaby" value="刪除訊息" checked >刪除訊息</td>
      <td><input type="checkbox" name="bossbaby" value="新增會員" checked >新增會員</td>
      <td><input type="checkbox" name="bossbaby" value="修改會員" checked >修改會員</td>
      <td><input type="checkbox" name="bossbaby" value="新增訊息" checked >刪除會員</td>
      <td><input type="checkbox" name="bossbaby" value="新增管理者" checked >新增管理者</td>
      <td><input type="checkbox" name="bossbaby" value="修改管理者" checked >修改管理者</td>
      <td><input type="checkbox" name="bossbaby" value="刪除管理者" >刪除管理者</td>
      <td><input type="checkbox" name="bossbaby" value="下載活動報名清單" checked >下載活動報名清單</td>
    </tr>
    <tr>
      <th scope="row">訊息管理員</th>
      <td><input type="checkbox" name="messager" value="新增訊息" checked >新增訊息</td>
      <td><input type="checkbox" name="messager" value="修改訊息" checked >修改訊息</td>
      <td><input type="checkbox" name="messager" value="刪除訊息" checked >刪除訊息</td>
      <td><input type="checkbox" name="messager" value="新增會員" >新增會員</td>
      <td><input type="checkbox" name="messager" value="修改會員" >修改會員</td>
      <td><input type="checkbox" name="messager" value="新增訊息" >刪除會員</td>
      <td><input type="checkbox" name="messager" value="新增管理者" >新增管理者</td>
      <td><input type="checkbox" name="messager" value="修改管理者" >修改管理者</td>
      <td><input type="checkbox" name="messager" value="刪除管理者" >刪除管理者</td>
      <td><input type="checkbox" name="messager" value="下載活動報名清單"  >下載活動報名清單</td>
    </tr>
    <tr>
      <th scope="row">帳號管理員</th>
      <td><input type="checkbox" name="account" value="新增訊息" >新增訊息</td>
      <td><input type="checkbox" name="account" value="修改訊息" >修改訊息</td>
      <td><input type="checkbox" name="account" value="刪除訊息" >刪除訊息</td>
      <td><input type="checkbox" name="account" value="新增會員" checked >新增會員</td>
      <td><input type="checkbox" name="account" value="修改會員" checked >修改會員</td>
      <td><input type="checkbox" name="account" value="新增訊息" checked >刪除會員</td>
      <td><input type="checkbox" name="account" value="新增管理者" checked >新增管理者</td>
      <td><input type="checkbox" name="account" value="修改管理者" checked >修改管理者</td>
      <td><input type="checkbox" name="account" value="刪除管理者" >刪除管理者</td>
      <td><input type="checkbox" name="account" value="下載活動報名清單" >下載活動報名清單</td>
    </tr>
    <tr>
      <th scope="row">活動報名管理員</th>
      <td><input type="checkbox" name="actor" value="新增訊息" checked >新增訊息</td>
      <td><input type="checkbox" name="actor" value="修改訊息" checked >修改訊息</td>
      <td><input type="checkbox" name="actor" value="刪除訊息" >刪除訊息</td>
      <td><input type="checkbox" name="actor" value="新增會員" checked >新增會員</td>
      <td><input type="checkbox" name="actor" value="修改會員" >修改會員</td>
      <td><input type="checkbox" name="actor" value="新增訊息" >刪除會員</td>
      <td><input type="checkbox" name="actor" value="新增管理者" >新增管理者</td>
      <td><input type="checkbox" name="actor" value="修改管理者" >修改管理者</td>
      <td><input type="checkbox" name="actor" value="刪除管理者" >刪除管理者</td>
      <td><input type="checkbox" name="actor" value="下載活動報名清單" checked>下載活動報名清單</td>
    </tr>
  </tbody>
        </table>
        <div align="right">
    <a href="member_list_ma.php"><button class="btn btn-outline-dark">儲存修改資料</button></a>
</div>
    </div>
  

</div>



        </div>
   
</body>
</html>