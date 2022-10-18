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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Relatório GERAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleFormControlInput1">Selecione o período: </label>
            <select class="custom-select" size="2">
                <option selected disabled>Ano</option>
                <option>2022</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>