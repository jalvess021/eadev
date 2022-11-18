<?php
    include "../../base/config.php";


    
    if (isset($_GET['filter_quest']) && isset($_GET['alu'])) {
        $id_alu = $_GET['alu'];
        if ($_GET['filter_quest'] == "all") {
            $sql1 = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu.";");
        }else {
            $sql1 = mysqli_query($con, "SELECT a.* FROM avaliacoes as a inner join curso as c on a.id_curso = c.id_curso inner join formacao as f on c.id_formacao = f.id_formacao and f.id_formacao = ".$_GET['filter_quest']." where id_aluno = ".$id_alu.";");
        }

        
                    while ($info1 = mysqli_fetch_array($sql1)) {
                        $issetAula1 = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula a ON aa.id_aula = a.id_aula INNER JOIN modulo m on a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = '".$info1['id_curso']."' WHERE aa.id_aluno = ".$id_alu.";");

                        if (mysqli_num_rows($issetAula1) > 0) {

                            //Verifica se o questionario possui o numero minimo de questoes
                            $issetQuest = mysqli_query($con, "SELECT q.* from questoes as q inner join modulo as m on q.id_mod = m.id_mod inner join curso as c on m.id_curso = c.id_curso and c.id_curso = ".$info1['id_curso'].";");

                            //O indicado é maior ou igual a 18, porém está sendo utilizado maior que para testes
                            if (mysqli_num_rows($issetQuest) > 0 ) {

                                $sql2 = mysqli_query($con, "SELECT * FROM curso where id_curso = ".$info1['id_curso'].";");
                                $info2 = mysqli_fetch_array($sql2);
                                echo "
                                <div class='div-quest'>
                                    <div class='div-quest-row row'>";
                                    if ($info1['status_av'] == 1 /*Avaliação em andamento*/) {
                                        echo "
                                        <div class='div-quest-left col-3 align-self-center'>
                                            <a data-toggle='modal' data-target='#av-".$info1['id_av']."' class='link-icon-av'>"; 
                                            switch ($info1['status_tent']) {
                                                case 1 /*indisponível*/:
                                                    echo " <i class='bi bi-file-earmark-minus-fill bg-danger'></i>";
                                                    break;

                                                case 2 /*disponível*/:
                                                    echo " <i class='bi bi-file-earmark-plus-fill bg-primary'></i>";
                                                    break;

                                                case 3 /*Bloqueado*/:
                                                    echo " <i class='bi bi-file-earmark-lock-fill bg-secondary'></i>";
                                                    break;
                                            }
                                            echo "</a>
                                        </div>
                                        <div class='div-quest-right col-9 align-self-center'>
                                            <span>Título:</span>
                                            <a data-toggle='modal' data-target='#av-".$info1['id_av']."'>Questionário avaliativo de ".$info2['sigla_curso']; 

                                            switch ($info1['status_tent']) {
                                                case 1 /*indisponível*/:
                                                    echo " <i class='bi bi-patch-minus-fill text-danger'></i>";
                                                    $info_tent = "0/2 | Conclua as aulas deste curso para debloquear a avaliação.";
                                                    break;

                                                case 2 /*disponível*/:
                                                    echo " <i class='bi bi-patch-plus-fill text-primary'></i>";
                                                    $info_tent = $info1['status_tent']."/2 | Teste seus conhecimentos e libere seu certificado!";
                                                    break;

                                                case 3 /*Bloqueado*/:
                                                    echo " <i class='bi bi-patch-exclamation-fill text-secondary'></i>";
                                                    $info_tent = "0/2 | Você poderá realizar este questionário novamente em ...";
                                                    break;
                                            }
                                            echo"</a>
                                            <span id='try-quest'>Tentativas restantes: ".$info_tent."</span>
                                            <span id='status-quest'>"; 
                                                switch ($info1['status_tent']) {
                                                    case 1:
                                                        echo "#".$info1['id_av']." - Indisponível";
                                                        break;

                                                    case 2:
                                                        echo "#".$info1['id_av']." - Disponível";
                                                        break;

                                                    case 3:
                                                        echo "#".$info1['id_av']." - Bloqueado";
                                                        break;
                                                }
                                            echo "</span>
                                        </div>
                                        ";
                                    }elseif ($info1['status_av'] == 2 /*Avliação concluída*/) {
                                        echo "
                                        <div class='div-quest-left col-3 align-self-center'>
                                            <a data-toggle='modal' data-target='#av-".$info1['id_av']."' class='link-icon-av'><i class='bi bi-file-earmark-check-fill bg-success'></i></a>
                                        </div>
                                        <div class='div-quest-right col-9 align-self-center'>
                                            <span>Título:</span>
                                            <a data-toggle='modal' data-target='#av-".$info1['id_av']."'>Questionário avaliativo de ".$info2['sigla_curso']." <i class='bi bi-patch-check-fill text-success'></i></a>
                                            <span id='try-quest'>Parabéns, você já concluiu este questionário e pode optar pelo certificado deste curso! </span>
                                            <span id='status-quest'>#".$info1['id_av']." - Concluído </span>
                                        </div>
                                        ";
                                    }
                                        echo"
                                    </div>
                                </div>
                                <hr class='hr-div-quest'>
                                ";
                            }
                        }
                    }
    }

?>