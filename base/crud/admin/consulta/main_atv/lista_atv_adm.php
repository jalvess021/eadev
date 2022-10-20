<?php
   include "base/config.php";
    
   if (isset($_GET['user'])) {
        $user = $_GET['user'];
        $query = mysqli_query($con, "SELECT * FROM usuario where nvl_acesso = 3 and id_usu = ".$user.";");
        $rows = mysqli_num_rows($query);

        if ($rows === 1) {

                $infoUser = mysqli_fetch_array($query);
                $quantidade = 3;
				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;
                $sql = mysqli_query($con, "SELECT * from atv_adm where id_adm = ".$infoUser['id_usu']." order by id_atv asc limit $inicio, $quantidade;");
                $rows1 = mysqli_num_rows($sql);
                if ($rows1 > 0) {
                    $sqlCountAtv = mysqli_query($con, "SELECT * from atv_adm where id_adm = ".$infoUser['id_usu'].";");
                    $rowsCountAtv = mysqli_num_rows($sqlCountAtv);

                    $anoAnterior = date('Y', strtotime('-1 year'));
                    $anoAtual = date('Y');
                    $anoPosterior = date('Y', strtotime('+1 year'));
                    echo "
                            <div class='d-flex flex-row justify-content-between align-items-center mb-3'>
                                <h6 class='lb-cons'>".$infoUser['nome']." { ".$infoUser['id_usu']." }</h6>
                                <div class='d-flex flex-row'>
                                    <a class='btn btn-sm btn-secondary mr-3 text-white' data-toggle='tooltip' data-placement='left' title='Gerar Relatório Geral de Atividades do Adm { ".$user." }'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório</a>
                                    <a href='?content_adm=consulta_atv' class='btn-back btn btn-sm bt-padrao '> <i class='bi bi bi-x-lg'></i> Fechar </a>
                                </div>
                                
                            </div>
                            <table class='table table-striped' cellspacing='0' cellpading='0'>
                            <caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Total de atividades (".$rowsCountAtv.") </capiton>
                                    <thead><tr class='thead'>";
                                        echo "<td>Id (Atv):</td>";
                                        echo "<td class='d-none d-xl-table-cell'>Atividade:</td>";
                                        echo "<td class='d-none d-xl-table-cell'>Nome do ADM { ID }:</td>";
                                        echo "<td class='d-none d-xl-table-cell text-center'>Data:</td>";
                                        echo "<td class='actions'>Ações</td>";
                                    echo "</tr></thead><tbody>";
                                        
                                    while ($info = mysqli_fetch_array($sql)) {

                                        $s = $info['dt_atv'];
                                        $date = strtotime($s);

                                    echo "<tr>";
                                    echo "<td>".$info['id_atv']."</td>";
                                    echo "<td>"; /*$info['atv']*/
                                        //Verificação do que vai ser impresso nesta td

                                            //Atualizaçao
                                                //Curso
                                                $regCurAtt = "/^update\scurso\sset\snome_curso=\'(.+)\'\,\ssigla_curso=\'(.+)\',\sdesc_curso=\'(.+)\'\,\sdt_alteracao=NOW\(\)\,\sid_formacao=\'([0-9])+\'\swhere\sid_curso=\'([0-9]+)\'\;$/m";
                                                //Modulo
                                                 $regModAtt = "/^update\smodulo\sset\snome_mod=\'(.+)\'\,\sdesc_mod=\'(.+)\'\,\sid_curso='([0-9]+)\'\,\sdt_alteracao=NOW\(\)\swhere\sid_mod=\'([0-9]+)\'\;/m";
                                                //Aula
                                                $regAulaAtt = "/^update\saula\sset\sid_video='(.+)',\stit_aula='(.+)',\sdesc_aula='(.+)',\sstart_aula='([0-9]+)',\send_aula='([0-9]+)\'\,\sdt_alteracao=NOW\(\)\,\sid_mod=\'([0-9]+)\'\swhere\sid_aula=\'([0-9]+)\'\;$/m";
                                                //Avaliação
                                               $regAvAtt = "/^update\squestoes\sset\senunciado_quest='(.+)',\sgrau_dificuldade='([0-3])',\spont_quest='(.+)',\sopc_certa='(.+)',\sopc_errada1='(.+)\'\,\sopc_errada2='(.+)\'\,\sdt_alteracao=NOW\(\)\,\sid_mod=\'([0-9]+)\'\swhere\sid_quest=\'([0-9]+)\'\;$/m";
                                            //Inserção
                                                //Curso
                                                $regCurAdd = "/^insert\sinto\scurso\svalues\s\(0,\s'(.+)',\s'(.+)',\s'(.+)',\sNOW\(\),\sNULL,\s'([0-9]+)'\);$/m";
                                                //Modulo
                                                $regModAdd = "/^insert\sinto\smodulo\svalues\s\(0,\s'(.+)',\s'(.+)',\s'([0-9]+)',\sNOW\(\),\sNULL\);$/m";
                                                //Aula
                                                $regAulaAdd = "/^insert\sinto\saula\svalues\s\(0,\s'(.+)',\s'(.+)',\s'(.+)',\s'([0-9]+)',\s'([0-9]+)',\sNOW\(\),\sNULL,\sNULL,\s'([0-9]+)'\);$/m";
                                                //Avaliação
                                                $regAvAdd = "/^insert\sinto\squestoes\svalues\s\(0,\s'(.+)',\s'([0-3])',\s'(.+)',\s'(.+)',\s'(.+)',\s'(.+)',\sNOW\(\),\sNULL,\s'([0-9]+)'\);$/m";
                                            //Exclusão
                                                //Curso
                                                $regCurDel = "/^DELETE\sFROM\scurso\swhere\sid_curso='([0-9]+)'\sAND\snome_curso='(.+)'\sAND\ssigla_curso='(.+)'\sAND\sid_formacao='([0-9]+)';$/m";
                                                //Módulo
                                                $regModDel = "/^DELETE\sFROM\smodulo\swhere\sid_mod='([0-9]+)'\sAND\snome_mod='(.+)'\sAND\sid_curso='([0-9]+)';$/m";
                                                //Aula
                                                $regAulaDel = "/^DELETE\sFROM\saula\swhere\sid_aula='([0-9]+)'\sAND\sid_video='(.+)'\sAND\stit_aula='(.+)'\sAND\sid_mod='([0-9]+)';$/m";
                                                //Avaliação
                                                $regAvDel = "/^DELETE\sFROM\squestoes\swhere\sid_quest='([0-9]+)'\sAND\senunciado_quest='(.+)'\sAND\sgrau_dificuldade='([0-3])'\sAND\sid_mod='([0-9]+)';$/m";

                                                if (preg_match($regModAtt, $info['atv'])) {
                                                    $nomeMod = preg_replace($regModAtt, '$1', $info['atv']);
                                                    $descMod = preg_replace($regModAtt, '$2', $info['atv']);
                                                    $id_cur_att = preg_replace($regModAtt, '$3', $info['atv']);
                                                    $idMod = preg_replace($regModAtt, '$4', $info['atv']);
                                                    echo "<strong>Atualização</strong> do <em>módulo</em> <strong>".$nomeMod." | ".$idMod." |</strong>  do curso: <em>{ ".$id_cur_att." }</em>";
                                                }elseif(preg_match($regCurAtt, $info['atv'])) {
                                                    $nomeCur = preg_replace($regCurAtt, '$1', $info['atv']);
                                                    $siglaCur = preg_replace($regCurAtt, '$2', $info['atv']);
                                                    $descCur = preg_replace($regCurAtt, '$3', $info['atv']);
                                                    switch (preg_replace($regCurAtt, '$4', $info['atv'])) {
                                                        case 1:
                                                            $formacaoCur = "Front-End";
                                                            break;
                                                        case 2:
                                                            $formacaoCur = "Back-End";
                                                            break;
                                                        case 3:
                                                            $formacaoCur = "Conver";
                                                            break;
                                                        default:
                                                        $formacaoCur = preg_replace($regCurAtt, '$4', $info['atv']);
                                                        break;
                                                    }
                                                    $idCur = preg_replace($regCurAtt, '$5', $info['atv']);
                                                    echo "<strong>Atualização</strong> do <em>curso</em> <strong>".$siglaCur." | ".$idCur." |</strong>  da formação: <em>{ ".$formacaoCur." }</em>";
                                                }elseif (preg_match($regAulaAtt, $info['atv'])) {
                                                    $id_v = preg_replace($regAulaAtt, '$1', $info['atv']);
                                                    $tit = preg_replace($regAulaAtt, '$2', $info['atv']);
                                                    $desc = preg_replace($regAulaAtt, '$3', $info['atv']);
                                                    $start = preg_replace($regAulaAtt, '$4', $info['atv']);
                                                    $end = preg_replace($regAulaAtt, '$5', $info['atv']);
                                                    $id_modA = preg_replace($regAulaAtt, '$6', $info['atv']);
                                                    $id_aula = preg_replace($regAulaAtt, '$7', $info['atv']);
                                                    echo "<strong>Atualização</strong> da <em>aula</em> <strong>"; 
                                                    echo (strlen($tit) <= 18) ? $tit : substr($tit, 0, 18)."...";
                                                    echo " | ".$id_aula." |</strong>  do módulo: <em>{ ".$id_modA." }</em>";
                                                }elseif (preg_match($regAvAtt, $info['atv'])) {
                                                    $enun = preg_replace($regAvAtt, '$1', $info['atv']);
                                                    $grau = preg_replace($regAvAtt, '$2', $info['atv']);
                                                    $pont = preg_replace($regAvAtt, '$3', $info['atv']);
                                                    $c = preg_replace($regAvAtt, '$4', $info['atv']);
                                                    $e1 = preg_replace($regAvAtt, '$5', $info['atv']);
                                                    $e2 = preg_replace($regAvAtt, '$6', $info['atv']);
                                                    $id_modQ = preg_replace($regAvAtt, '$7', $info['atv']);
                                                    $id_quest = preg_replace($regAvAtt, '$8', $info['atv']);
                                                    echo "<strong>Atualização</strong> da <em>questão</em> <strong>"; 
                                                    echo (strlen($enun) <= 18) ? $enun : substr($enun, 0, 18)."...";
                                                    echo " | ".$id_quest." |</strong>  do módulo: <em>{ ".$id_modQ." }</em>";
                                                }elseif (preg_match($regCurAdd, $info['atv'])) {
                                                    $nomeCurAdd = preg_replace($regCurAdd, '$1', $info['atv']);
                                                    $siglaCurAdd = preg_replace($regCurAdd, '$2', $info['atv']);
                                                    $descCurAdd = preg_replace($regCurAdd, '$3', $info['atv']);
                                                    switch (preg_replace($regCurAdd, '$4', $info['atv'])) {
                                                        case 1:
                                                            $formacaoCurAdd = "Front-End";
                                                            break;
                                                        case 2:
                                                            $formacaoCurAdd = "Back-End";
                                                            break;
                                                        case 3:
                                                            $formacaoCurAdd = "Conver";
                                                            break;
                                                        default:
                                                        $formacaoCurAdd = preg_replace($regCurAdd, '$4', $info['atv']);
                                                        break;
                                                    }
                                                    echo "<strong>Inserção</strong> do <em>curso</em> <strong>".$siglaCurAdd."</strong>  na formação: <em>{ ".$formacaoCurAdd." }</em>";
                                                }elseif (preg_match($regModAdd, $info['atv'])) {
                                                    $nomeModAdd = preg_replace($regModAdd, '$1', $info['atv']);
                                                    $descModAdd = preg_replace($regModAdd, '$2', $info['atv']);
                                                    $id_cur_add = preg_replace($regModAdd, '$3', $info['atv']);
                                                    $idModAdd = preg_replace($regModAdd, '$4', $info['atv']);
                                                    echo "<strong>Inserção</strong> do <em>módulo</em> <strong>".$nomeMod."</strong>  no curso: <em>{ ".$id_cur_add." }</em>";
                                                }elseif (preg_match($regAulaAdd, $info['atv'])) {
                                                    $id_vAdd = preg_replace($regAulaAdd, '$1', $info['atv']);
                                                    $titAdd = preg_replace($regAulaAdd, '$2', $info['atv']);
                                                    $descAdd = preg_replace($regAulaAdd, '$3', $info['atv']);
                                                    $startAdd = preg_replace($regAulaAdd, '$4', $info['atv']);
                                                    $endAdd = preg_replace($regAulaAdd, '$5', $info['atv']);
                                                    $id_modAdd = preg_replace($regAulaAdd, '$6', $info['atv']);
                                                    echo "<strong>Inserção</strong> da <em>aula</em> <strong>"; 
                                                    echo (strlen($titAdd) <= 18) ? $titAdd : substr($titAdd, 0, 18)."...";
                                                    echo "</strong>  no módulo: <em>{ ".$id_modAdd." }</em>";
                                                }elseif (preg_match($regAvAdd, $info['atv'])) {
                                                    $enunAdd = preg_replace($regAvAdd, '$1', $info['atv']);
                                                    $grauAdd = preg_replace($regAvAdd, '$2', $info['atv']);
                                                    $pontAdd = preg_replace($regAvAdd, '$3', $info['atv']);
                                                    $cAdd = preg_replace($regAvAdd, '$4', $info['atv']);
                                                    $e1Add = preg_replace($regAvAdd, '$5', $info['atv']);
                                                    $e2Add = preg_replace($regAvAdd, '$6', $info['atv']);
                                                    $id_modQAdd = preg_replace($regAvAdd, '$7', $info['atv']);
                                                    echo "<strong>Inserção</strong> da <em>questão</em> <strong>"; 
                                                    echo (strlen($enunAdd) <= 18) ? $enunAdd : substr($enunAdd, 0, 18)."...";
                                                    echo "</strong> no módulo: <em>{ ".$id_modQAdd." }</em>";
                                                }elseif(preg_match($regCurDel, $info['atv'])) {
                                                    $idCurDel = preg_replace($regCurDel, '$1', $info['atv']);
                                                    $nomeCurDel = preg_replace($regCurDel, '$2', $info['atv']);
                                                    $siglaCurDel = preg_replace($regCurDel, '$3', $info['atv']);
                                                    switch (preg_replace($regCurDel, '$4', $info['atv'])) {
                                                        case 1:
                                                            $formacaoCurDel = "Front-End";
                                                            break;
                                                        case 2:
                                                            $formacaoCurDel = "Back-End";
                                                            break;
                                                        case 3:
                                                            $formacaoCurDel = "Conver";
                                                            break;
                                                        default:
                                                        $formacaoCurDel = preg_replace($regCurDel, '$4', $info['atv']);
                                                        break;
                                                    }
                                                    echo "<strong>Exclusão</strong> do <em>curso</em> <strong>".$siglaCurDel." | ".$idCurDel." |</strong>  da formação: <em>{ ".$formacaoCurDel." }</em>";
                                                }elseif (preg_match($regModDel, $info['atv'])) {
                                                    $idModDel = preg_replace($regModDel, '$1', $info['atv']);
                                                    $nomeModDel = preg_replace($regModDel, '$2', $info['atv']);
                                                    $id_cur_del = preg_replace($regModDel, '$3', $info['atv']);
                                                    echo "<strong>Exclusão</strong> do <em>módulo</em> <strong>".$nomeModDel." | ".$idModDel." |</strong>  do curso: <em>{ ".$id_cur_del." }</em>";
                                                }elseif (preg_match($regAulaDel, $info['atv'])) {
                                                    $id_aulaDel = preg_replace($regAulaDel, '$1', $info['atv']);
                                                    $id_vDel = preg_replace($regAulaDel, '$2', $info['atv']);
                                                    $titDel = preg_replace($regAulaDel, '$3', $info['atv']);
                                                    $id_modDel = preg_replace($regAulaDel, '$4', $info['atv']);
                                                    echo "<strong>Exclusão</strong> da <em>aula</em> <strong>"; 
                                                    echo (strlen($tit) <= 18) ? $tit : substr($tit, 0, 18)."...";
                                                    echo " | ".$id_aula." |</strong>  do módulo: <em>{ ".$id_modDel." }</em>";
                                                }elseif (preg_match($regAvDel, $info['atv'])) {
                                                    $id_questDel = preg_replace($regAvDel, '$1', $info['atv']);
                                                    $enunDel = preg_replace($regAvDel, '$2', $info['atv']);
                                                    $grauDel = preg_replace($regAvDel, '$3', $info['atv']);
                                                    $id_modQDel = preg_replace($regAvDel, '$4', $info['atv']);
                                                    echo "<strong>Exclusão</strong> da <em>questão</em> <strong>"; 
                                                    echo (strlen($enunDel) <= 18) ? $enunDel : substr($enunDel, 0, 18)."...";
                                                    echo " | ".$id_questDel." |</strong>  do módulo: <em>{ ".$id_modQDel." }</em>";
                                                }
                                                else{
                                                    echo "<strong>Atividade não identificada!</strong>";
                                                }   
                                         
                                    echo "</td>";
                                    echo "<td> <span class='admAbrev'></span> <em>{ ".$info['id_adm']." }</em></td>";
                                    echo "<td class='d-none d-xl-table-cell text-center'>".date('H:i | d-m-Y  ', $date)."</td>";
                                            echo "<td class='actions btn-group-sm'>";
                                            echo "<a class='btn btn-info btn-xs' href='?content_adm=view_av&id_quest=".$info['id_atv']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
                                    } 
                                        echo "</tr></tbody></table>";
                        
                                    $sqlTotal = "SELECT * from atv_adm where id_adm = ".$infoUser['id_usu'].";";
                                    $qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
                                    $numTotal 		= mysqli_num_rows($qrTotal);
                                    $totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
                                    $exibir 		= 3;
                                    $anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
                                    $posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
                                    echo "<ul class='pagination d-flex justify-content-center mt-4'>";
                                    echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href='?content_adm=consulta_atv&&info=adm&user=1&pagina=1'> Primeira</a></li> ";
                                    echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_atv&info=adm&user=1&pagina=$anterior\"> &laquo;</a></li> ";
                                    echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=consulta_atv&info=adm&user=1&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
                                    for($i = $pagina+1; $i < $pagina+$exibir; $i++){
                                    if($i <= $totalpagina)
                                    echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=consulta_atv&info=adm&user=1&pagina=".$i."'> ".$i." </a></li> ";
                                    }
                                    echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_atv&info=adm&user=1&pagina=$posterior\"> &raquo;</a></li> ";
                                    echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href=\"?content_adm=consulta_atv&&info=adm&user=1&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>
                             

                        <!-- Modal -->
                        <div class='modal fade' id='relAtvAdm' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' data-backdrop='static'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                <div class='modal-header bg-secondary text-white font-weight-bold'>
                                    <h5 class='modal-title' id='exampleModalCenterTitle'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório de atividades do ADM { ".$infoUser['id_usu']." } </h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <form action='' method='post'>
                                        <div class='form-group'>
                                            <label for='exampleFormControlInput1'>Selecione a atividade: </label>
                                            <select class='custom-select custom-select-sm'>
                                            <option value='all' selected>Todas</option>
                                            <option value='add'>Inseção</option>
                                            <option value='att'>Atualização</option>
                                            <option value='del'>Exclusão</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label for='exampleFormControlInput1'>Selecione o período: </label>
                                            <select class='custom-select custom-select-sm' >
                                                //Controle de data do relatório (Plaforma contem dados de 2022)
                                                        <option value='".$anoAnterior."'>".$anoAnterior."</option>
                                                        <option value='".$anoAtual."' selected>".$anoAtual."</option>
                                                        <option value='".$anoPosterior."'>".$anoPosterior."</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-sm btn-secondary font-weight-bold' data-dismiss='modal'><i class='bi bi-x-circle-fill'></i> Fechar</button>
                                    <a href='#' class='btn btn-sm btn-success font-weight-bold text-white' disabled><i class='bi bi-check-all'></i> Gerar relatório</a>
                                </div>
                                </div>
                            </div>
                        </div>";
                } else {
                    echo "
                        <div class='row justify-content-between'>
                                    <div class='col-10'>
                                        <h5 class='lb-cons'>".$infoUser['nome']." { ".$infoUser['id_usu']." }</h5>
                                    </div>
                                    <div class='col-2'>
                                    <a href='?content_adm=consulta_atv' class='btn-null btn btn-sm bt-padrao'> <i class='bi bi bi-x-lg'></i> Fechar </a>
                                    </div>
                        </div>
                        <div class='row justify-content-center atv-null'>
                            <span><i class='bi bi-exclamation-octagon-fill icon-null'></i> Este administrador não realizou atividades</span>
                        </div>
                    ";
                }
        }
    }
