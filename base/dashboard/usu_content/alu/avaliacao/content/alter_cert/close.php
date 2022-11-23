<?php
    date_default_timezone_set ("America/Sao_Paulo");

	$nivel_necessario = 2;
    include "../../../../../../testa_nivel.php";
    include "../../../../../../config.php";

    if (isset($_GET['curso']) && isset($_GET['aluno'])) {
        $queryIsset = mysqli_query($con, "SELECT id_av FROM avaliacoes where id_aluno = ".$_GET['aluno']." and id_curso = ".$_GET['curso'].";");
        if (mysqli_num_rows($queryIsset) > 0) {
            $queryConcluirAv = mysqli_query($con, "UPDATE avaliacoes set status_av = 2, num_tent_restantes = NULL, status_tent = NULL, dt_conclusao = NOW() WHERE id_aluno = ".$_GET['aluno']." and id_curso = ".$_GET['curso'].";");
            if ($queryConcluirAv) {
                header('Location: \tcc/plataforma.php?content_alu=avaliacoes&msgs=3');
                mysqli_close($con);
            }else {
                header('Location: \tcc/plataforma.php?content_alu=avaliacoes&msgs=2');
                mysqli_close($con);
            }
            
        }else {
            header('Location: \tcc/plataforma.php?content_alu=avaliacoes&msgs=2');
            mysqli_close($con);
        }
    }else {
        header('Location: \tcc/plataforma.php?content_alu=avaliacoes');
        mysqli_close($con);
    }
?>