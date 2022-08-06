<?php 
if (isset($_GET['add']) && $_GET['add'] === "mod") {

$r = mysqli_query($con, "SHOW TABLE STATUS LIKE 'modulo'");
$l = mysqli_fetch_array($r);

 echo " <div class='modal fade modal-add' id='modalAddMod' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Adicionar Módulo</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <small class='text-center'>
                                    <p> | <strong class='text-muted'>Data de Cadastro -</strong> ".date('d.m.Y')." | </p>
                            </small>
                        <form action='?content_adm=insere_mod' method='post'>
                            <div class='modal-form'>

                                <div class='row'>
                                    <div class='form-group col-2'>
                                        <label for='recipient-name' class='col-form-label'>Id:</label> 
                                        <input type='text' class='form-control form-control-sm read' placeholder='".$l['Auto_increment']."' disabled>
                                        <span class='info-min'>Automático </span>
                                    </div>
                                    <div class='form-group col-4'>
                                        <label for='recipient-name' class='col-form-label'>Nome:</label>
                                        <input type='text' class='form-control form-control-sm form-add' id='form-add1' name='nome_mod' required autocomplete='off' placeholder='Digite aqui...'>
                                        <span class='info-min'>Min. 6 caractéres</span>
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
                                    <div class='form-group col-3'>
                                        <label for='recipient-name' class='col-form-label'>Curso:</label>
                                        <select class='form-control custom-select custom-select-sm form-add' name='curso' id='selectCurso'> 
                                                        <option value='all' title='todas'>SELECIONE</option> 
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='form-group col-12'>
                                    <label for='recipient-name' class='col-form-label'>Descrição:</label>  
                                    <textarea class='form-control form-control-sm form-add' id='form-add3' name='desc_mod' placeholder='Digite aqui...' rows='2' required></textarea>
                                    <span class='info-min'>Min. 30 caractéres</span>
                                    </div>
                                </div>
                            </div>
                            <div id='actions' class='modal-footer d-flex justify-content-center'>
                                    <a href='?content_adm=lista_mod' class='btn btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                                    <button type='submit' class='btn add-submit' id='addMod'>Cadastrar <i class='bi bi-check-circle-fill'></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }

require_once "scriptAdd.php";
?>