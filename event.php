<?php                                 

session_start();
if ($_SESSION) {
    header("Location:cek.php");
}
 $email	   = $_POST['email3'];
 $user 		= $_POST['username2'];
 $pass 		= md5($_POST['password3']);
 $notelp   = $_POST['hp3'];
 $alamat   = $_POST['alamat3'];
 $nama     = $_POST['nama3'];
 $pemilik  =$_POST['pemilik3'];
 include 'konfigurasi/database.php';
$query1=mysqli_query($conn,"SELECT username,email FROM user WHERE username='$username' or email='$email'");
$cekdata=mysqli_num_rows($query1);
if($cekdata>0)

{
	echo 'maaf username atau email sudah terdaftar silahkan kembali ke halaman sebelumnya<a href="register.php"> klik disini </a> atau tekan tombol back pada browser jika anda malas mengisi kembail lebih baik tekan tombol back';

}
else
{
	$query1=mysqli_query($conn,"INSERT INTO user (username,password,email,kode_akses) VALUES ('$user','$pass','$email',3)");
	$lastid =mysqli_insert_id($conn);
	if ($query1)
	{
	$query2=mysqli_query($conn,"INSERT INTO data_catering (kode_user,nama_catering,pemilik,notelp,alamat,tipe_catering) VALUES ('$lastid','$nama','$pemilik','$notelp','$alamat',1)");
	if($query2)
	
	{
	$_SESSION['nama']=$nama;
	$_SESSION['username']=$user;
	$_SESSION['akses']='catering';
	header("Location: cek.php");
	}
	else
	{
		echo "gagal daftar1";
	}
	}
	else 
	echo "gagal daftar2";
}

 ?>