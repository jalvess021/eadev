<?php
$nivel_necessario = 3;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=4"); exit;

		}
?>

<div id="list" class="row">
	<div class="table-responsive col-xs-12">
		<?php
			include "../base/conexao.php";
	
			$data = mysqli_query($con, "select * from usuario where nome like '%".$_GET['nome']."%' order by id asc;") or die(mysql_error());
			
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<td><strong>ID</strong></td>"; 
			echo "<td><strong>Nome do usuário</strong></td>"; 
			echo "<td><strong>Usuário</strong></td>";
			echo "<td><strong>Senha</strong></td>";
			echo "<td><strong>E-mail</strong></td>";
			echo "<td><strong>Nível</strong></td>";
			echo "<td><strong>Ativo</strong></td>";
			echo "<td><strong>Data cad/ed</strong></td>";
			echo "<td class='actions'><strong>Ações</strong></td>"; 
			echo "</tr></thead><tbody>";
	
			while($info = mysqli_fetch_array($data)){ 
		
				echo "<tr>"; //In�cio da Linha de um registro...
				echo "<td>".$info['id']."</td>";
				echo "<td>".$info['nome']."</td>";
				echo "<td>".$info['usuario']."</td>";
				echo "<td>".$info['senha']."</td>";
				echo "<td>".$info['email']." </td>";
				echo "<td>".$info['nivel']."</td>";
				if($info['ativo'] == 1){
					echo "<td>SIM</td>";
				}else if($info['ativo'] == 0){
					echo "<td>NÃO</td>";
				}
				//echo "<td>".implode("/", array_reverse(explode("-", $info['dt_cadastro'])))." </td>";
				echo "<td>".date('d/m/Y',strtotime($info['dt_cadastro']))."</td>";
				echo "<td><div class='btn-group btn-group-xs'>";
				echo "<a class='btn btn-info btn-xs' href=view_usu.php?id=".$info['id']."> Detalhar </a>";
				echo "<a class='btn btn-warning btn-xs' href=fedita_usu.php?id=".$info['id']."> Editar </a>";
				if($info['ativo'] == 1){
					echo "<a class='btn btn-danger btn-xs'  href=block_usu.php?id=".$info['id']."> Bloquear </a>";
				}else if($info['ativo'] == 0){
					echo "<a class='btn btn-success btn-xs'  href=ativa_usu.php?id=".$info['id'].">&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a></div></td>";
				}
			}
		?>		
				</tr><!-- Fim da Linha � um registro...-->
			</tbody>
		</table>
	</div>
</div><!--list-->
<div id="bottom" class="row">
	<div class="col-xs-12">
		<a href="lista_usu.php" class="btn btn-primary pull-left h2">Listar todos</a> 
	</div>
</div><!--bottom-->

		<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- Referenciando fun��o ajax para atualiza��o de p�gina - PESQUISA -->
		<script src="../js/funcao.js"></script>
