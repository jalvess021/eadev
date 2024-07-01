<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	//Incluindo as Mensagens
	include "base/crud/admin/mensagens/msg_adm.php";
?>




<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Módulos</h3>	

    <!-- Chama o Formulário para adicionar Cursos -->
    <a href="?content_adm=lista_mod&add=mod" class="btn bt-padrao btn-lg float-right">Novo Módulo</a>
</div>
<div class="d-flex flex-row justify-content-between mt-4">
	<div class="table-responsive col-md-12 all-table">
        <div class="all-table-header">
            <form action="?content_adm=lista_mod" method="post" class="row justify-content-between row-filter" id="form-filter-mod">
                    <div class="col-md-2">
                        <select class="custom-select custom-select-sm filter-input-table" id="filterFormacao-Mod" name="formacao">
                            <option value="all" title="Todas">Filtrar Formação</option>
                            <?php
                                    $dataf = mysqli_query($con, "select * from formacao order by id_formacao asc;") or die(mysqli_error("ERRO: ".$con));
                                    while($infof = mysqli_fetch_array($dataf)) {
                                        echo "<option value='".$infof['id_formacao']."'> " .$infof['nome_formacao'] ." </option>";
                                    }
						    ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="custom-select custom-select-sm filter-input-table" id="filterCurso-Mod" name="curso">
                            <option value="all" title="Todas">Filtrar Curso</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" id="filter" class="btn btn-sm bt-crud-filter float-right"><i class="bi bi-funnel-fill"></i> Filtrar</buttoon>
                    </div>
                    
            </form>
            <hr>
        </div>
        <div class="all-table-body">
                <?php
                        $quantidade = 4;
                        $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
                        $inicio = ($quantidade * $pagina) - $quantidade;
                    
                    
                        if(isset($_POST['formacao']) && $_POST['formacao'] != "all") {
                            if (isset($_POST['curso']) && $_POST['curso'] != "all") {
                                $data = mysqli_query($con, "SELECT * FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso and c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." ORDER BY m.id_curso, m.tipo_mod ASC LIMIT $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
                            }else {
                                $data = mysqli_query($con, "SELECT * FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_formacao = ".$_POST['formacao']." ORDER BY m.id_curso, m.tipo_mod asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
                            }
                        }else {
                            $data = mysqli_query($con, "SELECT * from modulo ORDER BY id_curso, tipo_mod asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
                        }
                        echo "<table class='table table-striped tabela-gr' cellspacing='0' cellpading='0'>";
                        if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
                            $filForm = mysqli_query($con, "SELECT nome_formacao FROM formacao WHERE id_formacao = ". $_POST['formacao'] .";");
                            $dataForm = mysqli_fetch_array($filForm);
                            if (isset($_POST['curso']) && $_POST['curso'] != "all") {
                                $filCur = mysqli_query($con, "SELECT sigla_curso FROM curso WHERE id_curso = ". $_POST['curso'] .";");
                                $dataCur = mysqli_fetch_array($filCur);
                                echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." | ".$dataCur[0]." </capiton>";
                            }else {
                                echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." </capiton>";
                            }
                        }else {
                            echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Todos os módulos </capiton>";
                        }
                        echo "<thead><tr class='thead'>";
                        echo "<td>Id:</td>";
                        echo "<td>Tipo | Curso:</td>";
                        echo "<td class='text-center'>N&ordm; Aulas: </td>";
                        echo "<td class='d-none d-xl-table-cell text-center'>Criado em:</td>";
                        echo "<td class='d-none d-lg-table-cell text-center'>Atualizado em:</td>";
                        echo "<td class='actions'>Ações</td>";
                        echo "</tr></thead><tbody id='tbody_cur'>";
                        while($info = mysqli_fetch_array($data)){

                            $sqlCur = mysqli_query($con, "Select * from curso where id_curso = ".$info['id_curso'].";");
                            $rowCur = mysqli_fetch_array($sqlCur);

                            switch ($info['tipo_mod']) {
                                case 1:
                                    $tipoMod = "Básico";
                                    break;
                                
                                case 2:
                                    $tipoMod = "Intermediário";
                                    break;
                        
                                case 3:
                                    $tipoMod = "Avançado";
                                    break;
                            }
            
                            $sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula where id_mod = ".$info['id_mod'].";");
                            $row2 = mysqli_fetch_array($sql2);
                    
                            $s1 = $info['dt_criacao'];
                            $date1 = strtotime($s1);
                    
                            $s = $info['dt_alteracao'];
                            $date = strtotime($s);
                    
                            echo "<tr>";
                            echo "<td>".$info['id_mod']."</td>";
                            echo "<td>".$tipoMod." | <strong class='text-uppercase'>".$rowCur['sigla_curso']."</strong></td>";
                            echo "<td class='text-center'>".$row2[0]."</td>";
                            echo "<td class='d-none d-xl-table-cell text-center'>".date('H:i | d-m-Y  ', $date1). " </td>";
                            echo "<td class='d-none d-lg-table-cell text-center'>";
                            
                            if ($date != null) {
                                echo date('H:i | d-m-Y  ', $date);
                            }else {
                                echo "Sem atualizações!";
                            }
                            echo "</td>";
                            echo "<td class='actions btn-group-sm'>" ;
                            echo "<a class='btn btn-info btn-xs' href='?content_adm=view_mod&id_mod=".$info['id_mod']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
                            echo "<a class='btn btn-secondary btn-xs ml-2' href='?content_adm=lista_mod&edit_mod=".$info['id_mod']."' data-toggle='tooltip' data-placement='top' title='Editar'> <i class='bi bi-pencil-fill'></i> </a>";
                            echo "<a href='?content_adm=lista_mod&delete_mod=".$info['id_mod']."' class='btn btn-danger text-white btn-xs ml-2' data-toggle='tooltip' data-placement='top' title='Excluir'> <i class='bi bi-trash-fill'></i> </a></td>";
                        }
                        echo "</tr></tbody></table>";
                ?>

                <?php
                        if(isset($_POST['formacao']) && $_POST['formacao'] != "all") {
                            if (isset($_POST['curso']) && $_POST['curso'] != "all") {
                                $sqlTotal = "SELECT m.id_mod FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso and c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
                            }else {
                                $sqlTotal = "SELECT m.id_mod FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_formacao = ".$_POST['formacao'].";";
                            }
                        }else {
                            $sqlTotal = "SELECT id_mod FROM modulo;";
                        }
                    
                        $qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
                        $numTotal 		= mysqli_num_rows($qrTotal);
                        $totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
                        $exibir 		= 3;
                        $anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
                        $posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
                    
                        echo "<ul class='pagination d-flex justify-content-center mt-4'>";
                        echo "<li class='page-item'><a class='page-link bt-padrao' href='?content_adm=lista_mod&pagina=1'> Primeira</a></li> ";
                        echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_mod&pagina=$anterior\"> &laquo;</a></li> ";
                        echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=lista_mod&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
                        for($i = $pagina+1; $i < $pagina+$exibir; $i++){
                            if($i <= $totalpagina)
                            echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=lista_mod&pagina=".$i."'> ".$i." </a></li> ";
                        }
                        echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_mod&pagina=$posterior\"> &raquo;</a></li> ";
                        echo "<li class='page-item'><a class='page-link bt-padrao' href=\"?content_adm=lista_mod&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
                ?>
        </div>
	</div>
</div>
<?php 
    require_once "modal/modal_edit.php";
    require_once "modal/modal_add.php";
    require_once "modal/modal_delete.php";
?>
<script>
    $(document).ready(function(){
        $('#filterFormacao-Mod').change(function(){
            $('#filterCurso-Mod').load('/eadev/selects/select_cur.php?filter_form='+$('#filterFormacao-Mod').val());
        });
    });
</script>
