<?php 
if (isset($_GET['add']) && $_GET['add'] == "curso") {
//previnir o id a ser cadastrado
//$sqlAdd = mysqli_query($con, "SELECT MAX(id_curso) as last_id FROM curso;");
//$rowAdd = mysqli_fetch_array($sqlAdd); 
//$auto = $rowAdd['last_id'] + 1;
$r = mysqli_query($con, "SHOW TABLE STATUS LIKE 'curso'");
$l = mysqli_fetch_array($r);

 echo " <div class='modal fade modal-add' id='modalAddCur' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Adicionar Curso</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <small class='text-center'>
                                    <p> | <strong class='text-muted'>Data de Cadastro -</strong> ".date('d.m.Y')." | </p>
                            </small>
                        <form action='?content_adm=insere_cur' method='post'>
                            <div class='modal-form'>

                                <div class='row'>
                                    <div class='form-group col-2'>
                                        <label for='recipient-name' class='col-form-label'>Id:</label> 
                                        <input type='text' class='form-control form-control-sm' placeholder='".$l['Auto_increment']."' disabled>
                                        <span class='info-min'>Automático </span>
                                    </div>
                                    <div class='form-group col-5'>
                                        <label for='recipient-name' class='col-form-label'>Nome:</label>
                                        <input type='text' class='form-control form-control-sm form-add' id='form-add1' name='nome_curso' required autocomplete='off' placeholder='Digite aqui...'>
                                        <span class='info-min'>Min. 6 caractéres</span>
                                    </div>
                                    <div class='form-group col-2'>
                                        <label for='recipient-name' class='col-form-label'>Sigla:</label>
                                        <input type='text' class='form-control form-control-sm form-add' id='form-add2' name='sigla_curso' required maxlength='6' autocomplete='off' placeholder='Digite aqui...'>
                                        <span class='info-min'>Min. 3 caractéres</span>
                                    </div>
                                    <div class='form-group col-3'>
                                    <label for='recipient-name' class='col-form-label'>Formação:</label>
                                        <select class='form-control custom-select custom-select-sm form-add' name='formacao' id='selectFormacao'> 
                                                        <option disabled selected value='0'>SELECIONE</option> ";

                                                           $dataf = mysqli_query($con, 'select * from formacao order by id_formacao asc;') or die(mysqli_error('ERRO: '.$con));
                                                                    while($infof = mysqli_fetch_array($dataf)) {
                                                                        echo "<option value='".$infof['id_formacao']."'> ".$infof['nome_formacao']." </option>";
                                                            };
                                                            
                       echo           "</select>
                                    </div>
                                </div>
                                <div class='custom-file'>
                                    <input type='file' class='custom-file-input' id='customFile' accept='image/gif, image/jpeg'>
                                    <label class='custom-file-label' for='customFile' data-browse='Nenhum arquivo escolhido'>Imagem do curso</label>
                                </div>
                                <div class='row'>
                                    <div class='form-group col-12'>
                                    <label for='recipient-name' class='col-form-label'>Descrição:</label>  
                                    <textarea class='form-control form-control-sm form-add' id='form-add3' name='desc_curso' placeholder='Digite aqui...' rows='5' required></textarea>
                                    <span class='info-min'>Min. 50 caractéres</span>
                                    </div>
                                </div>
                            </div>
                            <div id='actions' class='modal-footer d-flex justify-content-center'>
                                    <a href='?content_adm=lista_cur' class='btn btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                                    <button type='submit' class='btn add-submit' id='btnAdd'>Cadastrar <i class='bi bi-check-circle-fill'></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }

require_once "scriptAdd.php";
?>

