<h4 class="content-subtitle ">Informações Complementares</h4>
<hr class="">
<div class="row justify-content-between group-cam">
    <div class="form-group div-inp-com col-md-4">
    <img class="perfil-cam" src="arquivos/img/agnaldo.jfif" alt="Logo Eadev">
    </div>
    <div class="form-group div-inp-com col-md-5 perfil-nome ">
        <label class="perfil-label" for="Nome">Nome completo</label>
        <input type="text" class="form-control perfil-input"  value="<?php echo $row['nome'];?>" disabled>
    </div>

    <div class="form-group div-inp-com col-md-3 perfil-date ">
        <label class="perfil-label" for="Nome">Data de nascimento</label>
        <input type="date" class="form-control perfil-input">
    </div>
</div>

<div class="row mt-3 justify-content-between">

    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="CPF">CPF</label>
        <input type="text" class="form-control perfil-input" placeholder="000.000.000-00">
    </div>

    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="RG">RG</label>
        <input type="text" class="form-control perfil-input" placeholder="00.000.000-00">
    </div>

    <div class="form-group div-inp-com col-md-2">
        <label class="perfil-label" for="CEP">CEP</label>
        <input type="text" class="form-control perfil-input"  placeholder="00000-000">
    </div>

    <div class="form-group div-inp-com col-md-2">
        <label class="perfil-label" for="Estado">UF</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>
</div>

<div class="row mt-3 justify-content-between">
    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="Cidade">Cidade</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>

    <div class="form-group div-inp-com col-md-4">
        <label class="perfil-label" for="Estado">Bairro</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>

    <div class="form-group div-inp-com col-md-5">
        <label class="perfil-label" for="Estado">Logradouro</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>
</div>

<div class="button-password2 d-flex justify-content-center">
        <button type="submit"><a href="#">Salvar dados</a></button>
</div>