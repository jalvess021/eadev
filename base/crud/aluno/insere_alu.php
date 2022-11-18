<?php		  	

//Setando valores do POST (Dados recebidos) do formulário de CADASTRO nas variáveis
$nome 			= $_POST["nome"];
$usuario        = $_POST["usuario"];
$email			= $_POST["email"];
$telefone 		= $_POST["telefone"];
$sexo 			= $_POST["sexo"];
$senha 			= sha1($_POST["senha"]);


// Inserindo dados do usuário (Futuramente aluno) no banco de dados pela Pág. Cadastro
$sql1 = "insert into usuario values ";
$sql1 .= "(0, '$usuario', '$senha', '$nome', '$sexo', '$telefone', '$email', 2, 1, NOW());";
$res1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

//Selecionando o mesmo ID cadastrado
$sql2 = "select * from usuario where usuario='". $usuario ."'; ";
$res2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
$info1 = mysqli_fetch_array($res2);

// Transformando o usuário cadastrado obrigatóriamente em aluno
$sql3 = "insert into aluno values (0, 1, '". $info1[0] ."'); ";
$res3 = mysqli_query($con, $sql3) or die(mysqli_error($con));

//Selecionando o ID da tabela aluno que é o mesmo da tabela usuário (ForeignKey)
$sql4 = "select id_aluno from aluno where id_usu='". $info1[0] ."'; ";
$res4 = mysqli_query($con, $sql4) or die(mysqli_error($con));
$info2 = mysqli_fetch_array($res4);

// Inserindo valores na tabela Matriculado
$sql5 = "insert into matriculado values (0, NOW(), 1, ". $info2[0] ."); ";
$res5 = mysqli_query($con, $sql5) or die(mysqli_error($con));

//Inserindo valores na tabela relacional aula_alu
$sql6 = 'INSERT into aula_alu SELECT 0, '.$info2[0].', a.id_aula, 1, NULL from aula AS a ORDER BY a.id_aula;';
$res6 = mysqli_query($con, $sql6); 

$sql7 = "insert into avaliacoes SELECT 0, ".$info2[0].", ".$info1['nome'].", 1, NULL, NULL, 3, c.id_curso  
FROM curso AS c ORDER BY id_curso asc;";
$res7 = mysqli_query($con, $sql7); 

if($res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7){
	header('Location: \tcc/index.php?page=login');
	mysqli_close($con);
}else{
	header('Location: \tcc/index.php?msgs=6');
	mysqli_close($con);
}
?>