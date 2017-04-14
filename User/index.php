<?php 
session_start();
include 'konfigurasi/database.php';
if (empty($_SESSION)) {
    header("Location:../index.php");
 
 }
$user= $_SESSION['username'];
$query = mysqli_query($conn,"SELECT * FROM user,data_pembeli where (username='$user' or email ='$user') and iduser=kode_user  limit 1");

$row = mysqli_fetch_assoc($query);
$nama = $row['nama'];
$id    = $row['id'];


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
            <a class="img-responsive"><img height="50" alt="Brand" src="../pict/logosmall.png" class="center-block img-circle"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="hidden-md hidden-sm nav navbar-nav navbar-right">
              <li>
                <a href="">Home</a>
              </li>
              <li class="active">
                <a href="">Cari Katering<br></a>
              </li>
              
              <li>
                <a href="">Contact Us</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo$nama; ?>&nbsp;<i class="fa fa-caret-down text-inverse"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="profile.php">Profile</a>
                  </li>
                  <li>
                  <a href="pesanan.php">Lihat Order</a>
                  <li class="divider"></li>
                  <li>
                    <a href="keluar.php">keluar</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      
      <div class="cover">
        <div class="col-sm-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="thumbnail">
                  <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
                  <div class="caption">
                    <h5 contenteditable="true"><?echo $nama ?></h5>
                    <p>Info Akun</p>
                    <?php 
                    $query = mysqli_query($conn,"SELECT * FROM user,data_pembeli where (username='$user' or email='$user') and iduser=kode_user  limit 1");
                    $row = mysqli_fetch_assoc($query);
                        ?>
                        <p> nama : <?php echo $row['nama'];?></p>
                        <p> No telpon : <?php echo $row['notelp'];?></p>
                        <p> Alamat :<?php echo $row['alamat'];?></p> 
                        <p> Alergi : <?php echo $row['keterangan'];?></p>                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="background-image-fixed cover-image" style="background-image : url('header-background2.jpg')"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1 class="text-center" contenteditable="true">Pilih Katering</h1>
                      <p class="text-center lead">A subtitle.</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 1</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 2</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 3</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 4</h5>
                      <h6>Keterangan :</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 5</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 6</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 7</h5>
                      <h6>Keterangan :</h6>
                    </div>
                    <div class="col-md-3">
                      <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                      <h5>Nama 8</h5>
                      <h6>Keterangan :</h6>
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
               <center>
                  <h3> Follow Us And Like Us </h3>
                  <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
      `   </center>
              </div>
            
          <div class="row">
          <center>
          <p style="color:#521078" class="container">
          Design by Bagus Hilmawan Copyright by &copy; Kemakananku.com 
          </p>
          </center>
          <center>
          <p style="color:#521078" class="container"> 
          This Web need supported by LAVAREL , JAVASCRIPT ,MARIADB AND PHP
          </p>
          </center>
         </div>      
       </div>        
       </footer>
    </div>
  

</body></html>


