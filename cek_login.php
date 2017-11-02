<?php
ob_start();	
session_start();
 
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    //redirect ke halaman login
    header("location:index.php");
}
?>