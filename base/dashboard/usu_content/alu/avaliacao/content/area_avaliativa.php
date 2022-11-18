<h5 class='label-av-form-1'> <i class='bi bi-book-half'></i> Área avaliativa</h5>
    <div class='all-div-quest'>
        <ul class='info-quest'>
                <li>
                    <h3>Concluído <i class='bi bi-patch-check-fill text-success'></i></h3>
                    <p>O status de concluído será exibido quando o aluno obtiver a nota necessária para a aprovação.</p>
                </li>
                <li>
                    <h3>Disponível <i class='bi bi-patch-plus-fill text-primary'></i></h3>
                    <p>Quando o aluno estiver apto a realizar o questionário do curso desejado, o status de disponível será exibido.</p>
                </li>
                <li>
                    <h3>Bloqueado <i class='bi bi-patch-exclamation-fill text-secondary'></i></h3>
                    <p> Ao exceder o número de tentativas, o questionário receberá o status de bloqueado.</p>
                </li>
                <li>
                    <h3>Indisponível <i class='bi bi-patch-minus-fill text-danger'></i></h3>
                    <p> Para realizar o questionário, o aluno terá que concluir todas as aulas do curso desejado. </p>
                </li>
        </ul>
        <div class='all-quest-1'>
        <select id='tp-form-av'>
            <option value='all' selected>Todos os questionários</option>
            <?php
            $sqlForm = mysqli_query($con, "SELECT * FROM formacao");
            while ($resForm = mysqli_fetch_array($sqlForm)) {
                echo "<option value='".$resForm['id_formacao']."'>Questionários de ".$resForm['nome_formacao']."</option>";
            }
            ?>
        </select>
            <div class='all-quest-2'>
                <?php
                    $sql1 = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu.";");
                    while ($info1 = mysqli_fetch_array($sql1)) {

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
                ?>
            </div>
        </div>
    </div>