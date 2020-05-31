<?php
session_start();
if(!isset($_SESSION['dni'])){
     echo "<script>console.log('no hay sesion en el logout')</script>";
     header("location:../index.php");
  } else {
     echo "<script>console.log('hay sesion en logout')</script>";

     $past = time() - 3600;
	 foreach ( $_COOKIE as $key => $value ){
	 	if ($key!='PHPSESSID') {
	     setcookie( $key, $value, $past, '/' );
	 	}
	 }

     session_unset();
     session_destroy();
     header("location:../index.php");
  }

?>
