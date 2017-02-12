<?php 
session_start();
if (empty($_SESSION)){
	header("Location:index.php");
}
else if ($_SESSION['akses']=='admin') {
	header("Location:Admin/index.php");
}
else if ($_SESSION['akses']=='catering') {
	 header("Location:Catering/index.php");
}
else if ($_SESSION['akses']=='pembeli') {
	 header("Location:User/index.php");
}
else {
	echo "error 404";
}