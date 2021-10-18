<?php
    session_start();
    if(!isset($_SESSION["ac_name_nor"])){
        echo "<script>alert('請先登入會員!'); location.href = 'login.php';</script>";
    }
    include "dblink.php";
    if(isset($_POST['activity'])){
        $aid = $_POST['activity'];
        $stid = $_POST['stid'];
        $fee = $_POST['fee'];
        $class = $_POST['class'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $sql="INSERT INTO `attend` (`id`, `aid`,`stid`, `class`, `name`, `fee`, `gender`) VALUES (NULL, '$aid', '$stid', '$class', '$name', '$fee', '$gender');";
        $result = mysqli_query($link, $sql);
        echo "<script>alert('您已報名成功!');</script>";
        mysqli_close($link);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>attend</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>for (var i = 0; i < images.length; i++) { var image = images[i], width = String(image.currentStyle.width); 
            if (width.indexOf('%') == -1) { continue; } 
            image.origWidth = image.offsetWidth; 
            image.origHeight = image.offsetHeight; 
            imgCache.push(image); 
            c.ieAlpha(image);
            image.style.width = width; }</script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h2 class="mb-0 site-logo"><a href="index.php" class="font-weight-bold"><img src="images/logo.jpg" alt=""></a></h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">&nbsp; <font size="6"><img src="images/home.png" alt="">Home</font> <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="attend1_nor.php">&nbsp; <font size="6"><img src="images/activity.png" alt="">活動報名</font></a>
      <a class="nav-item nav-link" href="news1_nor.php"><font size="6"><img src="images/news.png" alt="">最新消息</font></a>
            <a class="nav-item nav-link" href="news_nor.php"><font size="6"><img src="images/news.png" alt="">活動消息</font></a>
      <?php session_start();
         if(isset($_SESSION["ac_name_nor"])){
    ?>
    <a class="nav-item nav-link" href="logout.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary"><font size="5">登出</font></span></a>
    <?php }
    ?>
    <?php if(!isset($_SESSION["ac_name_nor"])){
    ?>
    <a class="nav-item nav-link" href="login.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary"><font size="5">Log-In</font></span></a>
    <?php }
    ?>
    </div>
      <?php if(isset($_SESSION["ac_name_nor"])){ 
        ?>
          <font size="5" color="orange">歡迎 <?php echo $_SESSION["ac_name_nor"] ?></font>
        <?php
            }
        ?>
  </div>
</nav>
</head>
<body style="background-image: url('images/attend.jpg'); background-repeat: no-repeat; background-position:center top; background-size:cover;">
  <div align="center">
     <br>
     <br>
     <br>
      <form method="post">
       <table>
           <tr>
               <td><font size="5" color="#e7f4f1"><b>請選擇您要報名的活動:</b></font></td>
               <td colspan="2"><select name="activity" style="width:120px; height:40px;" class="form-control">
                <option value="1">系烤</option>
                <option value="2">博奕大賽</option>
                <option value="3">耶誕舞會</option>
                <option value="4">電競大賽</option>
                <option value="5">資韻獎</option>
                <option value="6">資管之夜</option>
            </select></td>
                
           </tr>
           <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
            <tr>
                <td><font size="5" color="#e7f4f1"><b>系級:</b></font></td>
                <td colspan="2"><input type="text" class="form-control" name="class"></td>
            </tr>
            <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
            <tr>
                <td><font size="5" color="#e7f4f1"><b>學號:</b></font></td>
                <td colspan="2"><input type="text" class="form-control" name="stid" value="<?php echo $_SESSION["ac_nor"]?>" readonly></td>
            </tr>
            <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
           <tr>
                <td><font size="5" color="#e7f4f1"><b>姓名:</b></font></td>
                <td colspan="2"><input type="text" class="form-control" name="name"></td>
            </tr>
            <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
           <tr>
               <td><font size="5" color="#e7f4f1"><b>性別:</b></font></td>
               <td colspan="2"><select name="gender" style="width:120px; height:40px;" class="form-control">
                <option value="男">男</option>
                <option value="女">女</option>
            </select></td>
                
           </tr>
           <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
           <tr>
                <td><font size="5" color="#e7f4f1"><b>是否繳交系費</b></font></td>
                <td colspan="2"><input type="radio" name="fee" value="1"><font size="5" color="#e7f4f1"><b>是</b></font>
                  <input type="radio" name="fee" value="0"><font size="5" color="#e7f4f1"><b>否</b></font></td>
            </tr>
            <tr>
               <td>&nbsp; </td>
               <td>&nbsp; </td>
           </tr>
            <tr>
                <td align="right">&nbsp; <input type="submit" class="btn btn-primary" value="提交">
                </td>
            </tr>
            
       </table>
   </form>
  </div>
   
       
            
            

            
    
    
</body>
</html>