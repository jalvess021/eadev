<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	
	switch($msg){

		//Ações do ADM (USUÁRIO)

				case 1: //Cadastro realizado
					echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert"> 
								Usuário cadastrado com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;
				
				case 2: //Usuário atualizado
					echo '	<div class="alert alert-info alert-dismissible fade show text-center font-weight-bold text-muted" role="alert"> 
							Usuário atualizado com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;
				
				case 3: //Usuário Bloquado
					echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert"> 
							Usuário bloqueado com sucesso! Este Usuário agora está BLOQUEADO!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;
				
				case 4: //Usuário Ativo
					
					echo '	<div class="alert alert-primary alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Usuário desbloqueado com sucesso! Este Usuário agora está ATIVO!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;



		//Conexão (Plataforma)

				case 5: //Sem permissão de acesso

					echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Usuário sem permissão de acesso para o conteúdo!<br>Por favor, acesse com a permissão necessária.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;



		//ERRO BANCO DE DADOS

				case 6: //Erro de acesso
					echo '	<div class="alert alert-warning alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Erro ao acessar a Base de dados! Contate o desenvolvedor!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;



		//Ações ADM (Curso)
				
				case 7: //Cadastro
					echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Curso cadastrado com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;

				case 8: //Atualizado
					echo '	<div class="alert alert-info alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
								Curso atualizado com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;

				case 9: //Excluído
					echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Curso excluído com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;
		

		
		//Ações ADM (aula)

				case 10: //Cadastro
					echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Aula cadastrada com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;

				case 11: //Atualizada
					echo '	<div class="alert alert-info alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Aula atualizada com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;

				case 12: //Excluída
					echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Aula excluída com sucesso!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
					break;


			//Ações ADM (modulo)

			case 13: //Cadastro
				echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Módulo cadastrado com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

			case 14: //Atualizada
				echo '	<div class="alert alert-info alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Módulo atualizado com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

			case 15: //Excluído
				echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Módulo excluído com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

			//Ações ADM (Avaliacao)

			case 16: //Cadastro
				echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Questão da avaliação cadastrada com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

			case 17: //Atualizada
				echo '	<div class="alert alert-info alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Questão da avaliação atualizada com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

			case 18: //Excluído
				echo '	<div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
						Questão da avaliação excluída com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				break;

		}
	$msg = 0;
}
?>
