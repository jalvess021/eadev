<?php
// Verifica se houve POST e se o usuário ou a senha estão vazios
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
	header("Location: index.php"); exit;
}

$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);


// Validação do usuário/senha digitados
$sql  = "select id_usu, nome, nvl_acesso, usuario from usuario where (usuario = '". $usuario ."') ";
$sql .= "and (senha = '". sha1($senha) ."') and (status = 1) limit 1";

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	header('Content-Type: text/html; charset=utf-8');
	echo "
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

	<div class='d-flex flex-row justify-content-center align-items-center' style='100vh'>
			<div class='alert alert-danger mt-3' role='alert'>
			Usuário ou Senha incorretos! <a href='index.php' class='alert-link'> CLIQUE AQUI</a> para acessar! 
			</div>
	<div>"; exit;
} else {
	// Salva os dados encontados na variável $resultado
	$resultado = mysqli_fetch_assoc($query);
	
////// 4.0 - Salvando os dados na sessão do PHP ////////

	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID'] = $resultado['id_usu'];
	$_SESSION['UsuarioNome'] = $resultado['nome'];
	$_SESSION['UsuarioNivel'] = $resultado['nvl_acesso'];
	$_SESSION['Usuario']	 = $resultado['usuario'];

	 /// Redireciona o visitante
	switch($_SESSION['UsuarioNivel']){
		case 2: header("Location: \\eadev/plataforma.php"); exit;break;
		case 3: header("Location: \\eadev/plataforma.php"); exit;break;
	}
}
?>