<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	$id_curso = (int) $_GET['id_curso'];
	$sql = mysqli_query($con, "SELECT * FROM curso WHERE id_curso='".$id_curso."';");
	$row = mysqli_fetch_array($sql);

	//Numero de modulos
	$sql1 = mysqli_query($con, "SELECT COUNT(id_mod) FROM modulo as m WHERE m.id_curso = '".$id_curso."';");
	$row1 = mysqli_fetch_array($sql1);

	//Numero de aulas
	$sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula as a INNER JOIN modulo AS m ON a.id_mod = m.id_mod AND m.id_curso = '".$id_curso."' ;");
	$row2 = mysqli_fetch_array($sql2);

	//Derivado da formacao
    $sql3 = mysqli_query($con, "SELECT f.nome_formacao FROM curso as c INNER JOIN formacao as f ON c.id_formacao = f.id_formacao WHERE c.id_curso = ".$id_curso.";");
	$row3 = mysqli_fetch_array($sql3);

	$s1 = $row['dt_criacao'];
	$date_cr = strtotime($s1);

	//Data de alteração
	$s2 = $row['dt_alteracao'];
	$date_alt = strtotime($s2);
?>

<h3 class="content-title">Cursos</h3>
<div class="all-view">
		<div class="add_form">
					<div class="top_add">
						<h4 class="c-destaque-4 font-weight-bold">Registros do Curso | <?php echo $id_curso; ?> |</h4>
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
										echo " ".date('d/m/Y', $date_alt)." às ".date('H:i:s', $date_alt)." ";
									}else {
										echo "Não houve alteração!";
									}
									
								?></small>
							</div>
						</div>
						<hr>
						<!-- 2ª LINHA -->
						<div class="row mt-5">
							<div class="col-1">
									<h6 class="text-dark font-weight-bold reg-title reg-title1">Id :</h6> <span class="data-reg"><?php echo $row['id_curso'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title2">Nome :</h6> <span class="data-reg"><?php echo $row['nome_curso'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title3">Sigla :</h6> <span class="data-reg"><?php echo $row['sigla_curso'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title4">Derivado de :</h6> <span class="data-reg"><?php echo"<i class='bi bi-diagram-2-fill'></i> ".$row3[0].""; ?></span>
							</div>
							<div class="col">
								<h6 class="text-dark font-weight-bold reg-title reg-title4">Conteúdo :</h6>
								<span class="data-reg">
									<?php if ($row1[0] > 0) {
										if ($row2[0] > 0) {
											echo "".$row1[0]." módulos | ".$row2[0]." aulas.";
										} else {
											echo "".$row1[0]." módulos.";
										}
									}else {
										echo "Sem registros!";
									}?>
								</span>
							</div>
						</div>
						<!-- 3ª LINHA -->
						<div class="row mt-5">
							<div class="col-12">
								<p class="font-weight-bold text-dark d-inline-block reg-title reg-title5">Descrição do curso :</p>
								<p class="desc-view data-reg"><?php echo $row['desc_curso'];?></p>
							</div>
						</div>
					</div>
	
					<div class="actions">
						<div class="d-flex flex-row justify-content-center">
								<a href="?content_adm=lista_cur" class="btn btn-sm btn-secondary text-white mr-1 font-weight-bold"><i class="bi bi-arrow-left"></i> Voltar</a>
								<a href="?content_adm=lista_cur&edit_cur=<?php echo $id_curso;?>" class="btn btn-sm b-destaque-4 text-white ml-1 font-weight-bold">Editar <i class="bi bi-pencil-fill"></i></a>
						</div>
					</div>
		</div>
</div>
