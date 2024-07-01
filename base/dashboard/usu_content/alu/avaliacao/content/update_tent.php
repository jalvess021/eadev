<?php
//ATENCAO 99999999999999999999999999999999999999999
    date_default_timezone_set ("America/Sao_Paulo");

	$nivel_necessario = 2;
    include "../../../../../testa_nivel.php";
    include "../../../../../config.php";

    if (isset($_POST['curso']) && isset($_POST['aluno'])) {

        $queryTent1 = mysqli_query($con, "SELECT id_av, num_tent_restantes from avaliacoes where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";");
        $infoTent = mysqli_fetch_array($queryTent1);
        $newTent = (int)$infoTent[1] - 1;
        if ($newTent == 0) { //Se ele só tiver 1 tent. restante, deixa com 0 e muda o status para indisponível 
            //Diminui o numero de tentativas
            $queryTent2 = mysqli_query($con, "UPDATE avaliacoes set num_tent_restantes = ".$newTent.", status_tent = 3, dt_ultima_tent = NOW() where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";"); 
            //Registra a tentativa sem a media
            $queryTent3 = mysqli_query($con, "INSERT into tentativas_av values (0, ".$infoTent[0].", NOW(), NULL);"); 

            //Seleciona o id da ultima tentativa (A que ele acabou de realizar)
            $queryTent4 = mysqli_query($con, "SELECT t.id_tent_av from tetativas_av as t inner join avaliacoes as a ON t.id_av = a.id_av AND a.id_aluno = id_aluno = ".$_POST['aluno']." AND id_curso = ".$_POST['curso']." order by dt_tent desc LIMIT 1;"); 
            $idTent = mysqli_fetch_array($queryTent4);
            //Atribui o resultado a uma variavel
            $idTentativa = $idTent[0];
        }else {
            //Diminui o numero de tentativas
            $queryTent2 = mysqli_query($con, "UPDATE avaliacoes set num_tent_restantes = ".$newTent.", dt_ultima_tent = NOW() where id_aluno = ".$_POST['aluno']." and id_curso = ".$_POST['curso'].";");
             //Registra a tentativa sem a media
            $queryTent3 = mysqli_query($con, "INSERT into tentativas_av values (0, ".$infoTent[0].", NOW(), NULL);");
            
            //Seleciona o id da ultima tentativa (A que ele acabou de realizar)
            $queryTent4 = mysqli_query($con, "SELECT t.id_tent_av from tentativas_av as t inner join avaliacoes as a ON t.id_av = a.id_av AND a.id_aluno = id_aluno = ".$_POST['aluno']." AND id_curso = ".$_POST['curso']." order by dt_tent desc LIMIT 1;"); 
            $idTent = mysqli_fetch_array($queryTent4);
            //Atribui o resultado a uma variavel
            $idTentativa = $idTent[0];
        }
        
        
        if ($queryTent2 && $queryTent3) {
            
            $tentativas = array(
                'tentativa' => $idTentativa,
                'tent_restantes' => $newTent
            );
            echo json_encode($tentativas);
        }else {
            header('Location: \eadev/plataforma.php?content_alu=avaliacoes&msgs=2');
        }
    }

    //Call back da avaliacao
    if (isset($_POST['tentativa']) && isset($_POST['media'])) {
        $tent = $_POST['tentativa'];
        $media = $_POST['media'];
        if ($media >= 100) {
            $media = 100;
        }
        $queryMedia = mysqli_query($con, "UPDATE tentativas_av set media = ".$media." where id_tent_av = ".$tent.";");
    }
?>