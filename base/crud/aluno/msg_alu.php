<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 2;
	include "base/testa_nivel.php"; 
	include "base/config.php";

if(isset($_GET['msgs'])){
	$msgs = $_GET['msgs'];
	
	switch($msgs){
		
		case 1:
			echo '	<div class="alert alert-primary alert-dismissible fade show text-center font-weight-bold text-muted" role="alert">
							Perfil atualizado com sucesso!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			break;
		
		case 2:
			echo '	<div class="alert alert-primary alert-dismissible fade show" role="alert">
						Erro ao acessar a Base de dados! Contate o administrdor!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
			break;

		case 3:
			echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert" style="margin-top: -25px;">
						Você desbloqueou um novo certificado! <a href="?content_alu=emissao_certificado" class="alert-link text-primary">Clique aqui</a> para conferir.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			break;

		case 4:
			$queryCur = mysqli_query($con, "Select * from curso where id_curso = ".$_GET['data'].";");
			$infoCur = mysqli_fetch_array($queryCur);
			echo '	<div class="alert alert-success alert-dismissible fade show text-center font-weight-bold text-muted" role="alert" style="margin-top: -25px;">
						Você acaba de desbloquear o certificado de <a href="?content_alu=pagamento_certificado&curso='.$infoCur['sigla_curso'].'" class="alert-link text-primary"><strong class="text-uppercase">'.$infoCur['nome_curso'].'</strong> </a> ! clique para obtê-lo.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
			break;
	}
	$msgs = 0;
}
?>
