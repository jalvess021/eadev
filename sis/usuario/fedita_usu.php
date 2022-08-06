<?php
$nivel_necessario = 2;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=4"); exit;
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title> .:: SCL ::.</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>

<?php
include "../base/conexao.php";

$id = (int) $_GET['id'];
$sql = mysqli_query($con, "select * from usuario where id = '".$id."';");
$row = mysqli_fetch_array($sql);
?>

<body>
<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	<br><h3 class="page-header">Editar registro da Usuário - <?php echo $id;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_usu.php?id=<?php echo $row['id']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-xs-1">
			<label for="id">ID</label>
			<input readonly type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>">
		</div>
		
		<div class="form-group col-xs-5">
			<label for="nome">Nome de Usuário</label>
			<input type="text" class="form-control" name="nome" value="<?php echo $row["nome"]; ?>">
		</div>
		
		<div class="form-group col-xs-3">
			<label for="usuario">Usuário</label>
			<input type="text" class="form-control" name="usuario" value="<?php echo $row["usuario"]; ?>">
		</div>
		
		<div class="form-group col-xs-3">
			<label for="senha">Senha</label>
			<input readonly type="text" class="form-control" name="senha" value="<?php echo $row["senha"]; ?>">
		</div>
	
	</div>	
	
	<!-- 2ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-xs-4">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
		</div>
		
		<div class="form-group col-xs-2">
			<label for="nivel">Nível</label>
			<select class="form-control" id="nivel">
				<option value="1"<?php if (!(strcmp(1, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Relatórios</option>
				<option value="2"<?php if (!(strcmp(2, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Cadastros</option>
				<option value="3"<?php if (!(strcmp(3, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Administrador</option>		
			</select>
		</div>
		
		<div class="form-group col-xs-3">
			<label for="dt_cad">Data da Edição</label>
			<input type="text" disabled="disabled" class="form-control" name="dt_cad" value="<?php echo date('d/m/Y'); ?>">
		</div>
		
		<div class="form-group col-xs-2">
			<label for="ativo">Ativo</label><br>
			<?php
			if($row["ativo"]==1){
				echo "<label>SIM</label>";
			}else if($row["ativo"]==0){
				echo "<label>NÃO</label>";
			}
			?>
		</div>
	
	</div>

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_usu.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>


</body>
</html>