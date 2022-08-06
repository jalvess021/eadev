<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 2;
	include "base/testa_nivel.php"; 

if(isset($_GET['msgs'])){
	$msgs = $_GET['msgs'];
	
	switch($msgs){
		case 1:
			echo '	<div class="alert alert-success alert-dismissible fade show" role="alert">
						Usuário cadastrado com sucesso!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  			</div>';
			break;
		
		case 2:
			echo '	<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top:30px;"> Perfil atualizado com sucesso!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
        			</div>';
			break;
		
		case 3:
			echo '	<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Usuário bloqueado  com sucesso! Este Usuário agora está INATIVO!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			break;
		
		case 4:
			echo '	<div class="alert alert-warning alert-dismissible fade show" role="alert">
						Usuário sem permissão de acesso para o conteúdo!<br>Por favor, acesse com a permissão necessária.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			break;
		
		case 5:
			echo '	<div class="alert alert-primary alert-dismissible fade show" role="alert">
						Usuário desbloqueado  com sucesso! Este Usuário agora está ATIVO!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			break;
		
		case 6:
			echo '	<div class="alert alert-primary alert-dismissible fade show" role="alert">
						Erro ao acessar a Base de dados! Contate o administrdor!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			break;
	}
	$msgs = 0;
}
?>
