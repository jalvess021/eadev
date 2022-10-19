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
<form action="\tcc/base/crud/admin/perfil/dados/alter.php" method="post" autocomplete="off">
	<div class="column-password">
		<p class="view-password-p">Senha Atual</p>
		<input type="password" class="view-password" id="passwordCurrent" autocomplete="off" required>
	</div>
	<br>
	<div class="row pb-5 password-group">
		<div class="col-6">
			<p class="view-password-p">Nova senha <span class="desc-pass">(Minímo de 8 caractéres)</span></p>
			<input type="text" value='<?php echo $id_usu;?>' name='id_s' id='idUserAlterSen'>
			<input type="password" class="view-password" id="passwordAlter1" name="senha" autocomplete="off" required disabled>
		</div>
		<div class="col-6">
			<p class="view-password-p">Confirme a nova senha <span class="desc-pass">(Minímo de 8 caractéres)</span></p>
			<input type="password" class="view-password" id="passwordAlter2" autocomplete="off" required disabled>
		</div>
	</div>
	<div class="button-password2 pb-5">
	<input type="submit" id='btnSubmitImgUserSen' disabled value='Alterar Senha'>
	</div>
</form>
