<?php
     $nivel_necessario = 3;
    include "base/testa_nivel.php"; 
?>

<div class="sidebar-inner leftscroll b-dark">

        <div id="sidebar-menu">
        
			<ul>
					<li class="submenu">
						<a class="active b-destaque-1" href="plataforma.php"><i class="fa fa-fw fa-bars"></i><span> Painel </span> </a>
                    </li>

                    <li class="submenu">
						<a><i class="bi bi-clipboard2-check-fill"></i> <span> Gerenciar </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <!--<li><a href="#"><i class="bi bi-diagram-2-fill"></i> Formações</a></li>-->
                                <li><a href="?content_adm=lista_cur"><i class="bi bi-person-video3"></i>Cursos</a></li>
                                <li><a href="?content_adm=lista_mod"><i class="bi bi-layers-fill"></i>Módulos</a></li>
								<li><a href="?content_adm=lista_aula"><i class="bi bi-collection-play-fill"></i>Aulas</a></li>
                            </ul>
                    </li>

					<li class="submenu">
                        <a href="#"><i class="bi bi-search"></i> <span> Consultar </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><a href="#"><i class="fa fa-fw fa-user"></i>Administrador</a></li>
								<li><a href="#"><i class="fa fa-fw fa-graduation-cap"></i>Aluno</a></li>
							</ul>
                    </li>				           
                   
                    <li class="submenu">
						<a href="#"><i class="bi bi-code"></i> <span> Desafios </span> <span class="menu-arrow"></span></a>
                    </li>

					<li class="submenu">
                        <a href="#"><i class="bi bi-file-earmark-bar-graph-fill"></i><span> Relatórios </span></a>
                            <ul>
								<li>
                                    <a href="#"><span>Acadêmico</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="#"><span>Desempenho</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="#"><span>Certificado</span></a>
                                </li>                                
                            </ul>
                    </li>

					<li class="submenu">
                        <a class="pro" href="#"></span><span class="label radius-circle bg-primary float-right">2</span><i class="bi bi-list-check"></i><span> Avaliações </span> </a>
                            <ul class="list-unstyled">								
                                <li><a href="#">Atualizar disponibilidade</a></li>
								<li><a href="#">Atualizar diário</a></li>
                            </ul>
                    </li>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>