<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$nome 			= $_POST["nome"];
$usuario		= $_POST["usuario"];
$senha			= $_POST["senha"];
$email			= $_POST["email"];
$nivel			= $_POST["nivel"];

$sql = "insert into usuario values ";
$sql .= "('0','$nome','$usuario', '".sha1($senha)."','$email','$nivel','1', '".date('Y-m-d')."');";

$resultado = mysqli_query ($con, $sql) or die(mysqli_error());

if($resultado){
	$resultado2 = mysqli_query ($con, lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=1');
	mysqli_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>