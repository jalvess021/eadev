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

            $quantidade = 4;
				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;
            $sql = mysqli_query($con, "SELECT * from atv_adm where atv like '%\\".$acao."%' order by id_atv asc limit $inicio, $quantidade;");
   
            $sqlCountAtv = mysqli_query($con, "SELECT * from atv_adm;");
            $rowsCountAtv = mysqli_num_rows($sqlCountAtv);
      echo "
      <div class='d-flex flex-row justify-content-between'>
        <h5 class='lb-cons'>".$infoAc."</h5>
        <a href='?content_adm=consulta_adm' class=' btn-back btn btn-sm bt-padrao mb-3'> <i class='bi bi bi-x-lg'></i> Fechar </a>
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
           ";
      }
    }
?>

