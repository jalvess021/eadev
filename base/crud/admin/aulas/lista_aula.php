<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 


	//Incluindo as Mensagens
	include "base/crud/admin/mensagens/msg_adm.php";
	
?>

<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Aulas</h3>	
    <!-- Chama o Formulário para adicionar Cursos -->
    <a href="?content_adm=lista_aula&add=aula" class="btn bt-padrao btn-lg float-right">Nova Aula</a>
</div>
<div class="d-flex flex-row justify-content-between mt-4">
	<div class="table-responsive col-md-12 col-md-12 all-table">
		<div class="all-table-header">
			<form action="?content_adm=lista_aula" method="post" class="row justify-content-between row-filter" id="form-filter-aula">
						<div class="col-md-2">
							<select class="custom-select custom-select-sm filter-input-table" id="filterFormacao-Aula" name="formacao">
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
							<select class="custom-select custom-select-sm filter-input-table" id="filterCurso-Aula" name="curso">
								<option value="all" title="Todas">Filtrar Curso</option>
							</select>
						</div>
						<div class="col-md-2">
							<select class="custom-select custom-select-sm filter-input-table" id="filterModulo-Aula" name="modulo">
								<option value="all" title="Todas">Filtrar Módulo</option>
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
				if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
					if (isset($_POST['curso']) && $_POST['curso'] != "all") {
						if (isset($_POST['modulo']) && $_POST['modulo'] != "all") {
							$data = mysqli_query($con, "SELECT * FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod AND m.id_mod = ".$_POST['modulo']." INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by id_aula asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}else {
							$data = mysqli_query($con, "SELECT * FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by id_aula asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}
					}else {
						$data = mysqli_query($con, "SELECT * FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by id_aula asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
					}
				}else {
					$data = mysqli_query($con, "SELECT * from aula order by id_aula asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
				}
				echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
					$filForm = mysqli_query($con, "SELECT nome_formacao FROM formacao WHERE id_formacao = ". $_POST['formacao'] .";");
					$dataForm = mysqli_fetch_array($filForm);
					if (isset($_POST['curso']) && $_POST['curso'] != "all") {
						$filCur = mysqli_query($con, "SELECT sigla_curso FROM curso WHERE id_curso = ". $_POST['curso'] .";");
						$dataCur = mysqli_fetch_array($filCur);
						if (isset($_POST['modulo']) && $_POST['modulo'] != "all") {
							$filMod = mysqli_query($con, "SELECT * FROM modulo WHERE id_mod = ". $_POST['modulo'] .";");
							$dataMod = mysqli_fetch_array($filMod);
							switch ($dataMod['tipo_mod']) {
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
							echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." | ".$dataCur[0]." | ".$tipoMod." </capiton>";
						}else {
							echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." | ".$dataCur[0]." </capiton>";
						}
					}else {
						echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." </capiton>";
					}
				}else {
					echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Todas as aulas </capiton>";
				}
				echo "<thead><tr class='thead'>";
				echo "<td>Id:</td>";
				echo "<td class='d-none d-xl-table-cell'>Título:</td>";
				echo "<td>Link completo:</td>";
				echo "<td class='d-none d-lg-table-cell text-center'>Duração:</td>";
				echo "<td class='d-none d-xl-table-cell text-center'>Atualizada em:</td>";
				echo "<td class='actions'>Ações</td>";
				echo "</tr></thead><tbody>";
				while($info = mysqli_fetch_array($data)){
					
						// Duração da aula
						$start = $info['start_aula'];
						$end = $info['end_aula'];
						$total = $end - $start;

						// Datas da aula
						$s1 = $info['dt_criacao'];
						$date1 = strtotime($s1);
						$s = $info['dt_alteracao'];
						$date = strtotime($s);

						//Url ytb
						$YtbPath = "https://youtu.be/";
						$idPath = "<span class='YtbId' data-toggle='tooltip' data-placement='top' title='ID da aula'>".$info['id_video']."</span>";
					echo "<tr>";
					echo "<td>".$info['id_aula']."</td>";
					echo "<td class='d-none d-xl-table-cell'>".substr($info['tit_aula'], 0, 14)."...</td>";
					echo "<td>".$YtbPath.$idPath." </td>";
					echo "<td class='d-none d-lg-table-cell text-center'>".gmdate("i", $total)."<span class='hour'>min</span>".gmdate("s", $total)."<span class='hour'>s</span></td>";
					echo "<td class='d-none d-xl-table-cell text-center'>";
						if ($date != null) {
							echo date('H:i | d-m-Y  ', $date); 
						}else {
							echo "Sem atualização!";
						}
					echo "</td>";
					echo "<td class='actions btn-group-sm'>";
					echo "<a class='btn btn-info btn-xs' href='?content_adm=view_aula&id_aula=".$info['id_aula']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
					echo "<a class='btn btn-secondary btn-xs ml-2' href='?content_adm=lista_aula&edit_aula=".$info['id_aula']."' data-toggle='tooltip' data-placement='top' title='Editar'> <i class='bi bi-pencil-fill'></i> </a>";
					echo "<a href='?content_adm=lista_aula&delete_aula=".$info['id_aula']."' class='btn btn-danger btn-xs ml-2' data-toggle='tooltip' data-placement='top' title='Excluir'> <i class='bi bi-trash-fill'></i> </a></td>";
				}
				echo "</tr></tbody></table>";
			?>
			<?php
					if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
						if (isset($_POST['curso']) && $_POST['curso'] != "all") {
							if (isset($_POST['modulo']) && $_POST['modulo'] != "all") {
								$sqlTotal = "SELECT a.id_aula FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod AND m.id_mod = ".$_POST['modulo']." INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
							}else {
								$sqlTotal = "SELECT a.id_aula FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
							}
						}else {
							$sqlTotal = "SELECT a.id_aula FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso INNER JOIN formacao f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
						}
					}else {
						$sqlTotal = "select id_aula from aula;";
					}
					$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
					$exibir 		= 3;
					$anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
					echo "<ul class='pagination d-flex justify-content-center mt-4'>";
					echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href='?content_adm=lista_aula&pagina=1'> Primeira</a></li> ";
					echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_aula&pagina=$anterior\"> &laquo;</a></li> ";
					echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=lista_aula&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=lista_aula&pagina=".$i."'> ".$i." </a></li> ";
					}
					echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_aula&pagina=$posterior\"> &raquo;</a></li> ";
					echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href=\"?content_adm=lista_aula&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
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
        $('#filterFormacao-Aula').change(function(){
           $('#filterCurso-Aula').load('/tcc/selects/select_cur.php?filter_form='+$('#filterFormacao-Aula').val());
		   //reseta o select de Módulo
		   $('#filterModulo-Aula').load('/tcc/selects/reset_option.php');
        });
    });
	$(document).ready(function(){
        $('#filterCurso-Aula').change(function(){
            $('#filterModulo-Aula').load('/tcc/selects/select_mod.php?filter_form='+$('#filterFormacao-Aula').val()+'&filter_cur='+$('#filterCurso-Aula').val());
        });
    });
	
</script>
