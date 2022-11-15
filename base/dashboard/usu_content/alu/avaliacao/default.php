<h3 class='content-title ct-av'>Avaliações</h3>
<div class='all-av-form'>
    <h5 class='label-av-form-1'> <i class="bi bi-book-half"></i> Área avaliativa</h5>
    <div class="all-div-quest">
        <ul class="info-quest">
                <li>
                    <h3>Concluído <i class="bi bi-patch-check-fill text-success"></i></h3>
                    <p>O questionário receberá o status de concluído para o aluno que atingiu a nota necessária no curso referente.</p>
                </li>
                <li>
                    <h3>Disponível <i class="bi bi-patch-exclamation-fill text-secondary"></i></h3>
                    <p>Quando o aluno estiver apto a realizar o questionário do curso desejado, o status de disponível será exibido. </p>
                </li>
                <li>
                    <h3>Indisponível <i class="bi bi-patch-minus-fill text-danger"></i></h3>
                    <p>Ao exceder o número de tentativas ou não concluir todas as aulas do curso referente, o questionário receberá o status de indiponível. </p>
                </li>
        </ul>
        <div class="all-quest-1">
        <select name="" id="tp-form-av">
            <option value="" selected>Todos os questionários</option>
            <option value="">questionários de Front-End</option>
            <option value="">questionários de Back-End</option>
            <option value="">questionários de Conver</option>
        </select>
            <div class="all-quest-2">
                <div class="div-quest">
                    <div class="div-quest-row row">
                        <div class="div-quest-left col-3 align-self-center">
                            <a data-toggle="modal" data-target="#exampleModalCenter" class="link-icon-av"><i class="bi bi-file-earmark-check-fill bg-success"></i></a>
                        </div>
                        <div class="div-quest-right col-9 align-self-center">
                            <span>Título:</span>
                            <a data-toggle="modal" data-target="#exampleModalCenter">Questionário avaliativo de HTML <i class="bi bi-patch-check-fill text-success"></i></a>
                            <span id='try-quest'>Tentativas restantes: 0/2 | Parabéns, você concluiu este questionário.</span>
                            <span id='status-quest'>#1 - Concluído </span>
                        </div>
                    </div>
                </div>
                <hr class='hr-div-quest'>
                <div class="div-quest">
                    <div class="div-quest-row row">
                        <div class="div-quest-left col-3 align-self-center">
                        <a href="" class="link-icon-av"><i class="bi bi-file-earmark-text-fill bg-secondary"></i></a>
                        </div>
                        <div class="div-quest-right col-9 align-self-center ">
                            <span>Título:</span>
                            <a>Questionário avaliativo de Js <i class="bi bi-patch-exclamation-fill text-secondary"></i></a>
                            <span id='try-quest'>Tentativas restantes: 1/2 | Teste seus conhecimentos. </span>
                            <span id='status-quest'>#2 - Disponível</span>
                        </div>
                    </div>
                </div>
                <hr class='hr-div-quest'>
                <div class="div-quest">
                    <div class="div-quest-row row">
                        <div class="div-quest-left col-3 align-self-center">
                        <a href="" class="link-icon-av"><i class="bi bi-file-earmark-lock-fill  bg-danger"></i></a>
                        </div>
                        <div class="div-quest-right col-9 align-self-center">
                            <span>Título:</span>
                            <a>Questionário avaliativo de Css <i class="bi bi-patch-minus-fill text-danger"></i></a>
                            <span id='try-quest'>Tentativas restantes: 0/2 | Próxima tentativa em 23/12/2022 às 23:49:28. </span>
                            <span id='status-quest'>#3 - Indisponível</span>
                        </div>
                    </div>
                </div>
                <hr class='hr-div-quest'>
                <div class="div-quest">
                    <div class="div-quest-row row">
                        <div class="div-quest-left col-3 align-self-center">
                        <a href="" class="link-icon-av"><i class="bi bi-file-earmark-lock-fill  bg-danger"></i></a>
                        </div>
                        <div class="div-quest-right col-9 align-self-center">
                            <span>Título:</span>
                            <a>Questionário avaliativo de Php <i class="bi bi-patch-minus-fill text-danger"></i></a>
                            <span id='try-quest'>Tentativas restantes: 0/2 | Conclua as aulas do curso referente para liberar este questionário. </span>
                            <span id='status-quest'>#4 - Indisponível</span>
                        </div>
                    </div>
                </div>
                <hr class='hr-div-quest'>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white text-center font-weight-bold" id="exampleModalCenterTitle">Questionário de HTML</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Este questionário já foi realizado e conluído!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success">Obter certificado <i class='bi bi-award-fill'></i></button>
      </div>
    </div>
  </div>
</div>