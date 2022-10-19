<div class='d-flex flex-row justify-content-between mb-3'>
        <h6 class='lb-cons'>Lista de alunos</h6>
        <div class='d-flex flex-row'>
            <a data-toggle='modal' data-target='#relAtv' class='btn btn-sm btn-secondary mr-3 text-white'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório</a>
            <a href='?content_adm=consulta_atv' class=' btn-back btn btn-sm bt-padrao '> <i class='bi bi bi-x-lg'></i> Fechar </a>
         </div>
      </div>
				<?php
						$quantidade = 3;
						$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$inicio = ($quantidade * $pagina) - $quantidade;

                        $data = mysqli_query($con, "select * from usuario where nvl_acesso = 2 order by id_usu asc limit ".$inicio.", ".$quantidade.";") or die(mysqli_error("ERRO: ".$con));
						$rowData = mysqli_num_rows($data);
						echo "<table class='table table-striped tabela-gr' cellspacing='0' cellpading='0'>";
                        echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Todos os alunos (".$rowData.") </capiton>";
						echo "<thead><tr class='thead'>";
						echo "<td>Id:</td>";
						echo "<td>Usuário:</td>";
						echo "<td class='d-none d-xl-table-cell'>Nome:</td>";
						echo "<td class=' text-center'>Nível de acesso: </td>";
						echo "<td class='text-center'>Status: </td>";
						echo "<td class='text-center'>Data de cadastro: </td>";
						echo "<td class='actions'>Ações</td>";
						echo "</tr></thead><tbody id='tbody_cur'>";
						while($info = mysqli_fetch_array($data)){
							echo "<tr>";
							echo "<td>".$info['id_usu']."</td>";
							echo "<td>".$info['usuario']."</td>";
							//echo "<td class='d-none d-sm-table-cell'>".substr($info['desc_curso'], 0, 20)."... </td>";
							echo "<td class='d-none d-xl-table-cell'>".$info['nome']."</td>";
							echo "<td class='text-center'>"; 
							switch ($info['nvl_acesso']) {
                            
                                case 2:
                                    $nvl = 'Aluno';
                                    break;

                                case 3:
                                    $nvl = 'Administrador';
                                    break;

                            } echo $nvl."

							</td>";
							echo "<td class='text-center'>";
							
							switch ($info['status']) {
                                case 1:
                                    $status = 'Ativo';
                                    break;
                            
                                case 2:
                                    $status = 'Pendente';
                                    break;

                                case 3:
                                    $status = 'Bloqueado';
                                    break;

                                case 4:
                                    $status = 'Desativado';
                                    break;
                            } echo $status."
							
							</td>";
							echo "<td class='text-center'>".date('H:i:s | d-m-Y', strtotime($info['dt_cadastro']))." </td>";
							echo "<td class='actions btn-group-sm'>";
							echo "<a class='btn btn-info btn-xs' href='?content_adm=consulta_adm&info=view&adm=".$info['id_usu']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
						}
						echo "</tr></tbody></table>";
				?>

				<?php
						
						$sqlTotal = "select id_usu from usuario where nvl_acesso = 3;";
				
						$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
						$numTotal 		= mysqli_num_rows($qrTotal);
						$totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
						$exibir 		= 3;
						$anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
						$posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
						echo "<ul class='pagination d-flex justify-content-center mt-4'>";
						echo "<li class='page-item'><a class='page-link bt-padrao' href='?content_adm=consulta_adm&info=view&pagina=1'> Primeira</a></li> ";
						echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=view&pagina=$anterior\"> &laquo;</a></li> ";
						echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=consulta_adm&info=view&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
						for($i = $pagina+1; $i < $pagina+$exibir; $i++){
							if($i <= $totalpagina)
							echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=consulta_adm&info=view&pagina=".$i."'> ".$i." </a></li> ";
						}
						echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=consulta_adm&info=view&pagina=$posterior\"> &raquo;</a></li> ";
						echo "<li class='page-item'><a class='page-link bt-padrao' href=\"?content_adm=consulta_adm&info=view&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
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
                window.location.href = "?content_adm=consulta_adm&info=view&adm="+idAdm;
            }) 
        })
</script>