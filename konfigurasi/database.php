<?php
$username ='root';
$password ='';
$database ='kemakananku';
$host	  = 'localhost';
$koneksi 	= mysql_connect($host,$username,$password);
if (! $koneksi) {
	echo "koneksi gagal";
	mysql_error(); 
}
mysql_select_db($database,$koneksi) or die ("hubungan dengan database gagal ",mysql_error());

?>