<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 
?>

<div> <?php include "mensagens.php"; ?> </div>
<div id="main" class="container-fluid">
	<h3 class="page-header">Cadastrar Usuário</h3>
	<form action="?page=insere_usu" method="post">
		
		<div id="linha01" class="row"> 
			<div class="form-group col-md-1">
				<label for="id_usu">ID</label>
				<input type="text" disabled="disabled" value="0" class="form-control" name="id_usu">
			</div>
			
			<div class="form-group col-md-4">
				<label for="nome">Nome do Usuário</label>
				<input type="text" class="form-control" name="nome">
			</div>
			
			<div class="form-group col-md-3">
				<label for="dt_nasc">Data de nascimento</label>
				<input type="date" class="form-control" name="dt_nasc">
			</div>
			
			<div class="form-group col-md-2">
				<label for="cpf">cpf</label>
				<input type="text" class="form-control" name="cpf">
			</div>
			
		</div>
		
		<div id="linha02" class="row"> 
				
			<div class="form-group col-md-2">
				<label for="rg">RG</label>
				<input type="text" class="form-control" name="rg">
			</div>

			<div class="form-group col-md-2">
				<label for="sexo">Sexo</label>
				<select class="form-control" name="sexo" id="sexo">
					<option value="M" >--Masculino--</option>
					<option value="F">--Feminino--</option>						<option value="Null">-Prefiro não dizer-</option>	
				</select>
			</div>
						
			<div class="form-group col-md-2">
				<label for="telefone">Telefone</label>
				<input type="text" class="form-control" name="telefone">		
			</div>

			<div class="form-group col-md-3">
				<label for="email">E-mail</label>
				<input type="text" class="form-control" name="email">		
			</div>
		</div>

		<div id="linha03" class="row"> 

			<div class="form-group col-md-2">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" name="senha">		
			</div>
			<div class="form-group col-md-2">
				<label for="nvl_acesso">Nivel de acesso</label>
				<select class="form-control" name="nvl_acesso" id="nvl_acesso">
					<option value="1" >Administrador</option>
					<option value="2">Aluno</option></select>			
			</div>
			<div class="form-group col-md-2">
				<label for="cep">Cep</label>
				<input type="text" class="form-control" name="cep">		
			</div>

		</div>
			<hr />
			 <div id="actions" class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<a href="?page=lista_usu" class="btn btn-default">Cancelar</a>
				</div>	
			</div> 
		

	</form> 
</div>
