<?php 
	date_default_timezone_set ("America/Sao_Paulo");
    
	$nivel_necessario = 2;
    include "base/testa_nivel.php";
?> 

<!DOCTYPE html>
<?php ob_start(); 
// Esta função irá ativar o buffer de saída. Enquanto o buffer de saída estiver ativo, não é enviada a saída do script (outros que não sejam cabeçalhos), ao invés a saída é guardada em um buffer interno.
?> 
<html lang="pt-br">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title> Plataforma | Eadev</title>
			<link rel="shortcut icon" href="arquivos/img/icone/icone1.png">

			<!-- Css-local, Boostrap V4.2.1 & Css-Config -->
			<link href="assets/css/all-dashboard.css" rel="stylesheet" type="text/css"/>
			
			<?php include "base/config.php";?>	
	</head>
<!-- Não deixa ficar arrastando o conteúdo -->
	<body class="adminbody" ondragstart="return false">
			<div id="main">
				
				<!-- Header -->
					<div class="headerbar">
						<?php include "base/dashboard/globais/db_headerbar.php";?>
					</div>
				<!-- End Navigation -->

				<!--  Sidebar -->
					<div class="left main-sidebar b-dark">
						<?php include "base/dashboard/globais/sidebar.php";?>
					</div>
				<!-- End Sidebar -->
		
				<!-- Conteúdo -->
					<div class="content-page">
						<?php include "base/dashboard/globais/usu_content.php";?>
					</div>	
				<!-- END content-page -->

				<!--footer-->
					<?php include "base/dashboard/globais/db_footer.php"?>
				<!-- End footer -->

			</div><!-- END main -->
	</body>
		
						<!--INCLUDE DOS ARQUIVOS JS-->
						<?php include "base/areaScript.php";?>
			<script src="https://kit.fontawesome.com/11ec0de9ac.js" crossorigin="anonymous"></script>

			
</html>
<?php ob_end_flush(); //Esta função irá enviar o conteúdo do buffer mais em cima (se existir algum) e desativar o buffer de saída. 
?>