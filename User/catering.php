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
$iduser    = $row['id'];
$query1  =mysqli_query($conn,"SELECT * FROM pesanan where kdpembeli='$iduser' and  lunas=0");
$count=mysqli_num_rows($query1);

?>
<html><head>
    <meta charset="utf-8">    
    <style>
        .button {
          display: inline-block;
          border-radius: 4px;
          background-color: #f0ad4e;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 20px;
          padding: 10px;
          width: 130px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
    </style>   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../default.css" rel="stylesheet" type="text/css">
  </head>
  <body>
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
                <a href="index.php">Home</a>
              </li>
              <li class="active">
                <a href="catering.php">Cari Katering<br></a>
              </li>
              
              <li>
                <a href="menu.php">Melihat Menu/Paket</a>
              </li>
              <li>
                <a href="his.php"> Contact Us </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $nama; ?><i class="fa fa-caret-down text-inverse"></i></a> 
          
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="profile.php">Profile</a>
                  </li>
                   <li>
                  <a href="pesanan.php">Lihat Order <?php if ($count>0){echo '&nbsp;<span class="label label-danger">'.$count.'</span>';}
                  else {
                    echo'&nbsp; <span class="label label-success"> Semua sudah lunas</span>';
                    } ?></a>
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
      <!--
      <div class="cover">
        <div class="col-sm-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="thumbnail">
                  <div class="caption">
                    <h5 contenteditable="true"> Rekomendasi kami </h5>
                    <p>                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
        <div class="background-image-fixed cover-image" style="background-image : url('../header-background2.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="thumbnail">
                        <h1 class="text-center" contenteditable="true">Cari Katering</h1>
                        
                    </div>
                  </div>
                  <div class="row">
                  <?php
                  $view1=mysqli_query($conn,"SELECT * FROM data_catering where Aktif=1 ");

                  while ($data=mysqli_fetch_assoc($view1)) {
                    if (!isset($data['logo']))
                    {
                    echo'<div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption">
                              <a><img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive"></a>
                              <h5>'.$data['nama_catering'].'</h5>
                              <h6>Alamat : </h6>
                              <p>'.$data['alamat'].'</p>
                              <h6>deskripsi :</h6>

                              <p>'.$data['deskripsi'].' </p>
                              <center>
                                <a href="pilih.php?id='.$data['id'].'" class="button" style="vertical-align:middle"><span>Menu </span></a>
                              </center>
                            </div>
                        </div>
                    </div>';
                    }else
                    {

                    echo'<div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption">
                              <a><img src='.$data['logo'].'class="img-responsive"></a>
                              <h5>'.$data['nama_catering'].'</h5>
                              <h6>Alamat : </h6>
                              <p>'.$data['alamat'].'</p>
                              <h6>deskripsi :</h6>

                              <p>'.$data['deskripsi'].' </p>
                              <p>
                                <a href="pilih.php?id='.$data['id'].'" class="button" style="vertical-align:middle">Lihat Katering </a>
                              </p>
                            </div>
                        </div>
                    </div>';
                    }
                  }
                  ?>
                    
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