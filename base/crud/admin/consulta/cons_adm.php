<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Consulta</h3>	
    <!-- Chama o Formulário para adicionar Cursos -->
   <!-- <a href="?content_adm=lista_aula&add=aula" class="btn bt-padrao btn-lg float-right">Relatório completo</a> -->
</div>
<div class="d-flex flex-row justify-content-between mt-4 cons-area">
	<div class="table-responsive col-md-12 col-md-12 all-table">
		<div class="all-table-header">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand cons-adm" href="?content_adm=consulta_adm" title='Início'><i class="bi bi-person-lines-fill"></i> Administradores</a>
            <form class="form-inline" id="pesq-adm">
                <input class="form-control mr-sm-2 search-usu" type="search" id="search-adm" placeholder="Nome { ID }" aria-label="Search" autocomplete='off'>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" id='submit-adm' disabled>Pesquisar</button>
            </form>
        </nav>  
				<hr>
		</div>
		<div class="all-table-body" id='cons-main-adm'>
			<?php include "main_adm/ch_cons_main.php";?>
		</div>
	</div>
</div>

<?php require_once "script.php";?>
