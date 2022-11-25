<?php
                    $sqlModal1 = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu.";");
                    while ($infoModal1 = mysqli_fetch_array($sqlModal1)) {

                        $sqlModal2 = mysqli_query($con, "SELECT * FROM curso where id_curso = ".$infoModal1['id_curso'].";");
                        $infoModal2 = mysqli_fetch_array($sqlModal2);
                           
            

                                if ($infoModal1['status_av'] == 1 /*Avliação em andamento*/) {

                                    echo "
                                    <div class='modal modal-edit fade' id='av-".$infoModal1['id_av']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                            <div class='modal-header bg-info'>
                                            ";

                                            switch ($infoModal1['status_tent']) {
                                            
                                                case 1 /*indisponível*/:
                                                    $contentModal = "<p> Você precisa concluir as aulas deste curso para prosseguir! <p>";

                                                    $footerModal = "
                                                        <button type='button' class='btn btn-secondary ' data-dismiss='modal'>Cancelar</button>
                                                        <a href='?page=play_curso&curso=".$infoModal2['sigla_curso']."'><button type='button' class='btn btn-dark bg-info'>Assistir <i class='bi bi-youtube'></i></button></a>
                                                    ";
                                                    break;
    
                                                case 2 /*disponível*/:
                                                    $contentModal = "<p> Seja bem-vindo, avaliação disponível! <p>";

                                                    $footerModal = "
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                        <button type='button' data-avCur='".$infoModal2['id_curso']."' data-dismiss='modal' class='btn btn-dark btnPagAvaliacao bg-info'>Prosseguir <i class='bi bi-send-check-fill'></i></button>
                                                    ";
                                                    break;
    
                                                case 3 /*Bloqueado*/:
                                                    $contentModal = "<p> Você atingiu o limite de tentativas, novas tentativas estarão disponíveis em 22/11/2022 às 20:32:11 <p>";

                                                    $footerModal = "
                                                    <button type='button' class='btn btn-secondary bg-info' data-dismiss='modal'>Cancelar</button>
                                                    ";
                                                    break;
                                            }

                                            echo"
                                                
                                                    <h5 class='modal-title text-white text-center font-weight-bold' id='exampleModalCenterTitle'>Questionário de ".$infoModal2['sigla_curso']."</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                 ".$contentModal."
                                                </div>
                                                <div class='modal-footer'>
                                                    ".$footerModal."
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    
                                }else if ($infoModal1['status_av'] == 2 /*Avliação concluída*/) {
                                    echo "
                                    <div class='modal fade' id='av-".$infoModal1['id_av']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header bg-success'>
                                            <h5 class='modal-title text-white text-center font-weight-bold' id='exampleModalCenterTitle'>Questionário de HTML</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                            </div>
                                            <div class='modal-body'>
                                            <p>Este questionário já foi realizado e conluído!</p>
                                            </div>
                                            <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                            <button type='button' class='btn btn-success'>Obter certificado <i class='bi bi-award-fill'></i></button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>";
                                }
                            
                    }
                ?>