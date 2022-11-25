<?date_default_timezone_set ("America/Sao_Paulo");?>
<h5 class='label-av-form-1'> <i class='bi bi-book-half'></i> Área avaliativa</h5>
    <div class='all-div-quest'>
    <div class='all-quest-1 '>
        <div class="top-div-quest ">
            <select id='tp-form-av'>
                <option value='all' selected>Todos os questionários</option>
                <?php
                $sqlForm = mysqli_query($con, "SELECT * FROM formacao");
                while ($resForm = mysqli_fetch_array($sqlForm)) {
                    echo "<option value='".$resForm['id_formacao']."'>Questionários de ".$resForm['nome_formacao']."</option>";
                }
                ?>
            </select>
            
        </div>
            <div class='all-quest-2 '>
                <?php
                    $sql1 = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu.";");
                    while ($info1 = mysqli_fetch_array($sql1)) {

                        $issetAula1 = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula as a ON aa.id_aula = a.id_aula INNER JOIN modulo as m on a.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = '".$info1['id_curso']."' WHERE aa.id_aluno = ".$id_alu.";");

                        if (mysqli_num_rows($issetAula1) > 0) {

                            //Verifica se o questionario possui o numero minimo de questoes
                            $issetQuest = mysqli_query($con, "SELECT q.* from questoes as q inner join modulo as m on q.id_mod = m.id_mod inner join curso as c on m.id_curso = c.id_curso and c.id_curso = ".$info1['id_curso'].";");

                             //O indicado é maior ou igual a 18, porém está sendo utilizado maior que para testes
                            if (mysqli_num_rows($issetQuest) > 0) {
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
                                                    $info_tent = $info1['num_tent_restantes']."/2 | Teste seus conhecimentos e libere seu certificado!";
                                                    break;

                                                case 3 /*Bloqueado*/:
                                                    echo " <i class='bi bi-patch-exclamation-fill text-secondary'></i>";
                                                    $info_tent = "0/2 | Você poderá realizar este questionário novamente em ".date('H:i:s | d-m-Y', strtotime('+15 days', strtotime($info1['dt_ultima_tent'])))."";
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
                ?>
            </div>
        </div>
        <ul class='info-quest'>
                    <li>
                        <h3 data-toggle='tooltip' data-placement='top' title='Questionário concluída'>Concluído <i class='bi bi-patch-check-fill text-success'></i></h3>
                    </li>
                    <li>
                        <h3 data-toggle='tooltip' data-placement='top' title='Questionário disponível'>Disponível <i class='bi bi-patch-plus-fill text-primary'></i></h3>
                    </li>
                    <li>
                        <h3 data-toggle='tooltip' data-placement='top' title='Questionário bloqueado'>Bloqueada <i class='bi bi-patch-exclamation-fill text-secondary'></i></h3>
                    </li>
                    <li>
                        <h3 data-toggle='tooltip' data-placement='top' title='Questionário indisponível'>Indisponível <i class='bi bi-patch-minus-fill text-danger'></i></h3>
                    </li>
            </ul>
    </div>