<?php
    include 'base/config.php';
    $id_alu = $_GET['alu'];

    if (isset($_GET['info']) && $_GET['info'] === 'view') {
        if (isset($_GET['alu'])) {
            $verifyAlu = mysqli_query($con, "SELECT * FROM usuario where nvl_acesso = 2 AND id_usu = ".$id_alu.";");
            $rowAlu = mysqli_num_rows($verifyAlu);
            if ($rowAlu === 1) {

                        $resAlu = mysqli_fetch_array($verifyAlu);
                        $queryComp = mysqli_query($con, "SELECT * FROM dados_complementares where id_usu = ".$id_alu.";");
                        $queryAlu1 =  mysqli_query($con, "SELECT * FROM aluno where id_usu = ".$id_alu.";");
                        $resAlu1 = mysqli_fetch_array($queryAlu1);
                        $queryMat = mysqli_query($con, "SELECT * FROM matriculado where id_aluno = ".$resAlu1['id_aluno'].";");
                        $resMat = mysqli_fetch_array($queryMat);
                        
                    echo "
            <div class='div-border'>
                <div class='row justify-content-start row-init'>
                        <div class='col-2'>
                            <img class='perfil-cam-adm' src='";
                            $arq = "\\tcc\assets\images\users\\".md5($resAlu['id_usu']).".jpeg";
                            if (file_exists($_SERVER['DOCUMENT_ROOT']."/tcc/assets/images/users/".md5($resAlu['id_usu']).".jpeg")) {
                               echo $arq;
                            }else {
                                echo "\\tcc\assets\images\users\\default.png";
                            }
                        echo"' alt='Foto do usuário'>
                        </div>
                        <div class=' col-8 col-xl-7 mt-2'>
                            <p class='ml-4 text-center nome-adm'>".$resAlu['nome']." { ".$resAlu['id_usu']." }</p>
                        </div>
                        <div class=' col-2 col-xl-3 mt-3'>
                            <div class='d-flex flex-row justify-content-end'>
                                <a href='/tcc/relatorios/loads/ficha_alu_load.php' target='_blank' class='btn btn-sm btn-secondary mr-xl-4 mr-2 text-white font-weight-bold' data-toggle='tooltip' data-placement='top' title='Gerar Relatório'><i class='bi bi-file-earmark-person-fill'></i><span class='d-none d-xl-inline'> Ficha  Técnica </span></a>
                            <div>
                            <a href='?content_adm=consulta_alu' class=' btn-back btn btn-sm bt-padrao'> <i class='bi bi bi-x-lg'></i><span class='d-none d-xl-inline'> Fechar</span> </a>
                        </div>
                    </div>
                </div>
                </div>
                <div class='container'>
                    <div class='row justify-content-between row-init2'>
                        <div class='form-group form-group-sm col-3 col-xl-auto '>
                            <label class='perfil-label-cons'>Matrícula:</label>
                            <h6 class='info_view_user'>".$resMat['matricula']."</h6>
                        </div>
                        <div class='form-group form-group-sm col-3 col-xl-auto '>
                            <label class='perfil-label-cons'>Usuário:</label>
                            <h6 class='info_view_user'>".$resAlu['usuario']." </h6>
                        </div>
                        <div class='form-group form-group-sm col-5 col-xl-auto '>
                            <label class='perfil-label-cons' for='RG'>E-mail:</label>
                            <h6 class='info_view_user'> ".$resAlu['email']." </h6>
                        </div>
                        <div class='form-group form-group-sm col-auto '>
                            <label class='perfil-label-cons' for='CEP'>Telefone:</label>
                            <h6 class='info_view_user'>".$resAlu['telefone']."</h6>
                        </div>
                        <div class='form-group form-group-sm col-auto '>
                            <label class='perfil-label-cons' for='Estado'>Sexo:</label>
                            <h6 class='info_view_user'>";
                                switch ($resAlu['sexo']) {
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
                                }echo $sexo."</h6>
                        </div>
                        
                    </div>";
                    if (mysqli_num_rows($queryComp) == 1) {
                        $resComp = mysqli_fetch_array($queryComp);
                        $queryLoc = mysqli_query($con, "SELECT * FROM localidade where cep = '".$resComp['cep']."';");
                        $resLoc = mysqli_fetch_array($queryLoc);
                    
                        echo "
                        <div class='row justify-content-between row-init3'>
                                <div class='form-group form-group-sm '>
                                    <label class='perfil-label-cons' for='Estado'>status:</label>
                                    <h6 class='info_view_user'>";
                                        switch ($resAlu['status']) {
                                            case 1:
                                                $status = 'Ativo';
                                                break;
                            
                                            case 2:
                                                $status = 'Bloqueado';
                                                break;

                                            case 3:
                                                $status = 'Desativado';
                                                break;

                                        } echo $status."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='CPF'>CPF</label>
                                    <h6 class='info_view_user'>".$resComp['cpf']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto '>
                                    <label class='perfil-label-cons' for='RG'>RG</label>
                                    <h6 class='info_view_user'>".$resComp['rg']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto  '>
                                    <label class='perfil-label-cons' for='Estado'>Data de Nascimento</label>
                                    <h6 class='info_view_user'>".date('d / m / Y', strtotime($resComp['dt_nasc']))."</h6>
                                </div>
                                
                            </div>
                            <div class='row justify-content-between row-init4'>
                                <div class='form-group form-group-sm col-auto '>
                                    <label class='perfil-label-cons' for='CEP'>CEP</label>
                                    <h6 class='info_view_user'>".$resComp['cep']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>UF</label>
                                    <h6 class='info_view_user'>".$resLoc['uf']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Cidade</label>
                                    <h6 class='info_view_user'>".$resLoc['cidade']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Bairro</label>
                                    <h6 class='info_view_user'>".$resLoc['bairro']."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Logradouro</label>
                                    <h6 class='info_view_user'>".$resLoc['logradouro']."</h6>
                                </div>
                            </div>
                        </div>";
                    } else {
                        echo "
                        <div class='row justify-content-between row-init3'>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Status:</label>
                                    <h6 class='info_view_user'>";
                                        switch ($resAlu['status']) {
                                            case 1:
                                                $status = 'Ativo';
                                                break;
                            
                                            case 2:
                                                $status = 'Bloqueado';
                                                break;

                                            case 3:
                                                $status = 'Desativado';
                                                break;
                                        } echo $status."</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='CPF'>CPF</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='RG'>RG</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Data de Nascimento</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='CEP'>CEP</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                            </div>
                            <div class='row justify-content-between row-init4'>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>UF</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Cidade</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Bairro</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                                <div class='form-group form-group-sm col-auto'>
                                    <label class='perfil-label-cons' for='Estado'>Logradouro</label>
                                    <h6 class='info_view_user'>Não informado!</h6>
                                </div>
                            </div>
                        </div>
                </div>";
                }
            } 
        }
    }
?>


