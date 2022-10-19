<?php
	//Definindo nível de acesso para esta página & fazendo a verificação.
	$nivel_necessario = 3;
	include "base/testa_nivel.php"; 

	$id_mod = (int) $_GET['id_mod'];
	$sql = mysqli_query($con, "SELECT * FROM modulo WHERE id_mod='".$id_mod."';");
	$row = mysqli_fetch_array($sql);

	//Numero de aulas
	$sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula a INNER JOIN modulo AS m ON a.id_mod = m.id_mod AND m.id_mod = '".$id_mod."' ;");
	$row2 = mysqli_fetch_array($sql2);

    //Derivado da formacao
    $sql3 = mysqli_query($con, "SELECT f.nome_formacao, c.sigla_curso FROM modulo m INNER JOIN curso c ON m.id_curso = c.id_curso INNER JOIN formacao f ON c.id_formacao = f.id_formacao WHERE m.id_mod = ".$id_mod.";");
	$row3 = mysqli_fetch_array($sql3);

    // Derivado do curso

	$s1 = $row['dt_criacao'];
	$date_cr = strtotime($s1);

	//Data de alteração
	$s2 = $row['dt_alteracao'];
	$date_alt = strtotime($s2);
?>

<h3 class="content-title">Módulos</h3>
<div class="all-view">
		<div class="add_form">
					<div class="top_add">
						<h4 class="c-destaque-4 font-weight-bold">Registros do Módulo | <?php echo $id_mod; ?> |</h4>
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
	
										if ($s2 != null) {
											echo " ".date('d/m/Y', $date_alt)." às ".date('H:i:s', $date_alt)." ";
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
									<h6 class="text-dark font-weight-bold reg-title reg-title1">Id :</h6> <span class="data-reg"><?php echo $row['id_mod'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title2">Nome :</h6> <span class="data-reg"><?php echo $row['nome_mod'];?></span>
							</div>
							<div class="col">
									<h6 class="text-dark font-weight-bold reg-title reg-title4">Derivado de :</h6> <span class="data-reg"><?php echo"<i class='bi bi-diagram-2-fill'></i> ".$row3[0]." | <i class='bi bi-person-video3'></i> ".$row3[1].""; ?></span>
							</div>
							<div class="col">
								<h6 class="text-dark font-weight-bold reg-title reg-title4">Conteúdo :</h6>
								<span class="data-reg">
									<?php if ($row2[0] > 0) {
                                    echo "".$row2[0]." aulas.";
                                    }else {
                                        echo "Sem registros!";
                                    }?>
								</span>
							</div>
						</div>
						<!-- 3ª LINHA -->
						<div class="row mt-5">
							<div class="col-12">
								<p class="font-weight-bold text-dark d-inline-block reg-title reg-title5">Descrição do módulo :</p>
								<p class="desc-view data-reg"><?php echo $row['desc_mod'];?></p>
							</div>
						</div>
					</div>
	
					<div class="actions">
						<div class="d-flex flex-row justify-content-center">
								<a href="?content_adm=lista_mod" class="btn btn-sm btn-secondary text-white mr-1 font-weight-bold"><i class="bi bi-arrow-left"></i> Voltar</a>
								<a href="?content_adm=lista_mod&edit_mod=<?php echo $id_mod;?>" class="btn btn-sm b-destaque-4 text-white ml-1 font-weight-bold">Editar <i class="bi bi-pencil-fill"></i></a>
						</div>
					</div>
		</div>
</div>