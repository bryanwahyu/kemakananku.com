<?php                                 

session_start();
if ($_SESSION) {
    header("Location:cek.php");
}
 $email	   = $_POST['email'];
 $user 		= $_POST['user'];
 $pass 		= md5($_POST['pass']);
 $notelp   = $_POST['hp'];
 $alamat   = $_POST['alamat'];
 $nama     = $_POST['nama'];
 include 'konfigurasi/database.php';
$query1=mysqli_query($conn,"SELECT username,email FROM user WHERE username='$username' or email='$email'");
$cekdata=mysqli_num_rows($query1);
if($cekdata>0)

{
	echo 'maaf username atau email sudah terdaftar silahkan mencari username atau email yang lain ';

}
else
{
	$query1=mysqli_query($conn,"INSERT INTO user (username,password,email,kode_akses) VALUES ('$user','$pass','$email',2)");
	$lastid =mysqli_insert_id($conn);
	if ($query1)
	{
	$query2=mysqli_query($conn,"INSERT INTO data_pembeli (kode_user,nama,notelp,alamat,tipe_customer) VALUES ('$lastid','$nama','$notelp','$alamat',4)");
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