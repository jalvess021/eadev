<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
    $nivel_necessario = 3;
    include "base/testa_nivel.php"; 
?>


<div class="content" style="height: calc(100% - 50px);">
	<div class="container-fluid" style="height: calc(100%);">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-holder">
					<h1 class="main-title float-left">Olá, <span class="c-destaque-10 font-weight-bold"><?php echo $_SESSION['Usuario']?></span> !</h1>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item active">Painel Administrativo</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- Início Content page-->
		<div id="content-page" style="height: calc(100% - 73px);"> 	
			<div id="main" class="container-fluid content-body">
         		<?php
				 include "base/dashboard/usu_content/controlador/ch_adm.php";
				?>		
			</div>
		</div>	<!-- End Content page-->
	</div>
</div>