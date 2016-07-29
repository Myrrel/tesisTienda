<?php
session_start();
if(isset($_POST['salir'])){
		unset($_SESSION["usrPerfil"]);
		unset($_SESSION["nivelPerfil"]);
		session_destroy();
		var_dump($_SERVER['SERVER_NAME']);
		header("Location:".$_SERVER['SERVER_NAME']."/TesisDOS/index.php");
}

?>
