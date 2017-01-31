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
              <li class="active">
                <a href="">Home</a>
              </li>
              <li class="">
                <a href="">Cari Katering<br></a>
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
                  <li>
                    <a href="#">Log In</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#">Register</a>
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
              <div class="section section-warning text-justify">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="text-center text-muted">Selamat Datang di Kemakananku</h3>
                      <img src="pict\Logo.png" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                      <h1 class="text-left text-muted" contenteditable="true">Log In</h1>
                      <div class="col-md-12">
                        <hr>
                      </div>
                      <?php 
                      if(isset($_POST['login'])){
          include("konfigurasi/database.php");
          
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          $hak   = $_POST['hak'];
          
          $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user='$username' AND password='$password'");
          if(mysqli_num_rows($query) == 0){
            echo '<div class="alert alert-danger">Maaf kesalahan Password atau  maaf belum terdaftar .</div>';
          }else{
            $row = mysqli_fetch_assoc($query);
            
            if($row['hak'] == 1 && $hak == 1){
              $_SESSION['username']=$username;
              $_SESSION['hak']='admin';
              header("Location: admin/user.php");
            }else if($row['hak'] == 2 && $hak == 2){
              $_SESSION['username']=$username;
              $_SESSION['hak']= admin/Customer;
              header("Location: user.php");
            }else if($row['hak'] == 3 && $level == 3){
              $_SESSION['username']=$username;
              $_SESSION['level']='Penjual';
              header("Location: user.php");
            }else{
              echo '<div class="alert alert-danger"> login gagal Kesalahaan pada Server</div>';
            }
          }
        }?>
                      <form role="form" method="_POST">
                        <div class="form-group">
                          <label class="control-label" for="exampleInputEmail1">username</label>
                          <input class="form-control input-lg" id="username" placeholder="username" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="exampleInputPassword1">Password</label>
                          <input class="form-control input-lg" id="password" placeholder="Password" type="password">
                        </div>
                          <div class="form-group">
                         <label class="control-label" for="exampleInputPassword1">Sebagai </label>
                          <select name="Hak Akses " class="form-control" required>
                <option>Pilih Hak Akses </option>     
            
              <?php //koneksi
    $namaserver='localhost';
    $userdb='root';
    $passdb='';
    $namadb='kemakananku';
  
   $koneksi=mysql_connect($namaserver,$userdb,$passdb);
   mysql_select_db($namadb,$koneksi);
    $sql = mysql_query("SELECT * FROM akses ORDER BY idakses ASC");
    while($row = mysql_fetch_assoc($sql)){
    echo "<option value='$row[idaksses]'>$row[hak]</option>";
}

?>                      </select>
                            </div>
                        <button type="submit" class="btn btn-default">Log In</button>
                      </form>
                      <h3>Belum punya akun ?
                        <a href="">Register disini</a>
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