<?php
session_start();

include "koneksi.php";

$user=$_POST['txtuser'];
$pass=$_POST['txtpwd'];
$pwd=md5($pass);
// echo "$pwd,";

if (empty($user) or empty($pwd)){
?>
<script>

window.location = 'index.php';
</script>
<?php
}
$sqlusers=mssql_query("select *from sw_users where id='$user' and pwd='$pwd'");
if(mssql_num_rows($sqlusers)<=0){
?>
<script>
    alert("Maaf....UserName dan Password Salah.");
	window.location = 'index.php';
</script>
<?php
}else{
    $_SESSION['user']=$user;
	$_SESSION['pwd']=$pwd;
	echo "<script>window.location ='home.php';</script>";
    }
?>