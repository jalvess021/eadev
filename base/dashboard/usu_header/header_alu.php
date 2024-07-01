<?php 
    $nivel_necessario = 2;
    include "base/testa_nivel.php"; 
?>

<!-- LOGO -->
<div class="headerbar-left bg-light">
    <a href="index.php" target="_blank" class="logo">
        <img alt="Logo" id="logo-headerbar" src="arquivos/img/logo/logo1.png" />
    </a>
</div>
<nav class="navbar-custom bg-light">
            <ul class="list-inline float-right mb-0">
                <!-- Sessão Perfil -->
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/avatars/img-settings2.png" alt="Configurações" class="avatar-rounded">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title bg-info">
                            <h5 class="text-overflow"><small>Olá, Aluno...</small> </h5>
                        </div>
                        <!-- item-->
                        <a href="?content_alu=perfil" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Perfil</span>
                        </a>
                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Sair</span>
                        </a>
                    </div>
                </li>
                <!-- END Sessão notificações -->
            </ul>
            <!-- HAMBURGUER -->
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>                        
            </ul>
</nav>