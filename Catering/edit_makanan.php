<?php 
session_start();
include 'konfigurasi/database.php';
if (empty($_SESSION)) {
    header("Location:../index.php");
 
}
$user= $_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from data_catering,user WHERE (username='$user' or email= '$user') and iduser = kode_user limit 1 ");
$row = mysqli_fetch_assoc($query);
$nama = $row['nama_catering'];
$aktif = $row['Aktif'];
$id    = $row['id'];
$kodeuser = $row['iduser'];
$folder='../pict/makanan/';
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
                            <a href="profil.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
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
                                <a href="index.php"><span class="glyphicon glyphicon-cutlery"></span> Data Caterng</a>
                            </li>
                            <li>
                          <a href="menu.php"> <span class=" glyphicon glyphicon-book"></span> Data menu dan Promosi </a>
                          </li>  
                            <li>
                                <a href="promosi.php"><i class="fa fa-cart"></i>
                                Data Promosi </a>
                            </li>
                             <li>
                                <a href="komisi.php"><i class="fa fa-money"></i> Pembayaran  Komisi </a>
                             </li>
                             <li>
                                <a href="paket.php"><i class="fa fa-tasks"></i> data Paket  </a>
                            </li>
                            <li> 
                                <a href="chekrekening.php"><i class="fa fa-bank"></i> Cek Rekening </a>
                        </ul>
                      
                            <li>
                                <a href="rating.php"><i class="fa fa-star"></i> Rating </a>
                            </li>
                        <li><a href="javascript:;" data-toggle="collapse" data-target="#pembeli"><em class="fa fa-fw fa-users"></em> Pembeli <em class="fa fa-fw fa-caret-down"></em></a>
                            <ul id="pembeli" class="collapse">
                            <li>
                                <a href="pembeli.php"><i class="fa fa-users"> </i> Data Pembeli</a>
                            </li>

                            <li>
                                <a href="pemesanan.php"><i class="fa fa-cart"></i> Pengecekan Pesanan </a>
                            </li>
                        </ul>
                    <li>
                        <a href="ticket.php"><i class="fa fa-fw fa-ticket"></i> ticket</a>
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
                           Catering  <small>Makanan</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user-secret"></i> Data Makanan</li>
                        </ol>
                    </div>
            </div>
<?php
            $idkode = $_GET['id'];
            $sql = mysqli_query($conn, "SELECT * FROM Makanan WHERE id='$idkode'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: chekrekening.php");
            }else{
                $data = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['save'])){  
        
                 $namabelum            = $_POST['nama'];
                $nama =mysqli_real_escape_string ( $conn ,$namabelum );

                $deskripsibelum       = $_POST['deskripsi'];         
                $deskripsi =mysqli_real_escape_string ( $conn ,$deskripsibelum );


                $hargabelum           = $_POST['harga'];
                $harga= str_replace(".", "", $hargabelum);
                $min = $_POST['min'];
                $update = mysqli_query($conn, "UPDATE makanan SET nama='$nama', harga=$harga, deskripsi='$deskripsi',min=$min  WHERE id='$idkode'");
                if($update){
                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                }
            }
            
            ?>
                 <form class="form-horizontal" action="" method="post">
         <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Makanan</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" class="form-control" placeholder="Makanan" value="<?php echo $data['nama'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Deskripsi</label>
                    <div class="col-sm-4">
                        <textarea name="deskripsi" rows="5"  class="form-control" placeholder="Deskripsi Makanan "  required><?php echo $data['deskripsi'];?></textarea> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Harga</label>
                    
                    <div class="input-group col-sm-3">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" name="harga"  class="form-control" onkeyup="javascript:tandaPemisahTitik(this);" onkeydown="return numbersonly(this, event);" aria-label="rupiah" value="<?php echo $data['harga'];?>" required>
                    <span class="input-group-addon">.00</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Foto Makanan:</label>
                    <div class="col-sm-2">
                        <img src="<?php echo $folder.$data['link'];?>" width="150px" height="150px"> 
                    </div>
                    <a href="../gantifotokatering.php?id=<?php echo $data['id'] ?>" class="btn btn-primary"> Ganti Foto </a>

                </div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">Minimal pemesanan:</label>
                    <div class="col-sm-2">
                        <input type="text" name="min" class="form-control" value="<?php echo $data['min'];?>"  onkeydown="return numbersonly(this, event);">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                        <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>