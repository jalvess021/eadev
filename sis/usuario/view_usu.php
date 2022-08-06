<?php
/* $nivel_necessario = 3;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php"); exit;
		} */
?>
				<?php	include "../base/conexao.php";
						
						$id = (int) $_GET['id'];
						$sql = mysqli_query($con, "select * from usuario where id = '".$id."';");
						$row = mysqli_fetch_array($sql);
				?>

			<script src="../js/funcao.js"></script>

			<div id="main" class="container-fluid">
				<br>
				  <h3 class="page-header">Visualizar registro da Usuários - <?php echo $id;?></h3>
				
				<!-- 1ª LINHA -->
				
				<div class="row">
					<div class="col-md-1">
						<p><strong>ID</strong></p>
						<p><?php echo $row['id'];?></p>
					</div>
			
					<div class="col-md-5">
						<p><strong>Nome do usuário</strong></p>
						<p><?php echo $row['nome'];?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Usuário</strong></p>
						<p><?php echo $row['usuario']; ?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Senha</strong></p>
						<p><?php echo $row['senha']; ?></p>
					</div>
				</div>
				
				<!-- 2ª LINHA -->
				
				<div class="row">
					<div class="col-md-4">
						<p><strong>E-mail</strong></p>
						<p><?php echo $row['email'];?></p>
					</div>
			
					<div class="col-md-2">
						<p><strong>Nível</strong></p>
						<p><?php switch($row['nivel'])
								{
								 case 1: echo "RELATÓRIO";break;
								 case 2: echo "CADASTRO";break;
								 case 3: echo "ADMINISTRADOR";break;
								}
							?>
						</p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Data do cadastro</strong></p>
						<p><?php echo date('d/m/Y',strtotime($row['dt_cadastro'])); ?></p>
					</div>
			
					<div class="col-md-2">
						<p><strong>Ativo</strong></p>
						<p><?php
							if($row["ativo"]==1){
								echo "SIM";
							}else if($row["ativo"]==0){
								echo "NÃO";
							}
						   ?>
						</p>
					</div>
				</div>
				

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_usu.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_usu.php?id=".$row['id']." class='btn btn-primary'>Editar</a>";?>
						<?php
							if($row["ativo"]==1){
								echo "<a href=block_usu.php?id=".$row['id']." class='btn btn-danger'>Bloquear</a>";
							}else if($row["ativo"]==0){
								echo "<a href=ativa_usu.php?id=".$row['id']." class='btn btn-success'>&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a>";
							}
						   ?>
					</div>
				</div>
			</div>
