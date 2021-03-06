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
                           Catering  <small>Check Rekening </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user-secret"></i> Data rekening                    </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->
<?php
                if($aktif==0){
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Maaf anda belum aktif mohon hubungi ke Pihak kemakananku </div>';
                }else
                {

            

        
            if(isset($_GET['aksi']) == 'delete'){
                $kodeid = $_GET['id'];
                $cek = mysqli_query($conn, "SELECT * from detail_bank  WHERE id='$kodeid'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($conn, "DELETE from detail_bank where id='$kodeid'");
                    if($delete){


                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';

                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
    echo'<a class="btn btn-primary" href="add_rekening.php"><i class="fa fa-user-plus" > </i> Tambah rekening </a>';
   }     
    ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Bank</th>
        <th>no Rekening </th>
        <th>atas nama </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $viewq1=mysqli_query($conn,"SELECT detail_bank.id,bank.bank,detail_bank.norek,detail_bank.atasnama from detail_bank,bank where kode_penjual ='$id' and bank.id=detail_bank.kode_bank");
    if(mysqli_num_rows($viewq1)==0){
                    echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
                }else{
                    $no = 1;
                    while($row = mysqli_fetch_assoc($viewq1)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$row['bank'].'</td>
                            <td>'.$row['norek'].'</a></td>
                            <td>'.$row['atasnama'].'</td>';
                        echo '
                           <td>
                              '; if($aktif==1)
                              {  
                             echo'
                             <div class="btn-group">
                                <a href="edit_rekening.php?id='.$row['id'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"> Edit Rekening </span></>

                            <a href="chekrekening.php?aksi=delete&id='.$row['id'].'" title="Hapus Data"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus Rekening </a>
                            </div>
                            </td>
                        </tr>';
                    }
                $no++;
                }

            }

            
        ?>

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
