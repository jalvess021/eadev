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

<?php 
/*

<h2 class="text-center text-info text-uppercase"> <!--Echo curso--> HTML</h2>
			<hr>
			<div class="row justify-content-center align-items-center mx-2 mx-lg-1 p-2 content-body">
				<div class="card text-center col-xl-7 col-lg-12 p-0 all-card">
					<div class="card-header b-grey top-card">
						<h5 class="p-2 text-dark font-italic">Módulo: 1 <i class="bi bi-patch-question-fill ml-2 c-destaque-1" title="<?php echo 'Fundamentar: Fundamntos do HTML';?>"></i></h5>
						<ul class=" p-0 nav nav-pills card-header-pills d-flex flex-row justify-content-center">
							<li class="nav-item">
								<a class="nav-link active bg-info ml-1" href="#">Aulas</a>
							</li>
							<li class="nav-item aula-link">
								<a class="nav-link text-secondary" href="#">Conceitos</a>
							</li>
							<li class="nav-item aula-link">
								<a class="nav-link text-secondary" href="#">fundamentos</a>
							</li>
							<li class="nav-item aula-link">
								<a class="nav-link text-secondary" href="#">Tags</a>
							</li>
							<li class="nav-item aula-link">
								<a class="nav-link text-secondary " href="#">Div e Classes</a>
							</li>
							<li class="nav-item aula-link">
								<a class="nav-link text-secondary " href="#">Semântica</a>
							</li>
							
						</ul>
					</div>
					<div class="card-body bg-light video-player-div">
						<iframe class="video-player" style="--aspect-ratio: 16/9;" height="100%" width="100%" src="https://www.youtube-nocookie.com/embed/HaSgt1hK2Fs?rel=0&modestbranding=1&autohide=1&showinfo=0&iv_load_policy=3&start=27&end=347" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="scrollar col-12 col-xl-4 mt-4 mt-xl-0 ml-lg-4">
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
										<button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<span class="font-weight-bold">Módulo #1</span>
										</button>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
	
								<div class="card-body">
										<h4 class="font-weight-bold">Fundamentar</h4>
										<hr>
										<p>No módulo 1 você encontrará tudo relacionado aos fundamentos básicos do <strong>HTML</strong>, tais como: Tags, Div, ID & Classes e Semântica.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
										<button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<span class="font-weight-bold">Módulo #2</span> 
										</button>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<h4 class="font-weight-bold">Redescobrir</h4>
										<hr>
										<p>No módulo 2 você encontrará necessitatibus aperiam perferendis harum vel ducimus animi ratione debitis veritatis. Animi minima incidunt voluptas reiciendis. </p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<span class="font-weight-bold">Módulo #3</span>
									</button>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<h4 class="font-weight-bold">Mão na massa</h4>
										<hr>
										<p>No módulo 3 você encontrará necessitatibus aperiam perferendis harum vel ducimus animi ratione debitis veritatis. Animi minima incidunt voluptas reiciendis.</p>
									</div>
								</div>
							</div>
						</div>

				</div>
			</div>

*/

?>