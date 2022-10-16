<?php
    include 'base/config.php';
    $id_adm = $_GET['adm'];

    if (isset($_GET['info']) && $_GET['info'] === 'view') {
        if (isset($_GET['adm'])) {
            $verifyAdm = mysqli_query($con, "SELECT * FROM usuario where nvl_acesso = 3 AND id_usu = ".$id_adm.";");
            $rowAdm = mysqli_num_rows($verifyAdm);
            if ($rowAdm === 1) {
                        $resAdm = mysqli_fetch_array($verifyAdm);
                        $queryComp = mysqli_query($con, "SELECT * FROM dados_complementares where id_usu = ".$id_adm.";");
                        $resComp = mysqli_fetch_array($queryComp);

                        $queryLoc = mysqli_query($con, "SELECT * FROM localidade where cep = '".$resComp['cep']."';");
                        $resLoc = mysqli_fetch_array($queryLoc);
                    echo "
            <div class='div-border'>
                <div class='row justify-content-between row-init'>
                        <div class='col-2'>
                            <img class='perfil-cam-adm' src='\\tcc\assets\images\users\\".md5($resComp['id_usu']).".jpg' alt='Foto do usuário'>
                        </div>
                        <div class='col-7'>
                            <p class=' text-center nome-adm'>".$resAdm['nome']." { ".$resComp['id_usu']." }</p>
                        </div>
                        <div class='col-2'>
                            <a href='?content_adm=consulta_adm&info=adm&user=".$id_adm."'><button class='btn bt-padrao'><i class='bi bi-file-earmark-bar-graph-fill'></i> Atividades</button></a>
                        </div>
                </div>
                <div class='row justify-content-between row-init2'>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons'>Usuário:</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resAdm['usuario']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-4'>
                        <label class='perfil-label-cons' for='RG'>E-mail:</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resAdm['email']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='CEP'>Telefone:</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resAdm['telefone']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='Estado'>Sexo:</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='"; 
                            switch ($resAdm['sexo']) {
                                case 1:
                                    $sexo = 'Masculino';
                                    break;
                            
                                case 2:
                                    $sexo = 'Feminino';
                                    break;

                                case 3:
                                    $sexo = 'Outros';
                                    break;
                                
                                default:
                                $sexo = 'Não Informado';
                                    break;
                            }echo $sexo."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='Estado'>status:</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='";
                            switch ($resAdm['status']) {
                                case 1:
                                    $status = 'Ativo';
                                    break;
                            
                                case 2:
                                    $status = 'Pendente';
                                    break;

                                case 3:
                                    $status = 'Bloqueado';
                                    break;

                                case 4:
                                    $status = 'Desativado';
                                    break;
                            } echo $status."' disabled>
                    </div>
                </div>

                <h4 class='content-subtitle text-center'>Informações Complementares</h4>
                <hr>
                <div class='row justify-content-between row-init3'>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='CPF'>CPF</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resComp['cpf']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='RG'>RG</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resComp['rg']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-3'>
                        <label class='perfil-label-cons' for='Estado'>Data de Nascimento</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='".date('d / m / Y', strtotime($resComp['dt_nasc']))."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='CEP'>CEP</label>
                        <input type='text' class='form-control form-control-sm  perfil-input'  value='".$resComp['cep']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-2'>
                        <label class='perfil-label-cons' for='Estado'>UF</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='".$resLoc['uf']."' disabled>
                    </div>
                </div>
                <div class='row justify-content-between row-init4'>
                    <div class='form-group form-group-sm col-md-4'>
                        <label class='perfil-label-cons' for='Estado'>Cidade</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='".$resLoc['cidade']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-4'>
                        <label class='perfil-label-cons' for='Estado'>Bairro</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='".$resLoc['bairro']."' disabled>
                    </div>
                    <div class='form-group form-group-sm col-md-4'>
                        <label class='perfil-label-cons' for='Estado'>Logradouro</label>
                        <input type='text' class='form-control form-control-sm  perfil-input' value='".$resLoc['logradouro']."' disabled>
                    </div>
                </div>
            </div>";
            } 

            
        }
    }
?>


