<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	//Incluindo as Mensagens
	include "base/crud/admin/mensagens/msg_adm.php";
?>

<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Cursos</h3>	
    <!-- Chama o Formulário para adicionar Cursos -->
    <a href="?content_adm=lista_cur&add=curso" class="btn bt-padrao btn-lg float-right">Novo Curso</a>
</div>	
<div class="d-flex flex-row justify-content-between mt-4">
	<div class="table-responsive col-md-12 all-table">
		<div class="all-table-header">
			<form action="?content_adm=lista_cur" method="post" class="row justify-content-between row-filter" id="form-filter-cur">
				<div class="col-md-2">
					<select class="custom-select custom-select-sm text-center filter-input-table" id="filterFormacao-Cur" name="formacao">
						<option value="all" title="Todas">Formação</option>
						<?php
						$dataf = mysqli_query($con, "select * from formacao order by id_formacao asc;") or die(mysqli_error("ERRO: ".$con));
								while($infof = mysqli_fetch_array($dataf)) {
									/*if (isset($_POST['formacao'])) {
										if ($infof['id_formacao'] == $_POST['formacao'] ) {
										echo "<option value='".$infof['id_formacao']."' selected> " .$infof['nome_formacao'] ." </option>";
										continue;
										}
									} */
									echo "<option value='".$infof['id_formacao']."'> " .$infof['nome_formacao'] ." </option>";
								}
						?>
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
							$data = mysqli_query($con, "SELECT * FROM curso WHERE id_formacao = ". $_POST['formacao'] ." order by id_curso asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}else {
							$data = mysqli_query($con, "select * from curso order by id_curso asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}
						echo "<table class='table table-striped tabela-gr' cellspacing='0' cellpading='0'>";
						if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
							$filForm = mysqli_query($con, "SELECT nome_formacao FROM formacao WHERE id_formacao = ". $_POST['formacao'] .";");
							$dataForm = mysqli_fetch_array($filForm);
							echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> ".$dataForm[0]." </capiton>";
						}else {
							echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Todos os cursos </capiton>";
						}
						echo "<thead><tr class='thead'>";
						echo "<td>Id:</td>";
						echo "<td>Sigla:</td>";
						echo "<td class='d-none d-xl-table-cell'>Nome:</td>";
						echo "<td class=' text-center'>N&ordm; M&oacute;dulos: </td>";
						echo "<td class='text-center'>N&ordm; Aulas: </td>";
						echo "<td class='d-none d-lg-table-cell text-center'>Atualizado em:</td>";
						echo "<td class='actions'>Ações</td>";
						echo "</tr></thead><tbody id='tbody_cur'>";
						while($info = mysqli_fetch_array($data)){
                            
							$sql1 = mysqli_query($con, "SELECT COUNT(id_mod) FROM modulo m WHERE m.id_curso = '".$info['id_curso']."';");
							$row1 = mysqli_fetch_array($sql1);
							$sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula a INNER JOIN modulo AS m ON a.id_mod = m.id_mod AND m.id_curso = '".$info['id_curso']."' ;");
							$row2 = mysqli_fetch_array($sql2);
							echo "<tr>";
							echo "<td>".$info['id_curso']."</td>";
							echo "<td>".$info['sigla_curso']."</td>";
							//echo "<td class='d-none d-sm-table-cell'>".substr($info['desc_curso'], 0, 20)."... </td>";
							echo "<td class='d-none d-xl-table-cell'>".$info['nome_curso']."</td>";
							echo "<td class='text-center'>".$row1[0]."</td>";
							echo "<td class='text-center'>".$row2[0]."</td>";
							$s = $info['dt_alteracao'];
							$date = strtotime($s);
							echo "<td class='d-none d-lg-table-cell text-center'>".date('H:i | d-m-Y  ', $date). " </td>";
							echo "<td class='actions btn-group-sm'>";
							echo "<a class='btn btn-info btn-xs' href='?content_adm=view_cur&id_curso=".$info['id_curso']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
							echo "<a class='btn btn-secondary btn-xs ml-2' href='?content_adm=lista_cur&edit_cur=".$info['id_curso']."'  data-toggle='tooltip' data-placement='top' title='Editar'> <i class='bi bi-pencil-fill'></i> </a>";
							echo "<a href='?content_adm=lista_cur&delete_cur=".$info['id_curso']."' class='btn btn-danger text-white btn-xs ml-2' data-toggle='tooltip' data-placement='top' title='Excluir'> <i class='bi bi-trash-fill'></i> </a></td>";
						}
						echo "</tr></tbody></table>";
				?>

				<?php
						(isset($_POST['formacao']) && $_POST['formacao'] != "all") ?
						$sqlTotal = "SELECT id_curso FROM curso WHERE id_formacao = ".$_POST['formacao'].";" :
						$sqlTotal = "select id_curso from curso;";
				
						$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
						$numTotal 		= mysqli_num_rows($qrTotal);
						$totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
						$exibir 		= 3;
						$anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
						$posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
						echo "<ul class='pagination d-flex justify-content-center mt-4'>";
						echo "<li class='page-item'><a class='page-link bt-padrao' href='?content_adm=lista_cur&pagina=1'> Primeira</a></li> ";
						echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_cur&pagina=$anterior\"> &laquo;</a></li> ";
						echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=lista_cur&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
						for($i = $pagina+1; $i < $pagina+$exibir; $i++){
							if($i <= $totalpagina)
							echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=lista_cur&pagina=".$i."'> ".$i." </a></li> ";
						}
						echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_cur&pagina=$posterior\"> &raquo;</a></li> ";
						echo "<li class='page-item'><a class='page-link bt-padrao' href=\"?content_adm=lista_cur&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
				?>
		</div>
	</div>
</div>

<?php 
	require_once "modal/modal_edit.php"; 
	require_once "modal/modal_add.php"; 
	require_once "modal/modal_delete.php";
?>

