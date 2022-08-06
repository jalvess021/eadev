<?php 
		 //Definindo nível de acesso para esta página & fazendo a verificação.
		$nivel_necessario = 3;
		include "base/testa_nivel.php"; 
?>


<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Usuários</h2>
		</div>

		<div class="col-md-1">
			<!-- Chama o Formulário para adicionar usuário -->
			<a href="&page=fadd_usu" class="btn btn-primary pull-right h2">Novo Usuário</a> 
		</div>
	</div>
	<div>	<?php include "mensagens.php";?>	</div>
	<!--top - Lista dos Campos-->
	<hr/>
	<div id="bloco-list-pag">	
		<div id="list" class="row">
			<div class="table-responsive col-xs-12">
				<?php
					$quantidade = 5;

					$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
					$inicio = ($quantidade * $pagina) - $quantidade;

					$data_all = mysqli_query($con, "select * from usuario order by id_usu asc limit $inicio, $quantidade;") or die(mysqli_error());

					echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
					echo "<thead><tr>";
					echo "<td><strong>id</strong></td>"; 
					echo "<td><strong>Nome do usuário</strong></td>"; 
					echo "<td><strong>Data de nascimento</strong></td>";
					echo "<td><strong>CPF</strong></td>";
					echo "<td><strong>RG</strong></td>";
					echo "<td><strong>Sexo</strong></td>";
					echo "<td><strong>Telefone</strong></td>";
					echo "<td><strong>Email</strong></td>";
					echo "<td><strong>Senha</strong></td>";
					echo "<td><strong>Nivel de acesso</strong></td>";
					echo "<td><strong>Cep</strong></td>";
					echo "<td class='actions'><strong>Ações</strong></td>"; 
					echo "</tr></thead><tbody>";

					while($info = mysqli_fetch_array($data_all)){ 
						echo "<tr>";
						echo "<td>".$info['id_usu']."</td>";
						echo "<td>".$info['nome']."</td>";
						echo "<td>".$info['dt_nasc']."</td>";
						echo "<td>".$info['cpf']."</td>";
						echo "<td>".$info['rg']." </td>";
						echo "<td>".$info['sexo']."</td>";
						echo "<td>".$info['telefone']."</td>";
						echo "<td>".$info['email']."</td>";
						echo "<td>".$info['senha']."</td>";
						echo "<td>".$info['nvl_acesso']."</td>";
						echo "<td>".$info['cep']."</td>";
					
					
						echo "<td><div class='btn-group btn-group-xs'>";
						echo "<a class='btn btn-info btn-xs' href=?page=view_usu&id=".$info['id_usu']."> Detalhar </a>";
						echo "<a class='btn btn-warning btn-xs' href=?page=fedita_usu&id=".$info['id_usu']."> Editar </a>";
						if($info['status'] == 1){
							echo "<a class='btn btn-danger btn-xs'  href=?page=block_usu&id=".$info['id_usu']."> Bloquear </a>";
						}else if($info['status'] == 0){
							echo "<a class='btn btn-success btn-xs'  href=?page=ativa_usu&id=".$info['id_usu'].">&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a></div></td>";
						}
					}
					echo "</tr></tbody></table>";
				?>				
			</div><!-- Div Table -->
		</div><!--list-->

		<!-- PAGINAÇÃO -->
		<div id="bottom" class="row">
			<div class="col-md-12">
				<?php
					$sqlTotal 		= "select id_usu from usuario;";
					$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);

					$exibir = 3;

					$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;

					echo "<ul class='pagination'>";
					echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=1'> Primeira</a></li> "; 
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$anterior\"> Anterior</a></li> ";

					echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";

					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_usu&pagina=".$i."'> ".$i." </a></li> ";
					}

					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_usu&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

				?>	
			</div>
		</div><!--bottom-->
	</div>
</div><!--main-->