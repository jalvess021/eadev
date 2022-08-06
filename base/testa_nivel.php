<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	session_destroy();
	echo "Acesso NEGADO!!!<br><br>";
	header("Location: \\tcc\?page=login");
	exit;
}
?>