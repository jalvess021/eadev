<?php
    date_default_timezone_set ("America/Sao_Paulo");

	$nivel_necessario = 2;
    include "../../../../../../testa_nivel.php";
    include "../../../../../../config.php";

    if (isset($_POST['curso']) && isset($_POST['aluno'])) {
            $queryConcluirAv = mysqli_query($con, "UPDATE avaliacoes set status_av = 2, num_tent_restantes = NULL, status_tent = NULL WHERE id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";");
            if ($queryConcluirAv) {
                $queryCur = mysqli_query($con, "Select * from curso where id_curso = ".$_POST['curso'].";");
                $infoCur = mysqli_fetch_array($queryCur);
                $curso = array(
                    'idCurso' => $infoCur['id_curso']
                );
                echo json_encode($curso);
                mysqli_close($con);
            }else {
                header('Location: \tcc/plataforma.php?content_alu=avaliacoes&msgs=2');
                mysqli_close($con);
            }
    }
?>