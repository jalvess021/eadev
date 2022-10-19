<?php
	$id_aula = (int) $_GET['id_aula'];
	$sql = mysqli_query($con, "select * from aula where id_aula = '".$id_aula."';");
	$row = mysqli_fetch_array($sql);

	$sql1 = mysqli_query($con, "SELECT f.nome_formacao, c.sigla_curso, m.nome_mod FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso INNER JOIN formacao f ON c.id_formacao = f.id_formacao WHERE a.id_aula = ".$id_aula.";");
	$row1 = mysqli_fetch_array($sql1);
	
	//Data de criação
	$s1 = $row['dt_criacao'];
	$date_cr = strtotime($s1);

	//Data de alteração
	$s2 = $row['dt_alteracao'];
	$date_alt = strtotime($s2);

	
	// Duração da aula
	$start = $row['start_aula'];
	$end = $row['end_aula'];
	$total = $end - $start;

?>
<h3 class="content-title">Aulas</h3>
<div class="all-view">
		<div class="add_form">
					<div class="top_add">
						<h4 class="c-destaque-4 font-weight-bold">Registros da Aula | <?php echo $id_aula; ?> |</h4>
					</div>
					<div class="body_add">
						<!-- 1ª LINHA -->
						<div class="row">
							<div class="col justify-content-end">
								<h6 class="text-dark font-weight-bold">Criado em:</h6> <small><?php
	
									echo " ".date('d/m/Y', $date_cr)." às ".date('H:i:s', $date_cr)." ";
								?></small>
							</div>
							<div class="col justify-content-end">
								<h6 class="text-dark font-weight-bold">Última atualização:</h6> <small><?php
									if ($date_alt != null) {
										echo " ".date('d/m/Y', $date_alt)." às ".date('H:i:s', 	$date_alt)." ";
									}else {
										echo "Não houve atualização!";
									}
									
								?></small>
							</div>
						</div>
						<hr>
						<!-- 2ª LINHA -->
						<div class="row mt-5">
							<div class="col-1">
									<h6 class="text-dark font-weight-bold reg-title reg-title1">Id :</h6> <span class="data-reg"><?php echo $row['id_aula'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title2">Título :</h6> <span class="data-reg"><?php echo $row['tit_aula'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title4">Link do vídeo :</h6> <span class="data-reg"><?php echo " https://youtu.be/".$row['id_video']."";?></span>
							</div>
						</div>
						<!-- 3ª LINHA -->
						<div class="row mt-5">
							
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title4">Derivado de :</h6> <span class="data-reg"><?php echo"<i class='bi bi-diagram-2-fill'></i> ".$row1[0]." | <i class='bi bi-person-video3'></i> ".$row1[1]." | <i class='bi bi-layers-fill'></i> ".$row1[2].""; ?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title4">Tempo total :</h6> <span class="data-reg"><?php echo "".gmdate("i", $total)."<span class='hour'>min</span>".gmdate("s", $total)."<span class='hour'>s</span>";?></span>
							</div>
						</div>
						<!-- 4ª LINHA -->
						<div class="row mt-5">
							<div class="col-12">
								<p class="font-weight-bold text-dark d-inline-block reg-title reg-title5">Descrição da aula :</p>
								<p class="desc-view data-reg"><?php echo $row['desc_aula'];?></p>
							</div>
						</div>
					</div>
					<div class="actions">
						<div class="d-flex flex-row justify-content-center">
								<a href="?content_adm=lista_aula" class="btn btn-sm btn-secondary text-white mr-1 font-weight-bold"><i class="bi bi-arrow-left"></i> Voltar</a>
								<a href="?content_adm=lista_aula&edit_aula=<?php echo $id_aula;?>" class="btn btn-sm b-destaque-4 text-white ml-1 font-weight-bold">Editar <i class="bi bi-pencil-fill"></i></a>
						</div>
					</div>
		</div>
</div>
