<?php                                 

session_start();
if ($_SESSION) {
    header("Location:cek.php");
}
 $email	   = $_POST['email1'];
 $user 		= $_POST['username1'];
 $pass 		= md5($_POST['password1']);
 $notelp   = $_POST['hp1'];
 $alamat   = $_POST['alamat1'];
 $nama     = $_POST['nama1'];
 include 'konfigurasi/database.php';
$query1=mysqli_query($conn,"SELECT username,email FROM user WHERE username='$username' or email='$email'");
$cekdata=mysqli_num_rows($query1);
if($cekdata>0)

{
	echo 'maaf username atau email sudah terdaftar silahkan kembali ke halaman sebelumnya<a href="register.php"> klik disini </a> atau tekan tombol back pada browser jika anda malas mengisi kembail lebih baik tekan tombol back';

}
else
{
	$query1=mysqli_query($conn,"INSERT INTO user (username,password,email,kode_akses) VALUES ('$user','$pass','$email',2)");
	$lastid =mysqli_insert_id($conn);
	if ($query1)
	{
	$query2=mysqli_query($conn,"INSERT INTO data_pembeli (kode_user,nama,notelp,alamat,tipe_customer) VALUES ('$lastid','$nama','$notelp','$alamat',2)");
	if($query2)
	
	{
	$_SESSION['nama']=$nama;
	$_SESSION['username']=$user;
	$_SESSION['akses']='pembeli';
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