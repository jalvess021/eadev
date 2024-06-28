<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	//Incluindo as Mensagens
	include "base/crud/admin/mensagens/msg_adm.php";
?>

<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Questões</h3>	
    <!-- Chama o Formulário para adicionar Cursos -->
    <a href="?content_adm=lista_quest&add=av" class="btn bt-padrao btn-lg float-right">Nova Questão</a>
</div>
<div class="d-flex flex-row justify-content-between mt-4">
	<div class="table-responsive col-md-12 col-md-12 all-table">
		<div class="all-table-header">
			<form action="?content_adm=lista_quest" method="post" class="row justify-content-between row-filter" id="form-filter-aula">
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
							$data = mysqli_query($con, "SELECT * FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod AND m.id_mod = ".$_POST['modulo']." INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by q.id_mod, q.grau_dificuldade asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}else {
							$data = mysqli_query($con, "SELECT * FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by q.id_mod, q.grau_dificuldade asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
						}
					}else {
						$data = mysqli_query($con, "SELECT * FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao']." order by q.id_mod, q.grau_dificuldade asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
					}
				}else {
					$data = mysqli_query($con, "SELECT * from questoes order by id_mod, grau_dificuldade asc limit $inicio, $quantidade;") or die(mysqli_error("ERRO: ".$con));
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
					echo "<caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Todas as questões </capiton>";
				}
				echo "<thead><tr class='thead'>";
				echo "<td>Id:</td>";
				echo "<td class=' text-center'>Enunciado:</td>";
				echo "<td class='text-center d-none d-xl-table-cell'>Módulo | Curso :</td>";
				echo "<td class='text-center'>Nível:</td>";
				echo "<td class='actions'>Ações</td>";
				echo "</tr></thead><tbody>";
				while($info = mysqli_fetch_array($data)){

					$infoCur = mysqli_query($con, "SELECT c.* FROM curso as c inner join modulo as m on c.id_curso = m.id_curso inner join questoes as q on m.id_mod = q.id_mod and q.id_mod = ".$info['id_mod'].";");
					$rowCur =  mysqli_fetch_array($infoCur);

					$sqlMod = mysqli_query($con, "SELECT m.* FROM modulo as m inner join curso as c on c.id_curso = m.id_curso inner join questoes as q on m.id_mod = q.id_mod and q.id_mod = ".$info['id_mod'].";");
					$infoMod1 = mysqli_fetch_array($sqlMod);

					switch ($infoMod1['tipo_mod']) {
								case 1:
									$tipoMod1 = "Básico";
									break;
								
								case 2:
									$tipoMod1 = "Intermediário";
									break;
						
								case 3:
									$tipoMod1 = "Avançado";
									break;
							}

					echo "<tr>";
					echo "<td>".$info['id_quest']."</td>";
					echo (strlen($info['enunciado_quest']) <= 44) ? "<td class=' text-center'>".$info['enunciado_quest']."</td>" : "<td class='text-center'>".substr($info['enunciado_quest'], 0, 41)."...</td>";
					
					echo "<td class=' text-center d-none d-xl-table-cell'><strong>".$tipoMod1."</strong> | <em>".$rowCur['sigla_curso']."</em></td>";
					echo "<td class='text-center'>"; switch ($info['grau_dificuldade']) {
						case 1:
							echo "Fácil";					
							break;
						case 2:
							echo "Médio";
							break;
						case 3:
							echo "Difícil";
							break;
					} echo "</td>";
					echo "<td class='actions btn-group'>";
					echo "<a class='btn btn-info btn-sm mt-sm-1' href='?content_adm=view_quest&id_quest=".$info['id_quest']."' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-eye-fill'></i> </a>";
					echo "<a class='btn btn-secondary btn-sm mt-sm-1 ml-2' href='?content_adm=lista_quest&edit_quest=".$info['id_quest']."' data-toggle='tooltip' data-placement='top' title='Editar'> <i class='bi bi-pencil-fill'></i> </a>";
					echo "<a href='?content_adm=lista_quest&delete_quest=".$info['id_quest']."' class='btn btn-danger btn-sm mt-sm-1 ml-2' data-toggle='tooltip' data-placement='top' title='Excluir'> <i class='bi bi-trash-fill'></i> </a></td>";
				}
				echo "</tr></tbody></table>";
			?>
			<?php
					if (isset($_POST['formacao']) && $_POST['formacao'] != "all") {
						if (isset($_POST['curso']) && $_POST['curso'] != "all") {
							if (isset($_POST['modulo']) && $_POST['modulo'] != "all") {
								$sqlTotal = "SELECT q.id_quest FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod AND m.id_mod = ".$_POST['modulo']." INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
							}else {
								$sqlTotal = "SELECT q.id_quest FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
							}
						}else {
							$sqlTotal = "SELECT q.id_quest FROM questoes as q INNER JOIN modulo as m ON q.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$_POST['formacao'].";";
						}
					}else {
						$sqlTotal = "select id_quest from questoes;";
					}
					$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error());
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina 	= (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
					$exibir 		= 3;
					$anterior 		= (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior 		= (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
					echo "<ul class='pagination d-flex justify-content-center mt-4'>";
					echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href='?content_adm=lista_quest&pagina=1'> Primeira</a></li> ";
					echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_quest&pagina=$anterior\"> &laquo;</a></li> ";
					echo "<li class='page-item'><a class='page-link c-destaque-10' href='?content_adm=lista_quest&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";
					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link text-dark' href='?content_adm=lista_quest&pagina=".$i."'> ".$i." </a></li> ";
					}
					echo "<li class='page-item'><a class='page-link text-dark' href=\"?content_adm=lista_quest&pagina=$posterior\"> &raquo;</a></li> ";
					echo "<li class='page-item'><a class='page-link text-white b-destaque-4 font-weight-bold' href=\"?content_adm=lista_quest&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";
				?>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
        $('#filterFormacao-Aula').change(function(){
           $('#filterCurso-Aula').load('/eadev/selects/select_cur.php?filter_form='+$('#filterFormacao-Aula').val());
		   //reseta o select de Módulo
		   $('#filterModulo-Aula').load('/eadev/selects/reset_option.php');
        });
    });
	$(document).ready(function(){
        $('#filterCurso-Aula').change(function(){
            $('#filterModulo-Aula').load('/eadev/selects/select_mod.php?filter_form='+$('#filterFormacao-Aula').val()+'&filter_cur='+$('#filterCurso-Aula').val());
        });
    });
	aa = 'Assinale a alternativa que representa tipos de variáveis escalares em Php'.length;
	console.log(aa);
	
