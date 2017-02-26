<?php 
session_start();
if ($_SESSION) {
    header("Location:cek.php");
}
?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="default.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="row">
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="img-responsive"><img height="50" alt="Brand" src="pict\logosmall.png" class="center-block img-circle"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="hidden-md hidden-sm nav navbar-nav navbar-right">
              <li>
                <a href="promo.php">Home</a>
              </li>
              <li>
                <a href="menukatering.php">Cari Katering<br></a>
              </li>
              
              <li>
                <a href="#">Jual Katering</a>
              </li>
              <li>
                <a href="">Contact Us</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account&nbsp;<i class="fa fa-caret-down text-inverse"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li class="active">
                    <a href="index.php">Log In</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="register.php">Register</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="cover">
        <div class="background-image-fixed cover-image" style="background-image : url('http://kemakananku.com/images/header-background.jpg')"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section section-warning text-justify" style="opacity: 0.85;">
                <div class="container" style="opacity: 1;">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="text-center text-muted">Selamat Datang di Kemakananku</h3>
                      <img src="pict\Logo.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                      <h1 class="text-left text-muted" contenteditable="true">Log In</h1>
                      <div class="col-md-12">
                      </div>
                      <?php
        if(isset($_POST['login'])){
          include("konfigurasi/database.php");
          
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          
          $query = mysqli_query($conn,"SELECT * FROM user WHERE ( username='$username' OR email='$username') AND password='$password'");
          if(mysqli_num_rows($query) == 0){
            echo '<div class="alert alert-danger">Upss...!!! password salah .</div>';
          }else{
            $row = mysqli_fetch_assoc($query);
            
            if($row['kode_akses'] == 1){
              $_SESSION['username']=$username;
              $_SESSION['akses']='admin';
              header("Location: cek.php");
            }else if($row['kode_akses'] == 2){
              $_SESSION['username']=$username;
              $_SESSION['akses']='pembeli';
              header("Location: cek.php");
            }else if($row['kode_akses'] == 3){
              $_SESSION['username']=$username;
              $_SESSION['akses']='catering';
              header("Location: cek.php");
            }else{
              echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
            }
          }
        }
        ?>
                      <form role="form" method="POST" action="">
                        <div class="form-group">
                          <label class="control-label" for="username">username</label>
                          <input class="form-control input-lg" name ="username" placeholder="username" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="exampleInputPassword1">Password</label>
                          <input class="form-control input-lg" name ="password" placeholder="Password" type="password">
                        </div>
                        <button type="submit" name="login" class="btn btn-default">Log In</button>
                      </form>
                      <h3>Belum punya akun ?
                       <a href= "register.php">Register disini</a> </h3>
                       <h3>lupa password ?
                        <a href="reset.php">klik disini</a>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="section section-warning">
        <div class="container">
          <div class="row">
            <a <="" h3="" href="">
          
             <center> <p class="text-muted">Design by Bagus Hilmawan Copyrigth by Kemakananku.com </p></center>
            
              <div class="row">
                <div class="col-md-12 hidden-xs text-center">
                <p>Follow and Like Us</p>
                  <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                </div>
              </div>
            </div>
          </div>
      </footer>
    </div>
  

</body></html>