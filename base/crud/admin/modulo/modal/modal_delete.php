<?php
if (isset($_GET['delete_mod'])) {

    $sqlDel = mysqli_query($con, "SELECT * FROM modulo WHERE id_mod='".$_GET['delete_mod']."';");
    $infoDel = mysqli_fetch_array($sqlDel);

    if (mysqli_num_rows($sqlDel)>0) {
                            $sql1 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula where id_mod = ".$_GET['delete_mod'].";");
							$row1 = mysqli_fetch_array($sql1);
        echo"
        <div class='modal fade' id='modalDeleteMod' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                <div class='modal-header bg-danger text-white'>
                    <h5 class='modal-title' id='exampleModalLabel'> <i class='bi bi-exclamation-circle-fill'></i> Exclusão do módulo: <span class='text-uppercase font-weight-bold'>".$infoDel['nome_mod']."</span></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body bg-light'>
                        <div class='form-group d-flex flex-column'>
                            <label for='confirmModalUsu' class='col-form-label'>Deseja mesmo prosseguir?</label>
                            <small class='mb-2'>Digite o nome do módulo selecionado (<span class='text-danger font-weight-bold'> ".$infoDel['nome_mod']."</span> ) para continuar!</small>
                            <input type='text' class='form-control' id='confirmModalUsu' class='modalConfirm' onkeyup='validaDel()' autocomplete='off' onpaste='return false' ondrop='return false'>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                            <span class='info-min'>N&ordm; Aulas: (".$row1[0].")</span>
                            </div>
                        </div>
                        <div class='form-check mt-3'>
                            <input class='form-check-input' type='checkbox' id='checkDel' onclick='validaDel()'>
                            <label class='form-check-label aviso-del' for='defaultCheck1'>
                            Compreendo que TODOS os items relacionados ao módulo ".$infoDel['nome_mod']." serão deletados PERMANENTEMENTE!
                            </label>
                        </div>
                </div>
                <div class='modal-footer bg-light d-flex justify-content-center'>
                    <a href='?content_adm=lista_mod' class='btn btn-sm btn-secondary text-white mr-1 font-weight-bold'><i class='bi bi-x-circle-fill'></i> Cancelar</a>
                    <a href='?content_adm=delete_mod&id_mod=".$_GET['delete_mod']."'><button class='btn btn-sm btn-danger text-white' id='modalConfirm' disabled>Confirmar <i class='bi bi-trash-fill'></i></button></a>
                    </div>
                </div>
            </div>
        </div>"; 
    }
}
    
require_once "scriptDel.php";
?>