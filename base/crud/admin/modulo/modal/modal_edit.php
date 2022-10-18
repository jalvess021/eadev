<?php
	//include 'base\conexao.php';
	

if (isset($_GET['edit_mod'])) {
    $id_mod = (int) $_GET['edit_mod'];
    $sql = mysqli_query($con, "select * from modulo where id_mod = '".$id_mod."';");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql)>0) {
      echo "
      <div class='modal fade modal-edit' id='modalEditMod' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Formulário de edição | Módulo - ".$id_mod." </h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
            <small class='text-center'>
                          <p> | <strong class='text-muted'>Data da edição -</strong> ". date('d.m.Y') ." |</p>
                      </small>
              <form action='?content_adm=atualiza_mod' method='post'>
                  <div class='modal-form'>
      
                      <div class='row'>
                          <div class='form-group col-2'>
                              <label for='recipient-name' class='col-form-label'>Id:</label>
                              <input type='text' class='form-control form-control-sm read' value='". $row['id_mod'] ."' name='id_mod' readonly>
                          </div>
                          <div class='form-group col-4'>
                              <label for='recipient-name' class='col-form-label'>Nome:</label>
                              <input type='text' class='form-control form-control-sm form-edit' id='form-edit1' value='".$row['nome_mod']."' name='nome_mod'  required autocomplete='off'>
                              <span class='info-min'>Mínimo 6 caractéres</span>
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
                          </div> ";
                    echo "<div class='form-group col-3'>
                            <label for='recipient-name' class='col-form-label'>Curso:</label>
                            <select class='form-control custom-select custom-select-sm form-edit' name='curso' id='selectCurso'> 
                                            <option value='all' title='todas'>SELECIONE</option> 
                                
                            </select>
                          </div>
                     </div>
                      <div class='row'>
                          <div class='form-group col-12'>
                          <label for='recipient-name' class='col-form-label'>Descrição:</label>  
                          <textarea class='form-control form-control-sm form-edit' id='form-edit3' name='desc_mod' placeholder='Digite aqui...' rows='3' required></textarea>
                          <span class='info-min'>Copie e cole a descrição antiga nesta área, para uma manipulação menos trabalhosa. (Mínimo 30 caractéres)</span>
                          </div>
                      </div>
                      <div class='row'> 
                        <div class='col-12'>
                            <small><span class='desc-ant'>Descrição antiga:</span></small>
                        </div>
                        <div class='col-12'>
                            <div class='input-group input-group-sm mt-1'>
                              <input type='text' class='form-control' id='copyDesc' value='".$row['desc_mod']."' placeholder='Sem registro!' readonly>
                            <div class='input-group-prepend'>
                              <button class='btn btn-success' type='button' tabindex='0' id='descButton' data-toggle='tooltip' data-placement='top' title='Copiar descrição'> 
                                <i id='copyDescIcon' class='bi bi-paperclip'></i>
                              </button>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div id='actions' class='modal-footer d-flex justify-content-center'>
                          <a href='?content_adm=lista_mod' class='btn btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                          <button type='submit' class='btn bt-padrao' id='attEditMod'>Atualizar <i class='bi bi-check-all'></i></button>
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