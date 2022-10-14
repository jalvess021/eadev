<?php
    $id_adm = $_GET['adm'];
?>
<div class="div-border">

    <div class="row justify-content-between row-init">
            <div class="col-2">
                <img class="perfil-cam-adm" src="arquivos/img/mateus.jpg" alt="">
            </div>
            <div class="col-7">
                <p class=" text-center nome-adm">Mateus de Azevedo Correa de Mello { 3 }</p>
            </div>
            <div class="col-2">
                <a href="?content_adm=consulta_adm&info=adm&user=<?php echo $id_adm;?>"><button class="btn bt-padrao">Atividades</button></a>
            </div>
            
    </div>


    <div class="row justify-content-between row-init2">

        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons">Usuário:</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value="teuzin" disabled>
        </div>

        <div class="form-group form-group-sm col-md-4">
            <label class="perfil-label-cons" for="RG">E-mail:</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value='mateuzinho.mello@gmaill.com' disabled>
        </div>

        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="CEP">Telefone:</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value="(21) 98696-5234" disabled>
        </div>

        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="Estado">Sexo:</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Masculino" disabled>
        </div>

        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="Estado">status:</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Ativo" disabled>
        </div>
    </div>

    <h4 class="content-subtitle text-center">Informações Complementares</h4>
    <hr>
    <div class="row justify-content-between row-init3">
        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="CPF">CPF</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value="111.111.111-11" disabled>
        </div>
        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="RG">RG</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value='11-111.111-11' disabled>
        </div>
        <div class="form-group form-group-sm col-md-3">
            <label class="perfil-label-cons" for="Estado">Data de Nascimento</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="26/02/2004" disabled>
        </div>
        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="CEP">CEP</label>
            <input type="text" class="form-control form-control-sm  perfil-input"  value="21610330" disabled>
        </div>
        <div class="form-group form-group-sm col-md-2">
            <label class="perfil-label-cons" for="Estado">UF</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Rio de Janeiro" disabled>
        </div>
    </div>
    <div class="row justify-content-between row-init4">
        <div class="form-group form-group-sm col-md-4">
            <label class="perfil-label-cons" for="Estado">Cidade</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Rio de Janeiro" disabled>
        </div>
        <div class="form-group form-group-sm col-md-4">
            <label class="perfil-label-cons" for="Estado">Bairro</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Marechal Hermes" disabled>
        </div>
        <div class="form-group form-group-sm col-md-4">
            <label class="perfil-label-cons" for="Estado">Logradouro</label>
            <input type="text" class="form-control form-control-sm  perfil-input" value="Rua Xavier Curado" disabled>
        </div>
    </div>
</div>

