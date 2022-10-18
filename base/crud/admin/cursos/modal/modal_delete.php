<?php
if (isset($_GET['delete_cur'])) {

    $sqlDel = mysqli_query($con, "SELECT * FROM curso WHERE id_curso='".$_GET['delete_cur']."';");
    $infoDel = mysqli_fetch_array($sqlDel);

    if (mysqli_num_rows($sqlDel)>0) {
                            $sql1 = mysqli_query($con, "SELECT COUNT(id_mod) FROM modulo m WHERE m.id_curso = '".$_GET['delete_cur']."';");
							$row1 = mysqli_fetch_array($sql1);
							$sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula a INNER JOIN modulo AS m ON a.id_mod = m.id_mod AND m.id_curso = '".$_GET['delete_cur']."' ;");
							$row2 = mysqli_fetch_array($sql2);
        echo"
        <div class='modal fade' id='modalDeleteCur' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' data-backdrop='static'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header bg-danger text-white'>
                        <h5 class='modal-title' id='exampleModalLabel'> <i class='bi bi-exclamation-circle-fill'></i> Exclusão do curso: <span class='text-uppercase font-weight-bold'>".$infoDel['sigla_curso']."</span></h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body bg-light'>
                            <div class='form-group d-flex flex-column'>
                                <label for='confirmModalUsu' class='col-form-label'>Deseja mesmo prosseguir?</label>
                                <small class='mb-2'>Digite o nome do curso selecionado (<span class='text-danger font-weight-bold'> ".$infoDel['nome_curso']."</span> ) para continuar!</small>
                                <input type='text' class='form-control' id='confirmModalUsu' class='modalConfirm' onkeyup='validaDel()' autocomplete='off' onpaste='return false' ondrop='return false'>
                            </div>
                            <div class='row'>
                                <div class='col-12'>
                                <span class='info-min'>N&ordm; M&oacute;dulos: (".$row1[0].") & N&ordm; Aulas: (".$row2[0].")</span>
                                </div>
                            </div>
                            <div class='form-check mt-3'>
                                <input class='form-check-input' type='checkbox' id='checkDel' onclick='validaDel()'>
                                <label class='form-check-label aviso-del' for='defaultCheck1'>
                                Compreendo que TODOS os items relacionados ao curso ".$infoDel['sigla_curso']." serão deletados PERMANENTEMENTE!
                                </label>
                            </div>
                    </div>
                    <div class='modal-footer bg-light d-flex justify-content-center'>
                        <a href='?content_adm=lista_cur' class='btn btn-sm btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                        <a href='?content_adm=delete_cur&id_curso=".$_GET['delete_cur']."'><button class='btn btn-sm btn-danger text-white' id='modalConfirm' disabled>Confirmar <i class='bi bi-trash-fill'></i></button></a>
                        </div>
                </div>
            </div>
        </div>"; 
    }
}
    
require_once "scriptDel.php";
?>