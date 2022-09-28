<?php
	//include 'base\conexao.php';
	

if (isset($_GET['edit_quest'])) {
    $id_quest = (int) $_GET['edit_quest'];
    $sql = mysqli_query($con, "select * from questoes where id_quest = '".$id_quest."';");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql)>0) {
      echo "
      <div class='modal fade modal-edit' id='modalEditAv' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-xl' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Formulário de edição | Avaliação - ".$id_quest." </h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
            <small class='text-center'>
                          <p> | <strong class='text-muted'>Data da edição -</strong> ". date('d.m.Y') ." |</p>
                      </small>
              <form action='?content_adm=atualiza_av' method='post'>
                <div class='modal-form'>
                    <div class='row justify-content-around'>
                        <div class='form-group col-2'>
                            <label for='recipient-name' class='col-form-label'>Id:</label> 
                            <input type='text' class='form-control form-control-sm read' name='id_quest' value='". $row['id_quest'] ."' readonly>
                        </div>
                        <div class='form-group col-2'>
                                        <label for='recipient-name' class='col-form-label'>Formação:</label>
                                        <select class='form-control custom-select custom-select-sm form-add' name='formacao' id='selectFormacao'> 
                                                        <option disabled selected value='0'>SELECIONE</option> ";

                                                           $dataf = mysqli_query($con, 'select * from formacao order by id_formacao asc;') or die(mysqli_error('ERRO: '.$con));
                                                                    while($infof = mysqli_fetch_array($dataf)) {
                                                                        echo "<option value='".$infof['id_formacao']."'> ".$infof['nome_formacao']." </option>";
                                                            };
                    echo "              </select>
                        </div>
                        <div class='form-group col-2'>
                            <label for='recipient-name' class='col-form-label'>Curso:</label>
                            <select class='form-control custom-select custom-select-sm form-add' name='curso' id='selectCurso'> 
                                            <option value='all' title='todas'>SELECIONE</option> 
                            </select>
                        </div>
                        <div class='form-group col-2'>
                            <label for='recipient-name' class='col-form-label'>Módulo:</label>
                            <select class='form-control custom-select custom-select-sm form-add' name='modulo' id='selectModulo'> 
                                            <option value='all' title='todas'>SELECIONE</option> 
                            </select>
                        </div>
                        <div class='form-group col-3'>
                            <label for='recipient-name' class='col-form-label'>Dificuldade da questão:</label>
                            <select class='form-control custom-select custom-select-sm form-add' name='dificuldade' id='selectModulo'>";
                                            switch ($row['grau_dificuldade']) {
                                                case 1:
                                                    echo "<option value='1' title='Fácil' selected>Fácil</option> ";
                                                    echo "<option value='2' title='Média'>Média</option> ";
                                                    echo "<option value='3' title='Difícil'>Difícil</option> ";
                                                    break;
                                                
                                                case 2:
                                                    echo "<option value='1' title='Fácil'>Fácil</option> ";
                                                    echo "<option value='2' title='Média' selected>Média</option> ";
                                                    echo "<option value='3' title='Difícil'>Difícil</option> ";
                                                    break;

                                                case 3:
                                                    echo "<option value='1' title='Fácil'>Fácil</option> ";
                                                    echo "<option value='2' title='Média'>Média</option> ";
                                                    echo "<option value='3' title='Difícil' selected>Difícil</option> ";
                                                    break;

                                                default:
                                                    echo "<option value='all' title='todas' selected disabled>Escolha a dificuldade</option>";
                                                    echo "<option value='1' title='Fácil'>Fácil</option> ";
                                                    echo "<option value='2' title='Média'>Média</option> ";
                                                    echo "<option value='3' title='Difícil'>Difícil</option> ";
                                                    break;
                                            }   
                        echo "
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                            <div class='form-group col-12'>
                            <label for='recipient-name' class='col-form-label'>Enunciado:</label>  
                            <textarea class='form-control form-control-sm form-add' id='form-add5' name='enunciado' placeholder='Digite aqui...' rows='2' required>".$row['enunciado_quest']."</textarea>
                            <span class='info-min'>Min. 50 caractéres</span>
                            </div>
                    </div>
      
                    <div class='row'>
                        <div class='form-group col-12'>
                            <label for='recipient-name' class='col-form-label'>Alternativas:</label>
                            <div class='input-group input-group-sm mt-2'>
                                <input type='text' class='form-control form-control-sm form-add' id='form-add1' name='correta' placeholder='Informe a alternativa correta...' value='".$row['opc_certa']."' required autocomplete='off'>
                                <div class='input-group-append'>
                                    <button type='button' class='btn btn-success'><i class='bi bi-check-all'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-12'>
                            <div class='input-group input-group-sm'>
                                <input type='text' class='form-control form-control-sm form-add' id='form-add1' name='incorreta1' placeholder='Informe a alternativa incorreta...' value='".$row['opc_errada1']."' required autocomplete='off'>
                                <div class='input-group-append'>
                                    <button type='button' class='btn btn-danger'><i class='bi bi-check-all'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-12'>
                            <div class='input-group input-group-sm'>
                                <input type='text' class='form-control form-control-sm form-add' id='form-add1' name='incorreta2' placeholder='Informe a alternativa incorreta...' value='".$row['opc_errada2']."' required autocomplete='off'>
                                <div class='input-group-append'>
                                    <button type='button' class='btn btn-danger'><i class='bi bi-check-all'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='actions' class='modal-footer d-flex justify-content-center'>
                        <a href='?content_adm=lista_av' class='btn btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                        <button type='submit' class='btn bt-padrao' id='attEditAv'>Atualizar <i class='bi bi-check-all'></i></button>
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