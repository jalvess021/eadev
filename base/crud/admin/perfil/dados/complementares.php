<h4 class="content-subtitle ">Informações Complementares</h4>
<hr class="">
<div class="row justify-content-between group-cam">
    <div class="col-md-2 mt-md-4">
    <label for="uploadUserCam" class='labelUserCamp' title='Formato recomendado 1:1'>
        <img class="perfil-cam" <?php echo "src='\\tcc/assets/images/users/".md5($row['id_usu']).".jpeg'";?>>
        </label> 
        <form id="alterImgUser" action='\tcc\base\crud\admin\perfil\dados\alter.php' method='post' enctype='multipart/form-data'>
            <input type="text" value='<?php echo $id_usu;?>' name='id' id='idUserAlterCam'>
            <input id="uploadUserCam" type="file" accept="image/jpeg" name="imagem">
        </form>
        <span id='infoFileCam'></span>
    </div>
    <div class="form-group col-md-5 perfil-nome">
        <label class="perfil-label" for="Nome">Nome completo</label>
        <input type="text" class="form-control perfil-input"  value="<?php echo $row['nome'];?>" disabled>
    </div>

    <div class="form-group col-md-3 col-lg-4 perfil-date ">
        <label class="perfil-label" for="Nome">Data de nascimento</label>
        <input type="text" class="form-control perfil-input" value="<?php echo date('d/m/Y',  strtotime($row2['dt_nasc']));?>" disabled>
    </div>
</div>

<div class="row mt-3 justify-content-between">

    <div class="form-group col-md-3">
        <label class="perfil-label" for="CPF">CPF</label>
        <input type="text" class="form-control perfil-input"  value="<?php echo $row2['cpf'];?>" disabled>
    </div>

    <div class="form-group col-md-3">
        <label class="perfil-label" for="RG">RG</label>
        <input type="text" class="form-control perfil-input"  value='<?php echo $row2['rg'];?>' disabled>
    </div>

    <div class="form-group col-md-2">
        <label class="perfil-label" for="CEP">CEP</label>
        <input type="text" class="form-control perfil-input"  value="<?php echo $row2['cep'];?>" disabled>
    </div>

    <div class="form-group col-md-2">
        <label class="perfil-label" for="Estado">UF</label>
        <input type="text" class="form-control perfil-input" value="<?php echo $row3['uf'];?>" disabled>
    </div>
</div>

<div class="row mt-3 justify-content-between">
    <div class="form-group col-md-3">
        <label class="perfil-label" for="Cidade">Cidade</label>
        <input type="text" class="form-control perfil-input" value="<?php echo $row3['cidade'];?>" disabled>
    </div>

    <div class="form-group col-md-4">
        <label class="perfil-label" for="Estado">Bairro</label>
        <input type="text" class="form-control perfil-input"value="<?php echo $row3['bairro'];?>" disabled>
    </div>

    <div class="form-group col-md-5">
        <label class="perfil-label" for="Estado">Logradouro</label>
        <input type="text" class="form-control perfil-input"value="<?php echo $row3['logradouro'];?>" disabled>
    </div>
</div>

<div class="button-password2 d-flex justify-content-center">
        <input type="submit" form='alterImgUser' id='btnSubmitImgUser' value='Salvar dados' disabled>
</div>

