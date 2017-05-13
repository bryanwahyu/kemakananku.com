<?php 
session_start();
include 'konfigurasi/database.php';
if (empty($_SESSION)) {
    header("Location:index.php");
 
}
$user= $_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from data_catering,user WHERE (username='$user' or email= '$user') and iduser = kode_user limit 1 ");
$row = mysqli_fetch_assoc($query);
$nama = $row['nama_catering'];
$aktif = $row['Aktif'];
$id    = $row['id'];
$kodeuser = $row['iduser'];
?>
<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kemakananku Catering</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color : #ec971f;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="pict/logosmall.png" style="float:left;width:40px;height:40px;">
                <a class="navbar-brand" href="index.php">Kemakananku Catering </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nama; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="catering/profil.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="catering/inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="keluar.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color:#e8e8e8;">
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#catering"><em class="fa fa-fw fa-truck"></em> Catering <em class="fa fa-fw fa-caret-down"></em></a>
                      <ul id="catering" class="collapse">
                            <li class="active">
                                <a href="Catering/index.php"><span class="glyphicon glyphicon-cutlery"></span> Data Caterng</a>
                            </li>
                            <li>
                          <a href="Catering/menu.php"> <span class=" glyphicon glyphicon-book"></span> Data menu dan Promosi </a>
                          </li>  
                            <li>
                                <a href="Catering/promosi.php"><i class="fa fa-cart"></i>
                                Data Promosi </a>
                            </li>
                             <li>
                                <a href="Catering/komisi.php"><i class="fa fa-money"></i> Pembayaran  Komisi </a>
                             </li>
                             <li>
                                <a href="Catering/paket.php"><i class="fa fa-tasks"></i> data Paket  </a>
                            </li>
                            <li> 
                                <a href="Catering/chekrekening.php"><i class="fa fa-bank"></i> Cek Rekening </a>
                        </ul>
                      
                            <li>
                                <a href="Catering/rating.php"><i class="fa fa-star"></i> Rating </a>
                            </li>
                        <li><a href="javascript:;" data-toggle="collapse" data-target="#pembeli"><em class="fa fa-fw fa-users"></em> Pembeli <em class="fa fa-fw fa-caret-down"></em></a>
                            <ul id="pembeli" class="collapse">
                            <li>
                                <a href="Catering/pembeli.php"><i class="fa fa-users"> </i> Data Pembeli</a>
                            </li>

                            <li>
                                <a href="Catering/pemesanan.php"><i class="fa fa-cart"></i> Pengecekan Pesanan </a>
                            </li>
                        </ul>
                    <li>
                        <a href="Catering/ticket.php"><i class="fa fa-fw fa-ticket"></i> ticket</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
   
 <div id="page-wrapper">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Catering  <small>Check Rekening </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                              <span class=""></span>
                               Data Makanan             </li>
                        </ol>
                    </div>
                </div>

    <?php
                $folder     = '/pict/makanan/';
                $file_type  = array('jpg','jpeg','png','gif','bmp','PNG','JPG','JPEG','GIF','BMP');
                $max_size   = 1000000; 
                
            if(isset($_POST['add'])){
                $namabelum            = $_POST['nama'];
                $nama =mysqli_real_escape_string ( $conn ,$namabelum );

                $deskripsibelum       = $_POST['deskripsi'];         
                $deskripsi =mysqli_real_escape_string ( $conn ,$deskripsibelum );


                $hargabelum           = $_POST['harga'];
                $harga= str_replace(".", "", $hargabelum);
                $min = $_POST['min'];
                $file_name  = $_FILES['filefoto']['name'];
                $file_size  = $_FILES['filefoto']['size'];
    //cari extensi file dengan menggunakan fungsi explode
                $explode    = explode('.',$file_name);
                $extensi    = $explode[count($explode)-1];

    //check apakah type file sudah sesuai
    if(!in_array($extensi,$file_type)){
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>file anda bukan gambar  !</div>';

    }
    else    if($file_size > $max_size){
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Melebihi batas upload !</div>';

    }else
    {
             

define ('SITE_ROOT', realpath(dirname(__FILE__)));
           
         $auto=1;
         $kodegambar=$id.'-'.$auto;
        $pindah=$kodegambar.".".$extensi;
        $folders='pict/makanan/';
         while (file_exists($folders.$pindah)){
            
             $auto=$auto+1;   
             $kodegambar=$id.'-'.$auto;
             $pindah=$kodegambar.".".$extensi;        
}
        if(move_uploaded_file($_FILES['filefoto']['tmp_name'],SITE_ROOT.$folder.$pindah)){
        $link=$pindah;
       $insert1=mysqli_query($conn,"INSERT INTO makanan (nama,deskripsi,harga,link,kodepenjual,min) VALUES ('$nama','$deskripsi',
        $harga,'$link',$id,$min)");

                        if($insert1){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data makanan Berhasil Di Simpan.</div>';
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Makanan Gagal Di simpan !</div>';

                    }
                }
                else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Proses pindah foto error </div>';
                }
            }
                    
      }
      
             ?>
            
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Makanan</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" class="form-control" placeholder="Makanan" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Deskripsi</label>
                    <div class="col-sm-4">
                        <textarea name="deskripsi" rows="5"  class="form-control" placeholder="Deskripsi Makanan " required></textarea> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Harga</label>
                    
                    <div class="input-group col-sm-3">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" name="harga"  class="form-control" onkeyup="javascript:tandaPemisahTitik(this);" onkeydown="return numbersonly(this, event);" aria-label="rupiah">
                    <span class="input-group-addon">.00</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Input file foto MAX 1 Mb :</label>
                    <div class="col-sm-2">
                        <input type="file" name="filefoto">
                    </div>
                </div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">Minimal pemesanan:</label>
                    <div class="col-sm-2">
                        <input type="text" name="min" class="form-control" value="1"  onkeydown="return numbersonly(this, event);">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
                        <a href="Catering/index.php" class="btn btn-sm btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angka.js"></script>
</body>
</html>