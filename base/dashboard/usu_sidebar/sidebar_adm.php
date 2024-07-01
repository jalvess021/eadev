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
                <a href='#'><i class="bi bi-clipboard2-check-fill"></i> <span> Gerenciar </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <!--<li><a href="#"><i class="bi bi-diagram-2-fill"></i> Formações</a></li>-->
                    <li><a href="?content_adm=lista_cur"><i class="bi bi-person-video3"></i>Cursos</a></li>
                    <li><a href="?content_adm=lista_mod"><i class="bi bi-layers-fill"></i>Módulos</a></li>
                    <li><a href="?content_adm=lista_aula"><i class="bi bi-collection-play-fill"></i>Aulas</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="bi bi-search"></i> <span> Consultar </span></a>
                <ul class="list-unstyled">
                    <li><a href="?content_adm=consulta_alu"><i class="fa fa-fw fa-graduation-cap"></i>Aluno</a></li>
                    <li><a href="?content_adm=consulta_adm"><i class="fa fa-fw fa-user"></i>Administrador</a></li>
                    <li><a href="?content_adm=consulta_atv"><i class='bi bi-bar-chart-line-fill'></i>Atividades</a></li>
                </ul>
            </li>	
            <li class="submenu">
                <a href="?content_adm=lista_quest" class='pro'> 
                    <i class="bi bi-list-check"></i><span> Questões </span> <span class="label radius-circle bg-primary float-right"> Avaliativo</span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>