<?php 
require_once 'bd/db.class.php';
$nombre=$_POST['userName'];
$contraseña=$_POST['password'];
$contraseña_md5 = md5($contraseña); 
$account = DB::queryFirstRow("SELECT * FROM usuarios WHERE userName=%s AND password=%s", $nombre,$contraseña_md5);
session_start();
if ($account) {
	
	$_SESSION['usuario']=$account['userName'];
	$_SESSION['avatar']=$account['imagen'];
	$_SESSION['rol']=$account['rol'];
	$_SESSION['idUsuario']=$account['idUsuario'];
	$_SESSION['login']=true;
	
	echo '<script>
			alert("BIENVENIDO '.$account["userName"].' '.$account["imagen"].'");
			self.location="dashbord.php";
		  </script>';

}
else{
		echo '<script>
			alert("USUARIO NO ENCONTRADO");
			self.location="index.php";
		  </script>';
}
?>