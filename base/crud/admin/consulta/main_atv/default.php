<?php ?>
<div class="row">
    <div class="col-12">
        <a href="?content_adm=lista_aula&add=aula" class="btn btn-sm bt-padrao float-right" data-toggle='tooltip' data-placement='top' title='Relatório geral de atividades'><i class="bi bi-file-earmark-bar-graph-fill"></i> Relatório</a>
    </div>
</div>

<div class='cons-body'>
    <div class="div-num-adm">
        <span id="num-cons-adm"></span>
        <h5 id="label-cons-adm"></h5>
    </div>
    <div class="div-info-adm">
            <h4 class="info-cons-title"> Total de atividades: <span id="num-cons-title"></span></h4>
            <div class="grid-cons">
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=add' id='consAdd'><span id='adm-cons-add'></span> Novos registros</a> 
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=att' id='consAtt'><span id='adm-cons-att'></span> Atualização de dados</a>
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=del' id='consDel'><span id='adm-cons-del'></span> Exclusão de dados</a>
            </div>
    </div>
</div>