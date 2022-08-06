<div id="content-page">
	<div id="top" class="row">
		<div class="col-md-3">
			<h2>Usuários</h2>
		</div>
		<!-- Pesquisa contas registradas na tabela -->
		<div class="input-group mb-3 col-md-6">
  			<input type="text" name="data-[search]" onKeydown="Javascript: if (event.keyCode==13) PesquisaConteudoUsu();" class="form-control" placeholder="Pesquisar Usuários" >
  				<div class="input-group-append">
    				<button class="btn btn-outline-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
  				</div>
		</div>
				
		<div class="col-md-3">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="usuario/fadd_usu.php" id="novo" class="btn btn-primary pull-right h2">Novo Usuário</a> 
		</div>
		
	</div>
	<div>	<?php include "mensagens.php"; ?>	</div>
			<!--top - Lista dos Campos-->
	<div id="bloco-list-pag">	
		<div id="list" class="row">
			<div class="table table-responsive col-xs-12">
				
						<?php
							include "../base/conexao.php";
							$quantidade = 10;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$data_all = mysqli_query($con, "select * from usuario order by id asc limit $inicio, $quantidade;") or die(mysqli_error());
							
							echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
							echo "<thead><tr>";
							echo "<td><strong>ID</strong></td>"; 
							echo "<td><strong>Nome do usuário</strong></td>"; 
							echo "<td><strong>Usuário</strong></td>";
							echo "<td><strong>Senha</strong></td>";
							echo "<td><strong>E-mail</strong></td>";
							echo "<td><strong>Nível</strong></td>";
							echo "<td><strong>Ativo</strong></td>";
							echo "<td><strong>Data cad/ed</strong></td>";
							echo "<td class='actions'><strong>Ações</strong></td>"; 
							echo "</tr></thead><tbody>";
							
							while($info = mysqli_fetch_array($data_all)){ 
								
								echo "<tr>"; //Início da Linha de um registro...
								echo "<td>".$info['id']."</td>";
								echo "<td>".$info['nome']."</td>";
								echo "<td>".$info['usuario']."</td>";
								echo "<td>".$info['senha']."</td>";
								echo "<td>".$info['email']." </td>";
								echo "<td>".$info['nivel']."</td>";
								if($info['ativo'] == 1){
									echo "<td>SIM</td>";
								}else if($info['ativo'] == 0){
									echo "<td>NÃO</td>";
								}

								echo "<td>".date('d/m/Y',strtotime($info['dt_cadastro']))."</td>";
								echo "<td><div class='btn-group btn-group-xs'>";
								echo "<a class='btn btn-info btn-xs' href=usuario/view_usu.php?id=".$info['id']."> Detalhar </a>";
								echo "<a class='btn btn-warning btn-xs' href=fedita_usu.php?id=".$info['id']."> Editar </a>";
								if($info['ativo'] == 1){
									echo "<a class='btn btn-danger btn-xs'  href=block_usu.php?id=".$info['id']."> Bloquear </a>";
								}else if($info['ativo'] == 0){
									echo "<a class='btn btn-success btn-xs'  href=ativa_usu.php?id=".$info['id'].">&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a></div></td>";
								}
							}
						?>				

							</tr><!-- Fim da Linha é um registro...-->
							</tbody>
							</table>

					</div>
				</div><!--list-->

				<!-- PAGINAÇÃO -->
				<div id="bottom" class="row">
					<div class="col-xs-12">
						<nav>
							<ul class="pagination justify-content-center">
								<?php 
									$sqlTotal 		= "select id from usuario;";
									$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
									$numTotal 		= mysqli_num_rows($qrTotal);
									$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
																
									$exibir = 3;
									
									$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
									$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
									
									echo "<li class='page-item'><a class='page-link' href='?pagina=1'> Primeira</a></li> "; 
									echo "<li class='page-item'><a class='page-link' href=\"?pagina=$anterior\"> Anterior</a></li> ";
									

										echo '<li class="page-item"><a class="page-link" href="?pagina='.$pagina.'"><strong>'.$pagina.'</strong></a></li> ';
										
									for($i = $pagina+1; $i < $pagina+$exibir; $i++){
										if($i <= $totalpagina)
											echo '<li class="page-item"><a class="page-link" href="?pagina='.$i.'"> '.$i.' </a></li> ';
										}
										
									echo "<li class='page-item'><a class='page-link' href=\"?pagina=$posterior\"> Pr&oacute;xima</a></li> ";
									echo "<li class='page-item'><a class='page-link' href=\"?pagina=$totalpagina\"> &Uacute;ltima</a></li>";
								
								?>	
							</ul>
						</nav>
					</div>
				</div><!--bottom-->
			</div>
		</div><!--main-->