?>


<script>
        var nomeCompleto1 = "<?php echo $infoUser['nome'];?>";
        //tamanho do nome
        var qtdnome1 = nomeCompleto1.split(" ").length;
        //separando o nome
        var nomeTodo1 = nomeCompleto1.split(" ");
        //primeiro nome
        var primeiroNome1 = nomeTodo1[0].replace(/(^\w{1})/g, letra => letra.toUpperCase());
        //Ultimo nome
        var ultimoNome1 = nomeTodo1[qtdnome1-1].replace(/(^\w{1})/g, letra => letra.toUpperCase()); 
        //Nomes do meio
        var nomesmeio1 = nomeTodo1.slice(1, -1);
        // Junta o nome do meio
        var meio1 = nomesmeio1.join(' ');
        // Abrevia o nome
        var nomeMeioAbreviado1 = meio1.replace(/([a-z])\w[a-záâãéêíóôõ]+/gi, letra => letra.toUpperCase().substr(0, 1)+".");
        //Exibe o nome completo (Abreviando os do meio)
        var nomeOut1 = primeiroNome1+" "+nomeMeioAbreviado1+" "+ultimoNome1; 

        $(".admAbrev").html(nomeOut1);

        $("#pesq-adm").submit((e)=>{
        e.preventDefault();
        var valInput = $("#search-adm").val();
        //Regex (Expressão regular)
        reg1 = /^[A-Z]([^A-Z\d\s]+)((\s[A-Z]([^A-Z\d\s])+)|(\s[A-Z]([^A-Z\d\s])+)+)\s{1}\{\s([0-9]+)\s\}$/g;
        //Pega apenas o id do administrador que ele quer buscar
        idSearch = valInput.replace(reg1, "$7");
        $.ajax({
                url: 'base/crud/admin/consulta/search_adm2.php',
                method: 'POST',
                data: {searchAdmInput: idSearch},
                datatype: 'json'
            }).done(function(result){
                dados = result;
                var num = dados.replace(/[^0-9]/g,'');
                idAdm = parseInt(num);
                //idCripto = btoa(idAdm);
                window.location.href = "?content_adm=consulta_atv&info=adm&user="+idAdm;
            }) 
        })

</script>

