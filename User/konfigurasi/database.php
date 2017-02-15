<?php
$username ='root';
$password ='';
$database ='kemakananku';
$host	  = 'localhost';
$conn =mysqli_connect($host, $username, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
    echo "konekso gagal: " .mysqli_connect_error();
} 
?>