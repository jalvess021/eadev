<?php
    $nivel_necessario = 2;
    include "base/testa_nivel.php"; 

    if ($_SESSION['UsuarioNivel'] == 2) {
        include "base/dashboard/usu_sidebar/sidebar_alu.php";
    } elseif ($_SESSION['UsuarioNivel'] == 3) {
        include "base/dashboard/usu_sidebar/sidebar_adm.php";
    }
?>