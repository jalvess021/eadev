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
            echo "
    <div class='div-border'>
        <div class='row justify-content-between row-init'>
                <div class='col-2'>
                    <img class='perfil-cam-adm' src='";
                    $arq = "\\eadev\assets\images\users\\".md5($resAdm['id_usu']).".jpeg";
                    if (file_exists($_SERVER['DOCUMENT_ROOT']."/eadev/assets/images/users/".md5($resAdm['id_usu']).".jpeg")) {
                       echo $arq;
                    }else {
                        echo "\\eadev\assets\images\users\\default.png";
                    }
                echo"' alt='Foto do usuário'>
                </div>
                <div class='col-8 col-xl-7 mt-2'>
                    <p class='ml-4 text-center nome-adm'>".$resAdm['nome']." { ".$resAdm['id_usu']." }</p>
                </div>
                <div class='col-2 col-xl-3 mt-3'>
                    <div class='d-flex flex-row justify-content-end'>
                    
                            <a href='/eadev/relatorios/loads/ficha_adm_load.php?user=".$id_adm."' target='_blank' class='btn btn-sm btn-secondary  mr-xl-4 mr-2 text-white font-weight-bold ' data-toggle='tooltip' data-placement='top' title='Gerar Relatório'><i class='bi bi-file-earmark-person-fill'></i> <span class='d-none d-xl-inline'> Ficha  Técnica </span></a>
                        <div>
                            <a href='?content_adm=consulta_adm' class=' btn-back btn btn-sm bt-padrao'> <i class='bi bi bi-x-lg'></i> <span class='d-none d-xl-inline'> Fechar</span> </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class='container'>
            <div class='row justify-content-between row-init2'>
                <div class='form-group form-group-sm col-auto'>
                    <label class='perfil-label-cons'>Usuário:</label>
                    <h6 class='info_view_user'>".$resAdm['usuario']." </h6>
                </div>
                <div class='form-group form-group-sm col-auto'>
                    <label class='perfil-label-cons' for='RG'>E-mail:</label>
                    <h6 class='info_view_user'> ".$resAdm['email']." </h6>
                </div>
                <div class='form-group form-group-sm col-auto'>
                    <label class='perfil-label-cons' for='CEP'>Telefone:</label>
                    <h6 class='info_view_user'>".$resAdm['telefone']."</h6>
                </div>
                <div class='form-group form-group-sm col-auto'>
                    <label class='perfil-label-cons' for='Estado'>Sexo:</label>
                    <h6 class='info_view_user'>";
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
                        }echo $sexo."</h6>
                </div>
                <div class='form-group form-group-sm col-auto'>
                    <label class='perfil-label-cons' for='Estado'>status:</label>
                    <h6 class='info_view_user'>";
                        switch ($resAdm['status']) {
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
            </div>";
            if (mysqli_num_rows($queryComp) == 1) {
                $resComp = mysqli_fetch_array($queryComp);
                $queryLoc = mysqli_query($con, "SELECT * FROM localidade where cep = '".$resComp['cep']."';");
                $resLoc = mysqli_fetch_array($queryLoc);
            
                echo "
                <div class='row justify-content-between row-init3'>
                        <div class='form-group form-group-sm col-auto'>
                            <label class='perfil-label-cons' for='CPF'>CPF</label>
                            <h6 class='info_view_user'>".$resComp['cpf']."</h6>
                        </div>
                        <div class='form-group form-group-sm col-auto'>
                            <label class='perfil-label-cons' for='RG'>RG</label>
                            <h6 class='info_view_user'>".$resComp['rg']."</h6>
                        </div>
                        <div class='form-group form-group-sm col-auto'>
                            <label class='perfil-label-cons' for='Estado'>Data de Nascimento</label>
                            <h6 class='info_view_user'>".date('d / m / Y', strtotime($resComp['dt_nasc']))."</h6>
                        </div>
                        <div class='form-group form-group-sm col-auto'>
                            <label class='perfil-label-cons' for='CEP'>CEP</label>
                            <h6 class='info_view_user'>".$resComp['cep']."</h6>
                        </div>
                    </div>
                    <div class='row justify-content-between row-init4'>
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

<script>
	
	$("#pesq-adm").submit((e)=>{
        e.preventDefault();
        var valInput = $("#search-adm").val();
        //Regex (Expressão regular)
        reg1 = /^[A-Z]([^A-Z\d\s]+)((\s[A-Z]([^A-Z\d\s])+)|(\s[A-Z]([^A-Z\d\s])+)+)\s{1}\{\s([0-9]+)\s\}$/g;
        //Pega apenas o id do administrador que ele quer buscar
        idSearch = valInput.replace(reg1, "$7");
        $.ajax({
                url: 'base/crud/admin/consulta/search_adm2.php',
                method: 'POST',
                data: {searchAdmInput: idSearch},
                datatype: 'json'
            }).done(function(result){
                dados = result;
                var num = dados.replace(/[^0-9]/g,'');
                idAdm = parseInt(num);
                //idCripto = btoa(idAdm);
                window.location.href = "?content_adm=consulta_adm&info=view&adm="+idAdm;
            }) 
        })
</script>


