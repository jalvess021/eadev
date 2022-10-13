<?php
   include "base/config.php";
    
   if (isset($_GET['user'])) {
        $user = $_GET['user'];
        $query = mysqli_query($con, "SELECT * FROM usuario where nvl_acesso = 3 and id_usu = ".$user.";");
        $rows = mysqli_num_rows($query);

        if ($rows === 1) {

                $infoUser = mysqli_fetch_array($query);
                $quantidade = 4;
				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;
                $sql = mysqli_query($con, "SELECT * from atv_adm where id_adm = ".$infoUser['id_usu']." order by id_atv asc limit $inicio, $quantidade;");
                $rows1 = mysqli_num_rows($sql);
                if ($rows1 > 0) {
                    echo "
                            <div class='d-flex flex-row justify-content-between'>
                                <h5 class='lb-cons'>".$infoUser['nome']." { ".$infoUser['id_usu']." }</h5>
                                <a href='?content_adm=consulta_adm' class=' btn-back btn btn-sm bt-padrao mb-3'> <i class='bi bi bi-x-lg'></i> Fechar </a>
                            </div>
                            <table class='table table-striped' cellspacing='0' cellpading='0'>
                            <caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Total de atividades (".$rows1.") </capiton>
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
                                                //Modulo
                                                 $regModAtt = "/(\bupdate\smodulo).+(\bnome_mod=\'\b(\D+)\b\').+((id_curso=\'([0-9]+))\').+((id_mod='([0-9])+))\'\;/";
                                                    
                                                if (preg_match($regModAtt, $info['atv'])) {
                                                    $nomeMod = preg_replace($regModAtt, '$3', $info['atv']);
                                                    $idCur = preg_replace($regModAtt, '$6', $info['atv']);
                                                    $idMod = preg_replace($regModAtt, '$9', $info['atv']);
                                                    
                                                    
                                                    echo "<strong>Atualização</strong> do <em>módulo</em> <strong>".$nomeMod." | ".$idMod." |</strong>  do curso: <em>{ ".$idCur." }</em>";
                                                }else{
                                                    echo "nao";
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
                                    echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href='?content_adm=consulta_adm&&info=adm&user=1&pagina=1'> Primeira</a></li> ";
                                    echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=adm&user=1&pagina=$anterior\"> &laquo;</a></li> ";
                                    echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=consulta_adm&info=adm&user=1&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
                                    for($i = $pagina+1; $i < $pagina+$exibir; $i++){
                                    if($i <= $totalpagina)
                                    echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=consulta_adm&info=adm&user=1&pagina=".$i."'> ".$i." </a></li> ";
                                    }
                                    echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=adm&user=1&pagina=$posterior\"> &raquo;</a></li> ";
                                    echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href=\"?content_adm=consulta_adm&&info=adm&user=1&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>
                            "; 
                } else {
                    echo "
                        <div class='row justify-content-between'>
                                    <div class='col-10'>
                                        <h5 class='lb-cons'>".$infoUser['nome']." { ".$infoUser['id_usu']." }</h5>
                                    </div>
                                    <div class='col-2'>
                                    <a href='?content_adm=consulta_adm' class='btn-null btn btn-sm bt-padrao'> <i class='bi bi bi-x-lg'></i> Fechar </a>
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
        var nomeMeioAbreviado1 = meio1.replace(/([a-z])\w+/gi, letra => letra.toUpperCase().substr(0, 1)+".");
        //Exibe o nome completo (Abreviando os do meio)
        var nomeOut1 = primeiroNome1+" "+nomeMeioAbreviado1+" "+ultimoNome1; 

        $(".admAbrev").html(nomeOut1);

       /*
        function verifyMod() {
            //Condiçoes para alterar a atividade
            var regModAtt = /(\bupdate\smodulo).+(\bnome_mod=\'\b(\D+)\b\').+((id_curso=\'([0-9]+))\').+((id_mod='([0-9])+))\'\;/g;
            reste = regModAtt.test(atvChange);
            if (reste) {
                atvChange.html("sd");
            }
        }*/
        
        
        
        
       // $(".atv").html("atualizou o moduoia");

</script>

