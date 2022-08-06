<?php 
    $nivel_necessario = 2;
    include "base/testa_nivel.php"; 
?>

<?php
           if ($_SESSION['UsuarioNivel'] == 2) {
            include "base/dashboard/usu_header/header_alu.php";
        }
        
        elseif ($_SESSION['UsuarioNivel'] == 3) {
            include "base/dashboard/usu_header/header_adm.php";
        }
?>
