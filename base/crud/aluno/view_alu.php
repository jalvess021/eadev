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
	<div class="col-3"><a href="?content_adm=view" class="float-right btn-back btn btn-sm bt-padrao"> <i class="bi bi-arrow-left"></i> Voltar </a></div>
</div>	
<nav class="mt-5">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active dados_view" id="nav-pessoais-tab" data-toggle="tab" href="#nav-pessoais" role="tab" aria-controls="nav-pessoais" aria-selected="true">Dados pessoais</a>
		<a class="nav-item nav-link dados_view" id="nav-complementares-tab" data-toggle="tab" href="#nav-complementares" role="tab" aria-controls="nav-complementares" aria-selected="false">Dados complementares</a>
	</div>
</nav>
<div class="tab-content" id="nav-tabContent">
 	<!-- Dados pessoais-->
	<div class="tab-pane fade show active" id="nav-pessoais" role="tabpanel" aria-labelledby="nav-pessoais-tab">
		<?php include "base/crud/aluno/dados/pessoais.php";?>
	</div>
   <!-- Dados complementares-->
  <div class="tab-pane fade" id="nav-complementares" role="tabpanel" aria-labelledby="nav-complementares-tab">
  		<?php include "base/crud/aluno/dados/complementares.php";?>			
  </div>
</div>







<!--Função para voltar p/ pág anterior (Simulando o voltar do navegador) 'ADD: onclick='goBack() no input'"-->
				<!--  
				<script>
				function goBack() {
					window.history.back()
				}
				</script> -->



