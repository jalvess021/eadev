<?php
	//include 'base\conexao.php';
	

if (isset($_GET['edit_cur'])) {
    $id_curso = (int) $_GET['edit_cur'];
    $sql = mysqli_query($con, "select * from curso where id_curso = '".$id_curso."';");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql)>0) {
      echo "
      <div class='modal fade modal-edit' id='modalEditCur' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Formulário de edição | Curso - ".$id_curso."</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
            <small class='text-center'>
                          <p> | <strong class='text-muted'>Data da edição -</strong> ". date('d.m.Y') ." |</p>
                      </small>
              <form action='?content_adm=atualiza_cur' method='post'>
                  <div class='modal-form'>
      
                      <div class='row'>
                          <div class='form-group col-2'>
                              <label for='recipient-name' class='col-form-label'>Id:</label>
                              <input type='text' class='form-control form-control-sm read' name='id_curso' value='". $row['id_curso'] ."' readonly>
                          </div>
                          <div class='form-group col-5'>
                              <label for='recipient-name' class='col-form-label'>Nome:</label>
                              <input type='text' class='form-control form-control-sm form-edit' id='form-edit1' value='".$row['nome_curso']."' name='nome_curso'  required autocomplete='off'>
                              <span class='info-min'>Mínimo 6 caractéres</span>
                          </div>
                          <div class='form-group col-2'>
                              <label for='recipient-name' class='col-form-label'>Sigla:</label>
                              <input type='text' class='form-control form-control-sm form-edit' name='sigla_curso' id='form-edit2' value='". $row['sigla_curso'] ."' required maxlength='6' autocomplete='off'>
                              <span class='info-min'>Mín. 3 caractéres</span>
                          </div>
                          <div class='form-group col-3'>
                          <label for='recipient-name' class='col-form-label'>Formação:</label>
                              <select class='form-control custom-select custom-select-sm form-edit' name='formacao' id='selectFormacao'> 
                                              <option disabled selected value='0'>SELECIONE</option> ";
                                                  $dataf = mysqli_query($con, 'select * from formacao order by id_formacao asc;') or die(mysqli_error('ERRO: '.$con));
                                                          while($infof = mysqli_fetch_array($dataf)) {
                                                              echo "<option value='".$infof['id_formacao']."'> ".$infof['nome_formacao']." </option>";
                                                  }
                                                  
                        echo    "  </select>
                          </div>
                      </div>
                      <div class='row'>
                          <div class='form-group col-12'>
                          <label for='recipient-name' class='col-form-label'>Descrição:</label>  
                          <textarea class='form-control form-control-sm form-edit' id='form-edit3' name='desc_curso' placeholder='Digite aqui...' rows='5' required></textarea>
                          <span class='info-min'>Copie e cole a descrição antiga nesta área, para uma manipulação menos trabalhosa. (Mínimo 50 caractéres)</span>
                          </div>
                      </div>
                      <div class='row'> 
                        <div class='col-12'>
                            <small><span class='desc-ant'>Descrição antiga:</span></small>
                        </div>
                        <div class='col-12'>
                            <div class='input-group input-group-sm mt-1'>
                              <input type='text' class='form-control' id='copyDesc' value='".$row['desc_curso']."' placeholder='Sem registro!' readonly>
                            <div class='input-group-prepend'>
                              <button class='btn btn-success' type='button' tabindex='0' id='descButton' data-toggle='tooltip' data-placement='top' title='Copiar descrição'> 
                                <i id='copyDescIcon' class='bi bi-paperclip'></i>
                              </button>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div id='actions' class='modal-footer d-flex justify-content-center'>
                          <a href='?content_adm=lista_cur' class='btn btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                          <button type='submit' class='btn bt-padrao' id='attEditCur'>Atualizar <i class='bi bi-check-all'></i></button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
        
        ";
    }
}

require_once "scriptEdit.php";
?>












