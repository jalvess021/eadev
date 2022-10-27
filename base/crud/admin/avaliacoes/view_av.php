<?php
	$id_quest = (int) $_GET['id_quest'];
	$sql = mysqli_query($con, "select * from questoes where id_quest = '".$id_quest."';");
	$row = mysqli_fetch_array($sql);

    if (mysqli_num_rows($sql) == 1) {

        $sql1 = mysqli_query($con, "SELECT f.nome_formacao, c.sigla_curso, m.nome_mod FROM questoes q INNER JOIN modulo m ON q.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso INNER JOIN formacao f ON c.id_formacao = f.id_formacao WHERE q.id_quest = ".$id_quest.";");
        $row1 = mysqli_fetch_array($sql1);
        
        //Data de criação
        $s1 = $row['dt_criacao'];
        $date_cr = strtotime($s1);

        //Data de alteração
        $s2 = $row['dt_alteracao'];
        $date_alt = strtotime($s2);
        

        echo "
        
        <h3 class='content-title'>Aulas</h3>
        <div class='all-view'>
                <div class='add_form'>
                            <div class='top_add'>
                                <h4 class='c-destaque-4 font-weight-bold'>Registros da questão |  ".$id_quest." |</h4>
                            </div>
                            <div class='body_add'>
                                <!-- 1ª LINHA -->
                                <div class='row'>
                                    <div class='col justify-content-end'>
                                        <h6 class='text-dark font-weight-bold'>Criado em:</h6> <small>
                                             ".date('d/m/Y', $date_cr)." às ".date('H:i:s', $date_cr)."
                                        </small>
                                    </div>
                                    <div class='col justify-content-end'>
                                        <h6 class='text-dark font-weight-bold'>Última atualização:</h6> <small>";
                                            if ($date_alt != null) {
                                                echo " ".date('d/m/Y', $date_alt)." às ".date('H:i:s', $date_alt)." ";
                                            }else {
                                                echo "Não houve alteração!";
                                            }
                                            echo "
                                        </small>
                                    </div>
                                </div>
                                <hr>
                                <!-- 2ª LINHA -->
                                <div class='row justify-content-between mt-5'>
                                    <div class='col-1'>
                                            <h6 class='text-dark font-weight-bold reg-title reg-title1'>Id:</h6> <span class='data-reg'>".$row['id_quest']."</span>
                                    </div>
                                    <div class='col-auto'>
                                            <h6 class='text-dark font-weight-bold reg-title reg-title2'>Pontuação:</h6> <span class='data-reg'>".number_format($row['pont_quest'], 1, '.', '')."</span>
                                    </div>
                                    <div class='col-auto'>
                                            <h6 class='text-dark font-weight-bold reg-title reg-title4'>Nível:</h6> <span class='data-reg'>";
                                            switch ($row['grau_dificuldade']) {
                                                case 1:
                                                    echo "Fácil";
                                                    break;
                                                case 2:
                                                    echo "Médio";
                                                    break;
                                                case 3:
                                                    echo "Difícil";
                                                    break;
                                            }
                                            echo "</span>
                                    </div>
                                    <div class='col-auto'>
                                            <h6 class='text-dark font-weight-bold reg-title reg-title4'>Derivado de :</h6> <span class='data-reg'> <i class='bi bi-diagram-2-fill'></i> ".$row1[0]." | <i class='bi bi-person-video3'></i> ".$row1[1]." | <i class='bi bi-layers-fill'></i> ".$row1[2]."</span>
                                    </div>
                                </div>
                                <!-- 4ª LINHA -->
                                <div class='row mt-5'>
                                    <div class='col-12'>
                                        <p class='font-weight-bold text-dark d-inline-block reg-title reg-title5'>Enunciado da Questão:</p>
                                        <p class='desc-view data-reg'>".$row['enunciado_quest']."</p>
                                    </div>
                                </div>
                                <div class='row mt-5'>
                                    <div class='col-4'>
                                        <p class='font-weight-bold text-dark d-inline-block reg-title reg-title5'>Alternativa correta:</p>
                                        <p class='desc-view data-reg'>".$row['opc_certa']."</p>
                                    </div>
                                    <div class='col-4'>
                                        <p class='font-weight-bold text-dark d-inline-block reg-title reg-title5'>Alternativa errada I:</p>
                                        <p class='desc-view data-reg'>".$row['opc_errada1']."</p>
                                    </div>
                                    <div class='col-4'>
                                        <p class='font-weight-bold text-dark d-inline-block reg-title reg-title5'>Alternativa errada II:</p>
                                        <p class='desc-view data-reg'>".$row['opc_errada2']."</p>
                                    </div>
                               </div>
                            </div>
                            <div class='actions'>
                                <div class='d-flex flex-row justify-content-center'>
                                        <a href='?content_adm=lista_av' class='btn btn-sm btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-arrow-left'></i> Voltar</a>
                                        <a href='?content_adm=lista_av&edit_quest=".$id_quest."' class='btn btn-sm b-destaque-4 text-white ml-1 font-weight-bold'>Editar <i class='bi bi-pencil-fill'></i></a>
                                </div>
                            </div>
                </div>
        </div>";
        
        
    }

	

?>

