<?php 
    //Definindo nível de acesso para esta página & fazendo a verificação.
 	$nivel_necessario = 3;
 	include "base/testa_nivel.php"; 


    // Pegando os dados da sessão em relação ao ID p/ imprimir na view
	$id_usu = $_SESSION['UsuarioID'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$id_usu."';");
	$row = mysqli_fetch_array($sql);

	//Incluindo as Mensagens
	include "base/crud/admin/mensagens/msg_adm.php";
?>

<?php 
    //Definindo nível de acesso para esta página & fazendo a verificação.
 	$nivel_necessario = 2;
 	include "base/testa_nivel.php"; 


    // Pegando os dados da sessão em relação ao ID p/ imprimir na view
	$id_usu = $_SESSION['UsuarioID'];
	$sql = mysqli_query($con, "select * from usuario where id_usu = '".$id_usu."';");
	$row = mysqli_fetch_array($sql);
    
	//Incluindo as Mensagens
	include "base/crud/aluno/msg_alu.php";
?>

<div class="hd_view row">
	<h3 class="content-title col-9 m-0">Meu Perfil</h3>		
	<div class="col-3"><a class="float-right btn-back btn btn-sm bt-padrao" onclick="goBack()"> <i class="bi bi-arrow-left"></i> Voltar </a></div>
</div>

<h4 class="content-subtitle ">Informações Pessoais</h4>

<hr class="">

<div class="block">
	<p class="info-person">Nome Completo:</p>
	<p class="person"><?php echo $row['nome'];?></p>
</div>
<div class="block">
	<p class="info-person">Usuário:</p>
	<p class="person"><?php echo $row['usuario'];?></p>
</div>
<div class="block">
	<p class="info-person">E-mail:</p>
	<p class="person"><?php echo $row['email'];?></p>
</div>
<div class="block">
	<p class="info-person">Telefone:</p>
	<p class="person"><?php echo $row['telefone'];?></p>
</div>
<div class="block">
	<p class="info-person">Sexo:</p>
	<p class="person"><?php if($row["sexo"]=='1'){
							echo "Masculino";
						}elseif($row["sexo"]=='2'){
							echo "Feminino";
						}
						elseif($row["sexo"]=='3') {
							echo "Outros";
						}else {
							echo "Não Informado";
						}?></p>
</div>
	
<h3 class="content-subtitle-sub">Alterar sua senha</h3>

<hr>
<form action="" method="" autocomplete="off">
	<div class="column-password">
		<p class="view-password-p">Senha Atual</p>
		<input type="text" class="view-password" id="password" name="password" autocomplete="off" required>
	</div>
	<br>
	<div class="row pb-5 password-group">
		<div class="col-6">
			<p class="view-password-p">Nova senha <span class="desc-pass">(Minímo de 8 caractéres)</span></p>
			<input type="text" class="view-password" id="password" name="password" autocomplete="off" required>
		</div>
		<div class="col-6">
			<p class="view-password-p">Confirme a nova senha <span class="desc-pass">(Minímo de 8 caractéres)</span></p>
			<input type="text" class="view-password" id="password" name="password" autocomplete="off" required>
		</div>
	</div>
	<div class="button-password pb-5">
	<button type="submit"><a href="#">Salvar nova senha</a></button>
	</div>


</form>
				
				
			
		




