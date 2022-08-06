<?php		  	
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

$nome 			= $_POST["nome"];
$dt_nasc		= $_POST["dt_nasc"];
$cpf 			= $_POST["cpf"];
$rg 			= $_POST["rg"];
$sexo 			= $_POST["sexo"];
$telefone 		= $_POST["telefone"];
$email			= $_POST["email"];
$senha 			= $_POST["senha"];
$nvl_acesso 	= $_POST["nvl_acesso"];
$cep			= $_POST["cep"];


$sql = "insert into usuario values ";
$sql .= "('0','$nome','$dt_nasc','$cpf','$rg','$sexo','$telefone','$email','$senha','$nvl_acesso','1','$cep');";

$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

if($resultado){
	header('Location: \crud-usu/index.php?page=lista_usu&msg=1');
	mysqli_close($con);
}else{
	header('Location: \crud-usu/index.php?page=lista_usu&msg=6');
	mysqli_close($con);
}
?>