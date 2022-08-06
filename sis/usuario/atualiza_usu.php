<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$id		  		= $_POST["id"];
$nome 			= $_POST["nome"];
$usuario		= $_POST["usuario"];
$email			= $_POST["email"];
$nivel			= $_POST["nivel"];

$sql = "update usuario set ";
$sql .= "nome='".$nome."',usuario='".$usuario."', email='".$email."',nivel='".$nivel."', dt_cadastro=now() ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query ($con, $sql)or die(mysqli_error());

if($resultado){
	$resultado2 = mysqli_query ($con, lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=2');
	mysqli_close($con);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
