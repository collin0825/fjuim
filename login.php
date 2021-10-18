<?php
    session_start();
    if(isset($_SESSION["ac_name_nor"])){
        header("Location: index.php");
    }
    elseif(isset($_SESSION["ac_name_ma"])){
        header("Location: index_ma.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    </div>
  </div>
</nav>
</head>
<body style="background-image: url('images/im.jpg'); background-repeat: no-repeat; background-position:center top;">
  <br>
  <br>
   
     <div class="col-md-6 col-lg-6 mb-5" style="margin:0px auto;width:400px;height:500px;background-color:#ebf2f1;opacity:0.8;">
      
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">一般會員</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">管理</a>
          </li>

        </ul>
        <?php
            include "dblink.php";
            if(isset($_POST['account'])){
                $id=$_POST['account'];
                $password=$_POST['password'];
                $sql = "SELECT * FROM account WHERE account = '$id'AND categories>=0";
                $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_array($result)){
                    if($row["password"] == $password){
                        $_SESSION["ac_name_nor"] = $row["name"];
                        $_SESSION["ac_level"] = $row["categories"];
                        $_SESSION["ac_nor"] = $row["account"];
                        header("Location: index.php");
                    }
                }
                if(mysqli_num_rows($result)==0){
                    echo "<script>alert('no this account!');</script>";
//                    $error = "<p><font color='red' size='6'>no this account</font></p>";
                }
                else{
                    echo "<script>alert('password is wrong!');</script>";
//                    $error = "<p><font color='red' size='6'>password is wrong</font></p>";
                }
                mysqli_close($link);
        
            }      
        ?>

        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <form method="post">
                  <table  style="margin:0px auto;">
                      <tr>
                          <td><font color="#ff7600" size="5"><b>帳號:</b></font></td>
                          <td colspan="2"><input type="text" class="form-control" name="account"></td>
                          
                      </tr>
                      <tr>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                      </tr>
                      <tr>
                          <td><font color="#ff7600" size="5"><b>密碼:</b></font></td>
                          <td colspan="2"><input type="password" class="form-control" name="password" required></td>
                      </tr>
                       <tr>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                      </tr>
                      <tr>
                          <td colspan="3" align=center><input type="submit" class="btn btn-primary" value="登入" required></td>
                      </tr>
                  </table>
               </form>
               <br>
               <br>
               <?php echo $error; ?>
          </div>
          <?php
            if(isset($_POST['account1'])){
                $id=$_POST['account1'];
                $password=$_POST['password1'];
                $sql1 = "SELECT * FROM account WHERE account = '$id'AND categories>0";
                $result1 = mysqli_query($link, $sql1);
                while($row = mysqli_fetch_array($result1)){
                    if($row["password"] == $password){
                        $_SESSION["ac_name_ma"] = $row["name"];
                        $_SESSION["ac_level"] = $row["categories"];
                        header("Location: index_ma.php");
                    }
                }
                if(mysqli_num_rows($result1)==0){
                    echo "<script>alert('no this account!');</script>";
//                    $error1 = "<p><font color='red' size='6'>no this account</font></p>";
                }
                else{
                    echo "<script>alert('password is wrong!');</script>";
//                    $error1 = "<p><font color='red' size='6'>password is wrong</font></p>";
                }
                mysqli_close($link);
        
            }      
        ?>
          <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <form method="post">
                  <table style="margin:0px auto;">
                      <tr>
                          <td><font color="#ff7600" size="5"><b>帳號:</b></font></td>
                          <td colspan="2"><input type="text" class="form-control" name="account1" required></td>
                          
                      </tr>
                      <tr>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                      </tr>
                      <tr>
                          <td><font color="#ff7600" size="5"><b>密碼:</b></font></td>
                          <td colspan="2"><input type="password" class="form-control" name="password1" required></td>
                      </tr>
                       <tr>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                          <td>&nbsp; </td>
                      </tr>
                      <tr>
                          <td colspan="3" align=center><input type="submit" class="btn btn-primary" value="登入"></td>
                      </tr>
                  </table>
               </form>
               <br>
               <br>
               <?php echo $error1; ?>
          </div>
  
  

</div>



        </div>
           
</body>
</html>