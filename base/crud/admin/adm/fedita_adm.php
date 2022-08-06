
<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	$id_usu = $_SESSION['UsuarioID'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$id_usu."';");
	$row = mysqli_fetch_array($sql);
?>

<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div class="content">
	<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Olá, <?php echo $_SESSION['UsuarioNome']?>!</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Editar meu perfil</li>
							<li class="breadcrumb-item active">Meu perfil</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		<!-- ÁREA DE ATUALIZAÇÃO DAS PÁGINAS VIA **** AJAX **** -->
			<div id="content-page">
				<div id="main" class="container-fluid">
					<h3 class="page-header text-center text-info font-weight-bold text-capitalize">Editar meu perfil</h3>
					
					<!-- Área de campos do formulário de edição-->
					<form action="?content_adm=atualiza" method="POST" class="b-wsmoke p-md-3 rounded border border-secondary">

						<!-- 1ª LINHA -->	
						<div class="row"> 
							<div class="form-group col-md-1">
								<label for="id_usu">ID :</label>
								<input readonly type="text" class="form-control" name="id_usu" value="<?php echo $row["id_usu"]; ?>">
							</div>
							<div class="form-group col-md-5">
								<label for="nome">Nome de Usuário :</label>
								<input type="text" class="form-control" name="nome" value="<?php echo $row["nome"]; ?>">
							</div>
							
							<div class="form-group col-md-3">
								<label for="dt_nasc">Data de Nascimento :</label>
								<input type="date" class="form-control" name="dt_nasc" value="<?php echo $row["dt_nasc"]; ?>">
							</div>

							<div class="form-group col-md-3">
										<label for="telefone">Telefone :</label>
										<input type="text" class="form-control" id="telf" name="telefone" value="<?php echo $row["telefone"]; ?>" placeholder="(00) 00000-0000">
										<script type="text/javascript">$("#telf").mask("(00) 00000-0000");</script>
										<!-- maxlength="15" onkeypress="tel(this)" onkeydown="return somente_numero(event)" -->
							</div>
						</div>	
						<!-- 2ª LINHA -->	
						<div class="row"> 
							<div class="form-group col-md-4">
									<label for="rg">RG :</label>
									<input readonly type="text" class="form-control" name="rg" value="<?php echo $row["rg"]; ?>">
							</div>
							<div class="form-group col-md-4">
									<label for="cpf">CPF :</label>
									<input readonly type="text" class="form-control" name="cpf" value="<?php echo $row["cpf"]; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="cep">CEP :</label>
									<input type="text" class="form-control" name="cep" value="<?php echo $row["cep"]; ?>">
							</div>
						</div>

						<!-- 3ª LINHA -->
						<div class="row">
							<div class="form-group col-md-2">
								<label for="status">Status :</label>
								<?php if (($row['status']) == 1) {
										echo '<input type="text" class="form-control" disabled="disabled" name="status" value="Ativo">';
									} elseif (($row['status']) == 2) {
										echo '<input type="text" class="form-control" disabled="disabled" name="status" value="Bloqueado">';
									} elseif (($row['status']) == 3) {
										echo '<input type="text" class="form-control" disabled="disabled" name="status" value="Desativado">';
									}
								?>
							</div>
							<div class="form-group col-md-5">
								<label for="email">E-mail :</label>
								<input type="text" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="nvl_acesso">Nivel de acesso :</label>
								<?php if (($row['nvl_acesso']) == 2) {
									echo '<input type="text" disabled="disabled" class="form-control" name="nvl_acesso" value="Aluno">';
								}
								elseif (($row['nvl_acesso']) == 3) {
									echo '<input type="text" disabled="disabled" class="form-control" name="nvl_acesso" value="Administrador">';
								}?>
							</div>
							<div class="form-group col-md-2">
								<label for="sexo">Sexo :</label>
								<select class="form-control" name="sexo">
									<?php
									 	if ($row['sexo'] == '1') {
											echo "<option disabled selected value='1'>Masculino</option>";
										}elseif ($row['sexo'] == '2') {
											echo "<option disabled selected value='2'>Feminino</option>";
										}elseif ($row['sexo'] == '3') {
											echo "<option disabled selected value='3'>Outros</option>";
										}else {
											echo "<option disabled selected>Não Selecionado</option>";
										}
									?>

									<?php if($row['sexo']=='1') {
										echo "<option value='2'>Feminino</option>";
										echo "<option value='3'>Outros</option>";
									} elseif($row['sexo']=='2') {
										echo "<option value='1'>Masculino</option>";
										echo "<option value='3'>Outros</option>";
									}elseif($row['sexo']=='3') {
										echo "<option value='1'>Masculino</option>";
										echo "<option value='2'>Feminino</option>";
									}
									else {
										echo "<option value='1'>Masculino</option>";
										echo "<option value='2'>Feminino</option>";
										echo "<option value='3'>Outros</option>";
									}
									?>				
								</select>	
							</div>
						</div>
				</div>
				<hr/>
				<!-- Área dos botões para o envio do formulário-->
						<div id="actions" class="row justify-content-center">
							<div class="col-md-2">
								<div class="row justify-content-around">
									<a href="?content_adm=perfil" class="btn btn-info font-weight-bold"> <i class="bi bi-arrow-left"></i> Voltar</a>
									<button type="submit" class="btn btn-success font-weight-bold">Salvar <i class="bi bi-check-lg"></i></button>
								</div>
							</div>
						</div>
					</form>
			</div>
	</div>
</div>