</script>

<?php
	require_once 'modal/modal_add.php';
	require_once 'modal/modal_edit.php';
	require_once 'modal/modal_delete.php';
?>


<!--
<h6>Informações</h6>	
<ul type='disc'>
    <li>Avaliação</li>
    <ul type='circle'>
        <li>Cada curso contém 1 avaliação;</li>
        <li>A avaliação é composta por questões;</li>
    </ul>
    <li>Questões</li>
    <ul type='circle'>
        <li>36 questões por curso;</li>
        <li>12 questões por módulo</li>
            <ol type='I'>
                <li>4 fáceis</li>
                <li>4 médias</li>
                <li>4 difíceis</li>
            </ol>
        <li>Cada questão possui 3 opções;</li>
    </ul>
    <li>Opções</li>
    <ul type='circle'>
        <li>1 opção correta;</li>
        <li>2 opções incorretas;</li>
    </ul>
    
</ul> 



<hr>
<fieldset class='mt-4'>
     <h4 id="av">Observações</h4>
     <p>
    <ul type='circle'>
        <li>Cada curso contém 1 avaliação;</li>
        <li>A avaliação é composta por questões;</li>
    </ul>
  </p>
  <h4 id="qt">Questões</h4>
  <p>
    <ul type='circle'>
        <li>36 questões por curso;</li>
        <li>12 questões por módulo (4 por Grau);</li>
        <li>Cada questão possui 3 opções;</li>
    </ul>
  </p>
  <h4 id="op">Opções</h4>
  <p>
    <ul type='circle'>
        <li>1 opção correta;</li>
        <li>2 opções incorretas;</li>
    </ul>
  </p>
  <h5 id="gOp">Grau das opções</h5>
  <p>
    <ul type='circle'>
                <li>Fáceis</li>
                <li>Médias</li>
                <li>Difíceis</li>
    </ul>
  </p>
</fieldset> -->
 


	