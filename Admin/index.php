<?php
session_start();
if (empty($_SESSION)) {
    header("Location:../index.php");
}
include 'konfigurasi/database.php';
$user=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from data_admin,user WHERE (username='$user' or email= '$user') and iduser = kode_user limit 1 ");
$row = mysqli_fetch_assoc($query);
$nama = $row['nama'];
$idadmin =  $row['id'];
$query1=mysqli_query($conn,"SELECT * from tagihan");
$count1=mysqli_num_rows($query1);
$query2=mysqli_query($conn,"SELECT * from data_catering where aktif=0");
$count2=mysqli_num_rows($query2);
$query3= mysqli_query($conn,"SELECT * from  tiket ");
$count3= mysqli_num_rows($query3);
$query4= mysqli_query($conn,"SELECT * from paket");
$count4= mysqli_num_rows($query4);
?>
<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bryan Wahyu ">
    <meta name="keyword" content="Makanan murah,katering,Event Organizer">

    <title>Kemakananku Admin</title>

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
                <a class="navbar-brand" href="index.html">Kemakananku Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nama;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profil.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
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
                  
                     <li>
                     <a href="javascript:;" data-toggle="collapse" data-target="#admin"><i class="fa fa-fw fa-user-secret"></i> Admin <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="admin" class="collapse">
                            <li class="active">
                                <a href="index.php"><i class="fa fa-user-secret"></i> Data Admin</a>
                            </li>
                            <li>
                                <a href="komisi.php"><i class="fa fa-money"></i> Pembagian Komisi </a>
                            </li>
                        </ul>
                  
                     </li>
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#catering"><em class="fa fa-fw fa-truck"></em> Catering <em class="fa fa-fw fa-caret-down"></em></a>
                      <ul id="catering" class="collapse">
                            <li>
                                <a href="catering.php"><span class="glyphicon glyphicon-cutlery"></span> Data Catering</a>
                            </li>
                            <li>
                                <a href="paket.php"><i class="fa fa-tasks"></i> Pengecekan Paket </a>
                            </li>
                            <li>
                                <a href="rating.php"><i class="fa fa-star"></i> Rating </a>
                            </li>
                        </ul>
                    </li> <li><a href="javascript:;" data-toggle="collapse" data-target="#pembeli"><em class="fa fa-fw fa-users"></em> Pembeli <em class="fa fa-fw fa-caret-down"></em></a>
                      <ul id="pembeli" class="collapse">
                            <li>
                                <a href="pembeli.php"><i class="fa fa-users"> </i> Data Pembeli</a>
                            </li>
                            <li>
                                <a href="pemesanan.php"><i class="fa fa-cart"></i> Pengecekan Pesanan </a>
                            </li>
                        </ul>
                    </li>
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
                            Admin <small>Lihat Hasil </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user-secret"></i> Data Admin
                            </li>
                        </ol>
                    </div>
                </div>
 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                  <div class="col-xs-9 text-right">
                                        <div class="huge"><? echo $count1; ?></div>
                                        <div>Komisi </div>
                                    </div>
                                </div>
                            </div>
                            <a href="komisi.php">
                                <div class="panel-footer">
                                    <span class="pull-left">lihat detil</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?echo $count2;?></div>
                                        <div>data Catering </div>
                                    </div>
                                </div>
                            </div>
                            <a href="catering.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Detail Catering</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? echo $count4;?></div>
                                        <div>Pesanan </div>
                                    </div>
                                </div>
                            </div>
                            <a href="pesanan.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Detail Pesanan </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ticket fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?echo $count3;?></div>
                                        <div>Pengaduan</div>
                                    </div>
                                </div>
                            </div>
                            <a href="Pengaduan ">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Pengaduan </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
<h1> Data Admin </h1>
<?php

        if($idadmin<5)
        { 
            if(isset($_GET['aksi']) == 'delete'){
                $id = $_GET['id'];
                $usercode =$_GET['kode_user'];
                $cek = mysqli_query($conn, "SELECT * from data_admin WHERE id='$id'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($conn, "DELETE from data_admin where id='$id' ");
                    $delete2 = mysqli_query($conn,"DELETE from user where '$usercode'=iduser");
                    if($delete){
                        if($delete2){


                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }
                    else {
                        echo '<div class ="alert alert-danger alert-dismissable" 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button> data admin berhasil namun  data user gagal dihapus harap menhubungin Bryan atau Bagus</div>';
                    }

                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
        }
        if($idadmin<5)
        {
    echo'<a class="btn btn-primary" href="add_admin.php"><i class="fa fa-user-plus" > </i> Tambah Admin </a>';
        }
    ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>nama</th>
        <th>Username</th>
        <th>email</th>
        <th>job</th>
        <th>No Telpon </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $viewq1=mysqli_query($conn,"SELECT * from data_admin,user where kode_user = iduser");
    if(mysqli_num_rows($viewq1) ==0){
                    echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($viewq1)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row['nama'].'</td>
                            <td>'.$row['username'].'</a></td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['Job'].'</td>
                            <td>'.$row['notelp'].'</td>';
                        echo '
                            </td>
                            <td>
                              '; if($idadmin<5)
                              {  
                             echo'
                                <a href="edit_admin.php?id='.$row['id'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="password.php?id='.$row['iduser'].'" title="Ganti Password" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>

                            <a href="index.php?aksi=delete&id='.$row['id'].'&kode_user='.$row['kode_user'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?/\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            
                            </td>
                        </tr>';
                    }
                    else 
                    {
                        echo'
                                <a href="view_admin.php?id='.$row['id'].'" title="View Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';
                             
                    }
                    $no++;
           
                    }
                }
        ?>

    </tbody>
    </table>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
</body>

</html>
