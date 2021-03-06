<?php<?php
session_start();
if (empty($_SESSION)) {
    header("Location:../index.php");
}
include 'konfigurasi/database.php';
$user=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from data_admin,user WHERE (username='$user' or email= '$user') and iduser = kode_user limit 1 ");
$row = mysqli_fetch_assoc($query);
$nama = $row['nama'];

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
                        <ul id="admin" class="collapse" >
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
                            Catering <small>Lihat Data </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                            <span class="glyphicon glyphicon-cutlery"></span> Data Catering
                            </li>
                        </ol>
                    </div>
                
             <?php   
            if(isset($_GET['aksi']) == 'aktif'){
                $id = $_GET['id'];
                $cek = mysqli_query($conn, "SELECT * from data_catering  WHERE id='$id'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $aktif = mysqli_query($conn, "UPDATE data_catering set Aktif=1 where id='$id'");

                    if($aktif){


                        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Catering diaktifkan.</div>';

                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Catering gagal di aktifkan .</div>';
                    }
                }
            }
             if(isset($_GET['blokir'])=='blokir'){
             $id = $_GET['id'];
                $cek = mysqli_query($conn, "SELECT * from data_catering  WHERE id='$id'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $aktif = mysqli_query($conn, "UPDATE data_catering set Aktif=0  where id='$id'");

                    if($aktif){


                        echo '<div class="alert alert-warning  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Catering diblokir.</div>';

                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Catering gagal diblokir .</div>';
                    }
                }   
            }
            ?>
                 <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Nama Katering </th>
        <th>Username</th>
        <th>email</th>
        <th>Pemilik</th>
        <th>No Telpon </th>
        <th>Aktif </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $viewq1=mysqli_query($conn,"SELECT * from data_catering,user where kode_user = iduser");
    if(mysqli_num_rows($viewq1) ==0){
                    echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($viewq1)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row['nama_catering'].'</td>
                            <td>'.$row['username'].'</a></td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['pemilik'].'</td>
                            <td>'.$row['notelp'].'</td>';
                            if ($row['Aktif']==0)
                            {
                                echo'<td class="danger"> Belum Aktif </td>';
                            }
                            else
                            {
                                echo'<td class="success"> Akitf </td>';
                            } 
                        echo '
                            </td>
                            <td>
                            <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Aktif Catering <span class="caret"></span>
  </button>
                                    <ul class="dropdown-menu">
                                 <li class=btn-info><a href="catering.php?aksi=aktif&id='.$row['id'].'"title ="Aktifkan Catering"><i class="fa fa-bullseye"></i> Aktifkan Catering</a></li>
                                    <li class="btn-warning"><a href="catering.php?blokir=blokir&id='.$row['id'].'" title ="Blokir Catering"><i class="fa fa-ban"></i>   Blokir Catering</a></li>
                                    </ul>
                                      <a href="view_catering.php?id='.$row['id'].'" title="View Data" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat Katering </a>
                                  </div>
                            </td>
                        </tr>';
                
                    $no++;
           
                    }
                }
        ?>

    </tbody>
    </table>

                </div>
                <!-- /.row -->

             
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
</body>

</html>
