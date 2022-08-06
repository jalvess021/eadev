<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$id = (int) $_GET['id'];

$sql = "update usuario set ";
$sql .= "ativo='0' ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query ($con, $sql)or die(mysqli_error());

if($resultado){
	$resultado2 = mysqli_query ($con, lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=3');
	mysqli_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
