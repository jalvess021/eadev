<?php
   include "base/config.php";
    if (isset($_GET['info']) && $_GET['info'] === 'atv') {
      if (isset($_GET['atv']) && ($_GET['atv'] === 'add' || $_GET['atv'] === 'att' || $_GET['atv'] === 'del')) {
         $ac = $_GET['atv'];
   switch ($ac) {
      case 'add':
         $acao = 'insert';
         $infoAc= 'Inserção de dados';
         break;
         
      case 'att':
         $acao = 'update';
         $infoAc= 'Atualização de dados';
         break;

      case 'del':
         $acao = 'delete';
         $infoAc= 'Exclusão de dados';
         break;
   }

            $anoAnterior = date('Y', strtotime('-1 year'));
            $anoAtual = date('Y');
            $anoPosterior = date('Y', strtotime('+1 year'));

            $quantidade = 3;
				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;
            $sql = mysqli_query($con, "SELECT * from atv_adm where atv like '%\\".$acao."%' order by id_atv asc limit $inicio, $quantidade;");
   
            $sqlCountAtv = mysqli_query($con, "SELECT * from atv_adm;");
            $rowsCountAtv = mysqli_num_rows($sqlCountAtv);
      echo "
      <div class='d-flex flex-row justify-content-between mb-3'>
        <h5 class='lb-cons'><i class='bi bi-tools'></i> ".$infoAc."</h5>
        <div class='d-flex flex-row'>
            <a data-toggle='modal' data-target='#relAtv' class='btn btn-sm btn-secondary mr-3 text-white'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório</a>
            <a href='?content_adm=consulta_atv' class=' btn-back btn btn-sm bt-padrao '> <i class='bi bi bi-x-lg'></i> Fechar </a>
         </div>
      </div>
      <table class='table table-striped' cellspacing='0' cellpading='0'>
      <caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Total de atividades (".$rowsCountAtv.") </capiton>
               <thead><tr class='thead'>";
                  echo "<td>Id (Atv):</td>";
                  echo "<td class='d-none d-xl-table-cell '>Atividade:</td>";
                  echo "<td class='d-none d-xl-table-cell'>Nome do ADM { ID }:</td>";
                  echo "<td class='d-none d-xl-table-cell text-center'>Data:</td>";
                  echo "<td class='actions'>Ações</td>";
               echo "</tr></thead><tbody>";
				
            while ($info = mysqli_fetch_array($sql)) {

                

               $s = $info['dt_atv'];
               $date = strtotime($s);

               echo "<tr>";
               echo "<td>".$info['id_atv']."</td>";
               echo "<td>"; 
                    echo $info['atv'];
                   
               echo "</td>";
               echo "<td>";  echo (strlen($info['nome_adm']) <= 22) ? $info['nome_adm'] : substr($info['nome_adm'], 0, 22  )."..."; echo " { ".$info['id_adm']." }</td>";
               echo "<td class='d-none d-xl-table-cell text-center'>".date('H:i | d-m-Y  ', $date)."</td>";
					echo "<td class='actions btn-group-sm'>";
					echo "<a class='btn btn-info btn-xs' href='?content_adm=view_av&id_quest=".$info['id_atv']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
            } 
				echo "</tr></tbody></table>";
  
            $sqlTotal = "SELECT * from atv_adm where atv like '%\\".$acao."%';";
            $qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
            $numTotal 		= mysqli_num_rows($qrTotal);
            $totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
            $exibir 		= 3;
            $anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
            $posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
            echo "<ul class='pagination d-flex justify-content-center mt-4'>";
            echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href='?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=1'> Primeira</a></li> ";
            echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=$anterior\"> &laquo;</a></li> ";
            echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
            for($i = $pagina+1; $i < $pagina+$exibir; $i++){
               if($i <= $totalpagina)
               echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=".$i."'> ".$i." </a></li> ";
            }
            echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=$posterior\"> &raquo;</a></li> ";
            echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href=\"?content_adm=consulta_adm&info=atv&atv=".$ac."&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>
           
            <!-- Modal -->
            <div class='modal fade' id='relAtv' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' data-backdrop='static'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                    <div class='modal-header btn-secondary text-white font-weight-bold'>
                        <h5 class='modal-title' id='exampleModalCenterTitle'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório Geral de ".$infoAc." </h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <form action='' method='post'>
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
            </div>
           
            ";
      }
    }
?>
<script>
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

