<?php   
        date_default_timezone_set ("America/Sao_Paulo");
        include "../../base/config.php";        
        include "../../base/crud/atv_usu/atv.php";

            $usu = $_POST['usuario'];
            $sqlUsu = mysqli_query($con, "SELECT * from usuario where id_usu = ".$usu.";");
            $infoUsu = mysqli_fetch_array($sqlUsu);

            $id_aluno = $_POST['aluno'];
            $aula = $_POST['aula'];

            $sql = "UPDATE aula_alu set status_aula = 2, dt_conclusao = NOW() where id_aluno = ".$id_aluno." and id_aula = ".$aula.";";
            $res = mysqli_query($con, $sql);
            $usu_atv = mysqli_query($con, atvAlu($infoUsu['nome'], str_replace( array("'"), "\'", $sql), $id_aluno));
        
?>