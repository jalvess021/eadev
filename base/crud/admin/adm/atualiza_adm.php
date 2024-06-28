<?php
    //Definindo nível de acesso para esta página & fazendo a verificação.
 	$nivel_necessario = 3;
 	include "base/testa_nivel.php"; 

    $id_usu         = $_SESSION['UsuarioID'];
    $nome 			= $_POST["nome"];
    $dt_nasc		= $_POST["dt_nasc"];
    $sexo 			= $_POST["sexo"];
    $telefone 		= $_POST["telefone"];
    // $soNumeros      = (int) filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);
    $email			= $_POST["email"];
    $senha 			= $_POST["senha"];
    $cep			= $_POST["cep"];

$sql = "update usuario set ";
$sql .= "nome='".$nome."',dt_nasc='".$dt_nasc."', sexo='".$sexo."', telefone='".$telefone."', email='".$email."', cep='".$cep."' ";
$sql .= "where id_usu = '".$id_usu."';";


$resultado = mysqli_query($con, $sql)or die(mysqli_error());

if($resultado){
	header('Location: \eadev/plataforma.php?content_adm=perfil&msg=2');
    mysqli_close($con);
}else{
	header('Location: \eadev/plataforma.php?msg=6');
    mysqli_close($con);
}

?>
