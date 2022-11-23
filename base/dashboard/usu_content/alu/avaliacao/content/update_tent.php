<?php
//ATENCAO 99999999999999999999999999999999999999999
    date_default_timezone_set ("America/Sao_Paulo");

	$nivel_necessario = 2;
    include "../../../../../testa_nivel.php";
    include "../../../../../config.php";

    if (isset($_POST['curso']) && isset($_POST['aluno'])) {
        $queryTent1 = mysqli_query($con, "SELECT num_tent_restantes from avaliacoes where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";");
        $numTent = mysqli_fetch_array($queryTent1);
        $newTent = (int)$numTent[0] - 1;
        if ($numTent[0] == 1) {
            $queryTent2 = mysqli_query($con, "UPDATE avaliacoes set num_tent_restantes = ".$newTent." and status_tent = 3 where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";"); 
        }else {
            $queryTent2 = mysqli_query($con, "UPDATE avaliacoes set num_tent_restantes = ".$newTent." where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";");
        }
        
        
        if ($queryTent2) {
            $tentativas = array(
                'tent_restantes' => $newTent 
            );
            echo json_encode($tentativas);
        }else {
            header('Location: \tcc/plataforma.php?content_alu=avaliacoes&msgs=2');
        }
    }
?>