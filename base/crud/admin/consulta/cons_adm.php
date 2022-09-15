<div class="d-flex flex-row justify-content-between">
    <h3 class="content-title">Consulta</h3>	
    <!-- Chama o Formulário para adicionar Cursos -->
   <!-- <a href="?content_adm=lista_aula&add=aula" class="btn bt-padrao btn-lg float-right">Relatório completo</a> -->
</div>
<div class="d-flex flex-row justify-content-between mt-4 cons-area">
	<div class="table-responsive col-md-12 col-md-12 all-table">
		<div class="all-table-header">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand cons-adm" href="?content_adm=consulta_adm"><i class="bi bi-person-lines-fill"></i> Administradores</a>
            <form class="form-inline" id="pesq-adm" action="?content_adm=consulta_adm" method="POST">
                <input class="form-control mr-sm-2 search-usu" type="search" id="search-adm" placeholder="Nome ou ID" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </nav>  
				<hr>
		</div>
		<div class="all-table-body cons-body" id='cons-main-adm'>
			<div class="div-num-adm">
                <span id="num-cons-adm"></span>
                <h5 id="label-cons-adm"></h5>
            </div>
            <div class="div-info-adm">
                    <h4 class="info-cons-title"> Total de atividades: <span id="num-cons-title"></span></h4>
                    <div class="grid-cons">
                        <a class="h6" href="#"><span id='adm-cons-add'></span> Novos registros</a> 
                        <a class="h6" href="#"><span id='adm-cons-att'></span> Atualizações de dados</a>
                        <a class="h6" href="#"><span id='adm-cons-del'></span> Exclusões de Itens</a>
                        <a class="h6" href="#"><span id='adm-cons-usu'> 0 usuários atualizados</a>
                    </div>
            </div>
		</div>
	</div>
</div>
<?php require_once "script.php";?>